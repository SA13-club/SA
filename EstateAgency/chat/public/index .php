<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8" />
  <title>聊天室系統</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f5f5f5;
    }
    .hidden {
      display: none;
    }
    .chat-container {
      display: flex;
      flex-direction: column;
      height: 90vh;
      max-width: 600px;
      margin: 0 auto;
      border: 1px solid #ccc;
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }
    .chat-header {
      background: #007bff;
      color: white;
      padding: 10px;
      text-align: center;
    }
    .chat-box {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
    }
    .bubble {
      max-width: 70%;
      padding: 10px;
      border-radius: 12px;
      margin: 6px;
      word-wrap: break-word;
    }
    .me {
      background-color: #d1e7dd;
      align-self: flex-end;
      text-align: right;
    }
    .other {
      background-color: #f8d7da;
      align-self: flex-start;
      text-align: left;
    }
    .input-area {
      display: flex;
      padding: 10px;
      border-top: 1px solid #ccc;
    }
    .input-area input {
      flex: 1;
      padding: 8px;
    }
    .input-area button {
      padding: 8px 12px;
    }
    .message-info {
      font-size: 0.8em;
      color: #555;
    }
    .time {
      margin-left: 6px;
      font-style: italic;
    }
  </style>
</head>
<body>

  <!-- 聊天室頁面 -->
  <div class="chat-container" id="chatPage">
    <div class="chat-header">
      <span id="chatTitle">聊天室</span>
      <span class="user-label" id="currentUser"></span>
    </div>
    <div id="chat" class="chat-box"></div>
    <div class="input-area">
      <input type="text" id="message" placeholder="輸入訊息..." />
      <button onclick="sendMessage()">送出</button>
    </div>
  </div>

  <script>
    // 取得網址參數
    const params = new URLSearchParams(window.location.search);
    const currentUsername = params.get('u_email') || '';
    const currentTarget   = params.get('receiver') || '';

    const socket = new WebSocket('ws://localhost:8080');
    socket.onopen = () => {
      if (currentUsername && currentTarget) {
        socket.send(JSON.stringify({
          username:     currentUsername,
          to_username:  currentTarget,
          init:         true  // 表示初始化連線
        }));
      }
    };

    const chat = document.getElementById('chat');

    socket.onmessage = (e) => {
      try {
        const data = JSON.parse(e.data);

        // 如果是歷史訊息陣列就批次顯示，否則單條顯示
        if (data.history) {
          data.history.forEach(msg => displayMessage(msg));
        } else {
          displayMessage(data);
        }
      } catch (error) {
        console.error('解析訊息失敗：', error);
      }
    };

    function sendMessage() {
      const text = document.getElementById('message').value.trim();
      if (text && currentUsername && currentTarget) {
        socket.send(JSON.stringify({
          username:     currentUsername,
          to_username:  currentTarget,
          message:      text
        }));
        document.getElementById('message').value = '';
      } else {
        alert('訊息或登入資料有問題！');
      }
    }

    function displayMessage(data) {
      const div = document.createElement('div');
      const isSelf = data.username === currentUsername;

      const ts = new Date(data.created_at || Date.now())
                  .toLocaleTimeString('zh-TW', { hour: '2-digit', minute: '2-digit' });

      div.classList.add('bubble', isSelf ? 'me' : 'other');
      div.innerHTML = `
        <div class="message-info">
          <strong>${data.username}</strong> <span class="time">${ts}</span>
        </div>
        <div class="message-text">${data.message}</div>
      `;
      chat.appendChild(div);
      chat.scrollTop = chat.scrollHeight;
    }

    window.onload = () => {
      if (currentUsername && currentTarget) {
        document.getElementById('currentUser').textContent = `使用者：${currentUsername}`;
        document.getElementById('chatTitle').textContent    = `你正在和【${currentTarget}】聊天`;
      } else {
        alert('網址參數有缺（u_email, receiver），請確認！');
      }
    };
  </script>
</body>
</html>
