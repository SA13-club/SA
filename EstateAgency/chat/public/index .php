<?php
// index.php
// 1. 取得使用者與目標
$u_email  = $_GET['u_email']   ?? '';
$receiver = $_GET['receiver']  ?? '';


// 2. 抓聯絡人清單
$partners = [];
if ($u_email) {
  $db = new mysqli('localhost','root','','sa');
  if (!$db->connect_errno) {
    $sql = "
      SELECT DISTINCT
        CASE WHEN username = ? THEN to_username ELSE username END AS partner
      FROM messages
      WHERE username = ? OR to_username = ?
      ORDER BY partner
    ";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('sss',$u_email,$u_email,$u_email);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
      $partners[] = $row['partner'];
    }
    $stmt->close();
  }
  $db->close();
}
?><!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8" />
  <title>聊天室系統</title>
  <style>
    body{margin:0;padding:0;font-family:sans-serif;background:#f5f5f5;}
    /* 左側清單 */
    #contactsList {
      position:fixed;
      top:0; left:0;
      width:200px; height:100vh;
      background:#fff; border-right:1px solid #ccc;
      overflow-y:auto;
    }
    #contactsList .item {
      padding:10px; cursor:pointer; border-bottom:1px solid #eee;
    }
    #contactsList .item.active { background:#007bff; color:#fff; }
    /* 將原本的 chat-container 右移 */
    #chatPage {
      margin-left:200px;
    }
    /* -------- 下面完全照抄你原本的 CSS -------- */
    .hidden { display: none; }
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

  <!-- 左側聯絡人清單 -->
  <div id="contactsList">
    <?php if (!$u_email): ?>
      <div class="item">請先帶入 ?u_email=你的帳號</div>
    <?php elseif (empty($partners)): ?>
      <div class="item">目前尚無聊天對象</div>
    <?php else: ?>
      <?php foreach($partners as $p): ?>
        <div
          class="item<?php if($p===$receiver) echo ' active';?>"
          onclick="location.href='?u_email=<?php echo urlencode($u_email)?>&receiver=<?php echo urlencode($p)?>'">
          <?php echo htmlspecialchars($p)?>
        </div>
      <?php endforeach;?>
    <?php endif;?>
  </div>

  <!-- 聊天室頁面（右側，原樣不動） -->
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
    // 原本 JS，只改 u_email / receiver 來源
    const params         = new URLSearchParams(window.location.search);
    const currentUsername= params.get('u_email') || '';
    const currentTarget  = params.get('receiver')  || '';

    document.getElementById('currentUser').textContent = currentUsername?`使用者：${currentUsername}`:'';
    document.getElementById('chatTitle').textContent   = currentTarget?`你正在和【${currentTarget}】聊天`:'聊天室';

    const socket = new WebSocket('ws://localhost:8080');
    socket.onopen = () => {
      if (currentUsername && currentTarget) {
        socket.send(JSON.stringify({
          username:    currentUsername,
          to_username: currentTarget,
          init:        true
        }));
      }
    };
    socket.onmessage = e => {
      try {
        const d = JSON.parse(e.data);
        if (d.history) d.history.forEach(msg=>displayMessage(msg));
        else          displayMessage(d);
      } catch{}
    };
    function sendMessage(){
      const txt=document.getElementById('message').value.trim();
      if(txt&&currentUsername&&currentTarget){
        socket.send(JSON.stringify({
          username:    currentUsername,
          to_username: currentTarget,
          message:     txt
        }));
        document.getElementById('message').value='';
      }
    }
    function displayMessage(d) {
  console.log('📨 displayMessage 收到資料:', d);

  // 1) 解析時間，支援各種格式
  let dateObj = null;
  if (d.created_at) {
    // 如果你传过来的是 "YYYY-MM-DD HH:MM:SS" 或者 ISO 字符串，都用 new Date()
    // 注意：对于 "2025-04-30 15:23:45"，部分浏览器可能解析失败
    // 所以先把空格换成 'T'
    const raw = d.created_at.replace(' ', 'T');
    dateObj = new Date(raw);
    if (isNaN(dateObj)) {
      console.warn('⚠️ created_at 解析失败，raw:', raw);
      dateObj = new Date(); 
    }
  } else {
    dateObj = new Date();
  }

  // 2) 格式化为 YYYY-MM-DD HH:MM
  const pad = n => n.toString().padStart(2, '0');
  const ts =  
    `${dateObj.getFullYear()}-${pad(dateObj.getMonth()+1)}-${pad(dateObj.getDate())}` +
    ` ${pad(dateObj.getHours())}:${pad(dateObj.getMinutes())}`;

  // 3) 渲染泡泡
  const div  = document.createElement('div');
  const self = d.username === currentUsername;
  div.classList.add('bubble', self ? 'me' : 'other');
  div.innerHTML = `
    <div class="message-info">
      <strong>${d.username}</strong> <span class="time">${ts}</span>
    </div>
    <div class="message-text">${d.message}</div>
  `;

  const chat = document.getElementById('chat');
  chat.appendChild(div);
  chat.scrollTop = chat.scrollHeight;
}

</script>

</body>
</html>
