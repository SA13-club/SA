<?php
// complete_feedback.php

$me = $_SESSION['u_email'] ?? '';
if (!$me) {
    header('Location: login.php');
    exit;
}

$match_id = intval($_GET['match_id'] ?? $_POST['match_id'] ?? 0);
if (!$match_id) die('缺少合作編號');

$conn = new mysqli('localhost','root','','sa');
if ($conn->connect_error) die('資料庫連線失敗');

// 確認合作已完成
$stmt = $conn->prepare("SELECT status FROM match_db WHERE d_id = ?");
$stmt->bind_param('i', $match_id);
$stmt->execute();
$res = $stmt->get_result()->fetch_assoc();
$stmt->close();
if (!$res || $res['status'] !== 'completed') die('尚未完成合作，無法評分');

// 處理表單送出
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = intval($_POST['rating'] ?? 0);
    $comments = htmlspecialchars(trim($_POST['comments'] ?? ''), ENT_QUOTES);

    // 圖檔上傳
    $uploadDir = __DIR__ . '/uploads/feedback/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $imagePath = null;
    if (!empty($_FILES['feedback_image']['name'])) {
        $file = $_FILES['feedback_image'];
        $name = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file['name']));
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $name)) {
            $imagePath = 'uploads/feedback/' . $name;
        }
    }

    $ins = $conn->prepare(
        "INSERT INTO match_feedback (match_id, user_email, rating, comments, image_path, created_at)
         VALUES (?, ?, ?, ?, ?, NOW())"
    );
    $ins->bind_param('isiss', $match_id, $me, $rating, $comments, $imagePath);
    $ins->execute();
    $ins->close();

    echo '<div class="result">感謝您的回饋！<a href="dashboard.php">返回主頁</a></div>';
    exit;
}

// 若為 GET 顯示表單與現有回饋
// 取出所有回饋
$fbStmt = $conn->prepare(
    "SELECT user_email, rating, comments, image_path, created_at
     FROM match_feedback WHERE match_id = ? ORDER BY created_at DESC"
);
$fbStmt->bind_param('i', $match_id);
$fbStmt->execute();
$feedbacks = $fbStmt->get_result()->fetch_all(MYSQLI_ASSOC);
$fbStmt->close();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <title>合作回饋</title>
  <style>
    body { margin:0; padding:0; font-family: 'Segoe UI', sans-serif; background: #f0f2f5; }
    .container { max-width: 640px; margin: 3rem auto; }
    .feedback-form, .feedback-list { background: #fff; padding: 2rem; margin-bottom: 2rem;
      border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .feedback-form h2, .feedback-list h2 { margin-bottom: 1.5rem; color: #333; text-align: center; }
    .field { margin-bottom: 1.2rem; }
    label { display: block; margin-bottom: 0.6rem; font-weight: 600; color: #444; }
    textarea { width: 100%; min-height: 120px; padding: 0.8rem; border: 1px solid #ccc;
      border-radius: 4px; font-size: 1rem; resize: vertical; }
    input[type=file] { font-size: 0.9rem; }
    .star-rating { display: flex; align-items: center; justify-content: center; }
    .star-rating span {
      font-size: 1.8rem; color: #ddd; margin: 0 0.2rem; cursor: pointer;
      transition: color 0.2s;
    }
    .star-rating span.selected, .star-rating span:hover, .star-rating span:hover ~ span { color: #ffc107; }
    button { display: block; width: 100%; padding: 0.8rem; background: #28c76f;
      color: #fff; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer;
      transition: background 0.2s; }
    button:hover { background: #22a55b; }
    .feedback-item { border-bottom: 1px solid #eee; padding: 1rem 0; }
    .feedback-item:last-child { border-bottom: none; }
    .feedback-item h3 { margin: 0 0 0.5rem; font-size: 1.1rem; color: #555; }
    .feedback-item p { margin: 0.4rem 0; color: #666; }
    .feedback-item img { max-width: 100%; margin-top: 0.5rem; border-radius: 4px; }
  </style>
</head>
<body>
  <div class="container">
    <div class="feedback-form">
      <h2>提交合作回饋</h2>
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="match_id" value="<?php echo $match_id ?>">
        <div class="field">
          <label>評分</label>
          <div class="star-rating" id="starRating">
            <?php for ($i = 1; $i <= 5; $i++): ?>
              <span data-value="<?php echo $i ?>">★</span>
            <?php endfor; ?>
          </div>
          <input type="hidden" name="rating" id="ratingValue" required>
        </div>
        <div class="field">
          <label>回饋描述</label>
          <textarea name="comments" placeholder="請描述此次合作狀況..." required></textarea>
        </div>
        <div class="field">
          <label>上傳圖片 (選填)</label>
          <input type="file" name="feedback_image" accept="image/*">
        </div>
        <button type="submit">送出回饋</button>
      </form>
    </div>

    <div class="feedback-list">
      <h2>歷史回饋</h2>
      <?php if (empty($feedbacks)): ?>
        <p>目前尚無回饋。</p>
      <?php else: ?>
        <?php foreach ($feedbacks as $fb): ?>
          <div class="feedback-item">
            <h3>評分: <?php echo str_repeat('★', $fb['rating']) ?><?php echo str_repeat('☆', 5 - $fb['rating']) ?></h3>
            <p><?php echo nl2br(htmlspecialchars($fb['comments'], ENT_QUOTES)) ?></p>
            <?php if (!empty($fb['image_path'])): ?>
              <img src="<?php echo htmlspecialchars($fb['image_path']) ?>" alt="回饋圖片">
            <?php endif; ?>
            <p style="font-size:0.8rem;color:#999;">由 <?php echo htmlspecialchars($fb['user_email']) ?> 於 <?php echo $fb['created_at'] ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <script>
    const stars = document.querySelectorAll('#starRating span');
    const ratingInput = document.getElementById('ratingValue');
    stars.forEach(star => {
      star.addEventListener('click', () => {
        const val = star.getAttribute('data-value');
        ratingInput.value = val;
        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i < val; i++) stars[i].classList.add('selected');
      });
    });
  </script>
</body>
</html>
