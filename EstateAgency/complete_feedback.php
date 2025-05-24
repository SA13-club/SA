
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <title>合作回饋</title>
  <style>
    :root {
      --primary-color: #28c76f;
      --secondary-color: #22a55b;
      --bg-light: #f9f9f9;
      --card-bg: #ffffff;
      --text-color: #333;
      --border-radius: 10px;
      --box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    * { box-sizing: border-box; }
    body { margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: var(--bg-light); color: var(--text-color); }
    .container { max-width: 680px; margin: 2rem auto; padding: 0 1rem; }
    h2 { text-align: center; margin-bottom: 1rem; }
    .feedback-form, .feedback-list { background: var(--card-bg); padding: 2rem; margin-bottom: 2rem; border-radius: var(--border-radius); box-shadow: var(--box-shadow); }
    .field { margin-bottom: 1.5rem; }
    label { display: block; margin-bottom: .5rem; font-weight: 600; }
    textarea { width: 100%; min-height: 100px; padding: .8rem; border: 1px solid #ccc; border-radius: var(--border-radius); font-size: 1rem; resize: vertical; }
    input[type=file] { font-size: .9rem; }
    .star-rating { display: flex; justify-content: center; gap: .5rem; margin-bottom: .5rem; }
    .star-rating span { font-size: 2rem; color: #ddd; cursor: pointer; transition: color .2s; }
    .star-rating span.selected, .star-rating span:hover, .star-rating span:hover ~ span { color: #ffc107; }
    button { width: 100%; padding: 1rem; background: var(--primary-color); color: #fff; border: none; border-radius: var(--border-radius); font-size: 1rem; cursor: pointer; transition: background .3s; }
    button:hover { background: var(--secondary-color); }
    .result { text-align: center; padding: 1rem; background: #e6ffed; color: var(--secondary-color); margin-bottom: 1rem; border-radius: var(--border-radius); }
    .feedback-item { border-bottom: 1px solid #eee; padding: 1rem 0; }
    .feedback-item:last-child { border-bottom: none; }
    .feedback-item h3 { margin: 0 0 .5rem; font-size: 1.1rem; }
    .feedback-item p { margin: .5rem 0; }
    .feedback-item img { max-width: 100%; border-radius: var(--border-radius); margin-top: .5rem; }
    .feedback-list h2 { margin-bottom: 1rem; }
    
  /* 全局容器 */
  .container {

    top: padding 70px;
    max-width: 500px;
    margin: 1rem auto;
    padding: 0 0.5rem;
  }

  /* 回饋卡片 */
  .feedback-form,
  .feedback-list {
    padding: 1rem;
    margin-bottom: 1.5rem;
  }

  /* 星星評分 */
  .star-rating span {
    font-size: 1.5rem;
  }

  /* 留言框 */
  textarea {
    min-height: 80px;
  }

  /* 送出／更新按鈕 */
  button {
    padding: 0.6rem;
    font-size: 0.9rem;
  }


  </style>
   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CoLaB</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
  <style>
    section,
    .container,
    .your-other-blocks {
      background-color: transparent !important;
    }

    .page-title,
    .page-title .container,
    .breadcrumbs {
      background: transparent !important;
      z-index: 1;
    }
  </style>
</head>

<body class="properties-page" style="
  background-image: url('./assets/img/bg2.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 100vh;
  margin: 0;
">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Co<span>LaB</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">主頁</a></li>
          <li><a href="about.php">關於</a></li>
          <li><a href="services.php">服務</a></li>
          <li><a href="propertiesdemo.php" class="active">最新專案</a></li>
          <li><a href="agents.php">合作單位</a></li>
          <li><a href="contact.php">聯絡我們</a></li>
          <?php
          // 檢查用戶是否已登錄
          if (isset($_SESSION['u_email']) && $_SESSION['u_email']) {
            echo "<li><a href='Logout.php'>登出</a></li>";
            echo "<li><a href='account.php'>帳號管理</a></li>";
          } else {
            echo "<li><a href='LogIn.html'>登入</a></li>";
            echo "<li><a href='#' data-bs-toggle='modal' data-bs-target='#SignInPermission'>註冊</a></li>";
          }
          ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

<?php

// complete_feedback.php

// 確認已登入
$me = $_SESSION['u_email'] ?? '';
if (!$me) {
    header('Location: login.php');
    exit;
}

// 取得合作編號
$match_id = intval(
    $_GET['match_id']  ??
    $_POST['match_id'] ??
    0
);
if (!$match_id) die('缺少合作編號');

// 連線 DB
$conn = new mysqli('localhost','root','','sa');
if ($conn->connect_error) die('資料庫連線失敗：'. $conn->connect_error);

// 確認合作已完成
$stmt = $conn->prepare("SELECT status FROM match_db WHERE d_id = ?");
$stmt->bind_param('i', $match_id);
$stmt->execute();
$res = $stmt->get_result()->fetch_assoc();
$stmt->close();
if (!$res || $res['status'] !== 'completed') die('尚未完成合作，無法評分');

// 檢查使用者是否已提供過回饋
$check = $conn->prepare(
    "SELECT id, rating, comments, image_path
     FROM match_feedback
     WHERE match_id = ? AND user_email = ?
     LIMIT 1"
);
$check->bind_param('is', $match_id, $me);
$check->execute();
$existing = $check->get_result()->fetch_assoc();
$check->close();

// 初始化表單值
if ($existing) {
    $isUpdate        = true;
    $fb_id           = (int)$existing['id'];
    $feedbackScore   = (int)$existing['rating'];
    $feedbackComment = $existing['comments'];
    $existingImage   = $existing['image_path'];
} else {
    $isUpdate        = false;
    $fb_id           = 0;
    $feedbackScore   = 0;
    $feedbackComment = '';
    $existingImage   = null;
}

// 處理表單送出
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating  = intval($_POST['rating']   ?? 0);
    $comments = htmlspecialchars(trim($_POST['comments'] ?? ''), ENT_QUOTES);

    // 圖檔上傳（如有）
    $uploadDir = __DIR__ . '/uploads/feedback/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $imagePath = $existingImage;
    if (!empty($_FILES['feedback_image']['name'])) {
        $file  = $_FILES['feedback_image'];
        $name  = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file['name']));
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $name)) {
            $imagePath = 'uploads/feedback/' . $name;
        }
    }

    if ($isUpdate) {
        // 更新既有回饋
        $upd = $conn->prepare(
            "UPDATE match_feedback
             SET rating = ?, comments = ?, image_path = ?, updated_at = NOW()
             WHERE id = ? AND user_email = ?"
        );
        $upd->bind_param('issis', $rating, $comments, $imagePath, $fb_id, $me);
        $success = $upd->execute();
        $upd->close();
        $msg = $success ? '回饋已更新！' : '更新失敗：' . $conn->error;
    } else {
        // 插入新回饋
        $ins = $conn->prepare(
            "INSERT INTO match_feedback
             (match_id, user_email, rating, comments, image_path, created_at)
             VALUES (?, ?, ?, ?, ?, NOW())"
        );
        $ins->bind_param('isiss', $match_id, $me, $rating, $comments, $imagePath);
        $success = $ins->execute();
        $ins->close();
        $msg = $success ? '感謝您的回饋！' : '儲存失敗：' . $conn->error;
        if ($success) {
            // 切換到 update 模式
            $isUpdate = true;
            // 取得剛剛新增的 id
            $fb_id = $conn->insert_id;
        }
    }

    // 更新畫面用的值
    $feedbackScore   = $rating;
    $feedbackComment = $comments;
    $existingImage   = $imagePath;
}
?>

<body>
  <div class="container">
    <div class="feedback-form">
      <h2><?php echo $isUpdate ? '修改您的回饋' : '新增您的回饋'; ?></h2>
      <?php if (!empty($msg)): ?>
        <div class="result"><?php echo htmlspecialchars($msg); ?></div>
      <?php endif; ?>
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="match_id" value="<?php echo $match_id ?>">
        <div class="field">
          <label>評分</label>
          <div class="star-rating" id="starRating">
            <?php for ($i = 1; $i <= 5; $i++): ?>
              <span class="<?php echo ($i <= $feedbackScore ? 'selected' : '')?>" data-value="<?php echo $i?>">★</span>
            <?php endfor; ?>
          </div>
          <input type="hidden" name="rating" id="ratingValue" value="<?php echo $feedbackScore?>" required>
        </div>
        <div class="field">
          <label>回饋描述</label>
          <textarea name="comments" placeholder="請描述此次合作狀況..." required><?php echo htmlspecialchars($feedbackComment);?></textarea>
        </div>
        <div class="field">
          <label>上傳圖片 (選填)</label>
          <?php if ($existingImage): ?>
            <div style="margin-bottom: .5rem;"><img src="<?php echo htmlspecialchars($existingImage)?>" alt="回饋圖" style="max-width:150px;border:1px solid #ddd;border-radius:4px;"></div>
          <?php endif; ?>
          <input type="file" name="feedback_image" accept="image/*">
        </div>
        <button type="submit"><?php echo $isUpdate ? '更新回饋' : '送出回饋'; ?></button>
      </form>
    </div>
    <div class="container">
      <div class="feedback-list">
        <h2>歷史回饋</h2>
        <?php
          // 重新取出最新所有回饋
          $listStmt = $conn->prepare(
            "SELECT user_email, rating, comments, image_path, created_at
            FROM match_feedback WHERE match_id = ? ORDER BY created_at DESC"
          );
          $listStmt->bind_param('i', $match_id);
          $listStmt->execute();
          $all = $listStmt->get_result()->fetch_all(MYSQLI_ASSOC);
          $listStmt->close();
        ?>
        <?php if (empty($all)): ?>
          <p>目前尚無回饋。</p>
        <?php else: ?>
          <?php foreach ($all as $fb): ?>
            <div class="feedback-item">
              <h3>評分: <?php echo str_repeat('★', $fb['rating']); ?><?php echo str_repeat('☆', 5 -$fb['rating']); ?></h3>
              <p><?php echo nl2br(htmlspecialchars($fb['comments'], ENT_QUOTES)); ?></p>
              <?php if (!empty($fb['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($fb['image_path'])?>" alt="回饋圖片">
              <?php endif; ?>
              <p style="font-size:0.8rem;color:#999; margin-top:.5rem;">
                由 <?php echo htmlspecialchars($fb['user_email'])?> 於 <?php echo $fb['created_at']?> 提交
              </p>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
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


  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">EstateAgency</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</html>
