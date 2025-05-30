// server.js
const WebSocket = require('ws');
const mysql     = require('mysql2');

// 建立 MySQL 連線
const db = mysql.createConnection({
  host:     'localhost',
  user:     'root',
  password: '',
  database: 'sa'
});

db.connect(err => {
  if (err) {
    console.error('無法連接到資料庫：', err);
    process.exit(1);
  }
  console.log('✅ 成功連接到 MySQL');
});

const wss   = new WebSocket.Server({ port: 8080 });
let clients = [];

wss.on('connection', ws => {
  console.log('📡 新客戶端連線');
  clients.push(ws);

  ws.on('message', msg => {
    let data;
    try {
      data = JSON.parse(msg);
    } catch (err) {
      console.error('JSON 解析錯誤：', err);
      return;
    }

    const { username, to_username, to, init, message } = data;
    const partner = to_username || to;
    if (!username || !partner) {
      console.error('缺少 username 或 to_username');
      return;
    }

    if (init) {
      // 查歷史訊息，帶入 created_at
      const sql = `
        SELECT username, to_username, message, created_at 
        FROM messages 
        WHERE (username = ? AND to_username = ?)
           OR (username = ? AND to_username = ?)
        ORDER BY created_at
      `;
      db.query(sql, [username, partner, partner, username], (err, results) => {
        if (err) {
          console.error('查詢歷史訊息失敗：', err);
          return;
        }
        ws.send(JSON.stringify({ history: results }));
      });
      return;
    }

    if (message) {
      // 寫入新訊息（使用 NOW()）
      const insertSql = `
        INSERT INTO messages (username, to_username, message, created_at) 
        VALUES (?, ?, ?, NOW())
      `;
      db.query(insertSql, [username, partner, message], (err, result) => {
        if (err) {
          console.error('寫入訊息失敗：', err);
          return;
        }
        const newId = result.insertId;
        // 取出剛寫入的 created_at
        db.query(
          'SELECT created_at FROM messages WHERE id = ?', 
          [newId],
          (err2, rows) => {
            if (err2 || !rows.length) {
              console.error('查詢新訊息時間失敗：', err2);
              return;
            }
            const ts = rows[0].created_at;
            const payload = { username, message, created_at: ts };
            // 廣播給所有 client（包含自己）
            clients.forEach(client => {
              if (client.readyState === WebSocket.OPEN) {
                client.send(JSON.stringify(payload));
              }
            });
          }
        );
      });
    }
  });

  ws.on('close', () => {
    console.log('❌ 客戶端離線');
    clients = clients.filter(c => c !== ws);
  });
});

console.log('🚀 WebSocket 伺服器已啟動：ws://localhost:8080');
