<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$link = mysqli_connect('localhost', 'root', '', 'sa');

$u_email = $_SESSION['u_email'] ?? '';
if (!$u_email) {
    die('請先登入');
}

// 取得所有通知
$stmt = $link->prepare("SELECT id, message, is_read, created_at FROM notifications WHERE receiver_email = ? ORDER BY created_at DESC");
$stmt->bind_param("s", $u_email);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>通知中心</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h3>🔔 通知中心</h3>
  <ul class="list-group">
    <?php while ($row = $result->fetch_assoc()): ?>
      <a href="notification_detail.php?id=<?= $row['id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?= $row['is_read'] ? '' : 'list-group-item-warning' ?>">
        <span><?= htmlspecialchars(mb_strimwidth($row['message'], 0, 50, '...')) ?></span>
        <small><?= $row['created_at'] ?></small>
      </a>
    <?php endwhile; ?>
  </ul>
</body>
</html>
