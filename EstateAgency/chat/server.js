const WebSocket = require('ws');
const mysql = require('mysql2');

// 建立 MySQL 連線
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',    // 請填你的MySQL帳號
  password: '',    // 請填你的MySQL密碼
  database: 'test' // 你的資料庫名稱
});

db.connect((err) => {
  if (err) {
    console.error('無法連接到資料庫：', err);
    process.exit(1);
  }
  console.log('成功連接到 MySQL 資料庫');
});

const wss = new WebSocket.Server({ port: 8080 });

let clients = [];

wss.on('connection', (ws) => {
  console.log('有新的客戶端連接');
  clients.push(ws);

  // 🔥 一連進來，把歷史訊息傳給新進來的人
  db.query('SELECT username, to_username AS to, message FROM messages ORDER BY id ASC', (err, results) => {
    if (err) {
      console.error('讀取歷史訊息失敗：', err);
    } else {
      results.forEach(row => {
        const payload = JSON.stringify({
          username: row.username,
          to: row.to,
          message: row.message
        });
        ws.send(payload); // 只傳給這個連線的人
      });
    }
  });

  ws.on('message', (msg) => {
    console.log('收到訊息：' + msg);

    let parsed;
    try {
      parsed = JSON.parse(msg);
    } catch (err) {
      console.error('訊息格式錯誤：', err);
      return;
    }

    const { username, to, message } = parsed;

    if (!username || !to || !message) {
      console.error('收到不完整的訊息');
      return;
    }

    // 存到資料庫
    const sql = 'INSERT INTO messages (username, to_username, message) VALUES (?, ?, ?)';
    db.query(sql, [username, to, message], (err, result) => {
      if (err) {
        console.error('寫入資料庫失敗：', err);
      } else {
        console.log(`訊息儲存成功！ID: ${result.insertId}`);
      }
    });

    // 廣播給所有連線中的人
    clients.forEach(client => {
      if (client.readyState === WebSocket.OPEN) {
        client.send(msg);
      }
    });
  });

  ws.on('close', () => {
    console.log('一個客戶端斷線');
    clients = clients.filter(c => c !== ws);
  });
});

console.log('WebSocket 伺服器已啟動，網址：ws://localhost:8080');
