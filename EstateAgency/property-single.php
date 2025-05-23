<?php
      session_start();
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
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

  <!-- =======================================================
  * Template Name: EstateAgency
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Updated: Aug 09 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


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

  <main class="main">
  
  <?php 
  $u_permission = $_SESSION['u_permission'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sa";
  $conn = new mysqli($servername, $username, $password, $dbname); 
  $sql = "(SELECT d_ban FROM demaned; )";//問題一
  if ($u_permission == '企業') {
            $stmt = $conn->prepare("SELECT * FROM Corporation_Registrations WHERE u_email = ?");
        } else if ($u_permission == '組織團體') {
            $stmt = $conn->prepare("SELECT * FROM Organization_Registrations WHERE u_email = ?");
        }else if ($u_permission == '管理者') {
            $stmt = $conn->prepare("SELECT * FROM user_account WHERE u_email = ?");
        } else {
            die("無效的使用者權限");
        }
  ?>
  

    <!-- 註冊選擇權限的模態框 -->
    <div class="modal fade" id="SignInPermission" tabindex="-1" aria-labelledby="SignInPermissionLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 style="color: #1b1b1b;" class="modal-title fs-5" id="SignInPermissionLabel">請問您的身分是？</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <a href="BusinessSignIn.php" class="btn-permission">企業</a>
            <a href="OgnizationSignIn.php" class="btn-permission">組織團體</a>
            <a href="PersonalSignIn.php" class="btn-permission">個人</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <nav class="breadcrumbs">
        <div class="container" style="padding: 85px 0 0 0;">
          <ol>
            <li><a href="index.php">首頁</a></li>
            <li class="current">最新專案</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
      

    <!-- Real Estate 2 Section -->
    <section id="real-estate-2" class="real-estate-2 section">
        
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>最新專案</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8" data-aos="fade-up">
            <div class="portfolio-description">
              <?php
              // 顯示錯誤報告（開發時使用，生產環境可關閉）
              ini_set('display_errors', 1);
              ini_set('display_startup_errors', 1);
              error_reporting(E_ALL);

              // 建立資料庫連接
              $link = mysqli_connect('localhost', 'root', '', 'sa');
              if (!$link) {
                die('資料庫連接失敗: ' . mysqli_connect_error());
              }

              // 安全處理 GET 參數
              $d_id = isset($_GET['id']) ? mysqli_real_escape_string($link, $_GET['id']) : 0;
              if (!$d_id) {
                die('錯誤：無效的專案ID！');
              }

              // 尋找標籤和權限
              $sql_demand = "SELECT tag, u_permission FROM demanded WHERE d_id = '$d_id'";
              $demand_result = mysqli_query($link, $sql_demand);

              if (!$demand_result) {
                die('資料庫查詢錯誤: ' . mysqli_error($link));
              }

              $demand = mysqli_fetch_assoc($demand_result);
              if (!$demand) {
                die('錯誤：找不到這個需求！');
              }

              $tag = $demand['tag'];
              $permission = $demand['u_permission'];

              // 根據標籤決定查詢哪個表格
              $table = '';
              $title_key = 'title'; // 預設

              switch ($tag) {
                case '合作':
                  $title_key = 'coop_name';
                  // 檢查 corp_coop 是否有資料
                  $check_sql = "SELECT 1 FROM corp_coop WHERE d_id = '$d_id'";
                  $check_result = mysqli_query($link, $check_sql);
                  if ($check_result && mysqli_num_rows($check_result) > 0) {
                    $table = 'corp_coop';
                    break;
                  }

                  // 檢查 club_coop 是否有資料
                  $check_sql = "SELECT 1 FROM club_coop WHERE d_id = '$d_id'";
                  $check_result = mysqli_query($link, $check_sql);
                  if ($check_result && mysqli_num_rows($check_result) > 0) {
                    $table = 'club_coop';
                    break;
                  }

                  die('錯誤：找不到合作內容');
                case 'spon':
                  $table = 'org_donate';
                  $title_key = 'event_name';
                  break;
                case '贊助':
                  $table = 'cor_spons';
                  $title_key = 'title';
                  break;
                case '實習':
                  $table = 'cor_intern';
                  $title_key = 'intern_title';
                  break;
                default:
                  die('錯誤：未知的標籤類型！');
              }

              // 查詢內容
              $content_sql = "SELECT * FROM $table WHERE d_id='$d_id'";
              $content_result = mysqli_query($link, $content_sql);

              if (!$content_result) {
                die('資料庫查詢錯誤: ' . mysqli_error($link));
              }

              $content_row = mysqli_fetch_assoc($content_result);
              if (!$content_row) {
                echo "<p>找不到相關資料</p>";
                exit;
              }

              // 解析 JSON 欄位
              $money_exposure = [];
              if (!empty($content_row['money_exposure'])) {
                $money_exposure = json_decode($content_row['money_exposure'], true) ?: [];
              }

              $product_methods = [];
              if (!empty($content_row['product_methods'])) {
                $product_methods = json_decode($content_row['product_methods'], true) ?: [];
              }

              $deadline = isset($content_row['deadline']) && $content_row['deadline'] !== '0000-00-00' 
                  ? htmlspecialchars($content_row['deadline']) 
                  : '無截止日期';

              // 顯示內容
              echo "
              <div class='dcard-post' style='border:1px solid #ccc; border-radius:10px; padding:20px; margin:20px 0; background:#f9f9f9;'>
                <div class='dcard-header' style='margin-bottom:20px;'>
                  <h2 style='margin:0; font-size:26px;'>✏️ " . htmlspecialchars($content_row[$title_key] ?? '無標題') . "</h2>
                </div>
                <div class='dcard-body' style='font-size:16px; line-height:1.8;'>
                  <p></p>
                  <hr style='margin:15px 0;'>
              ";

              switch ($tag) {
                case '合作':
                  echo "
                  <p>🤝 <strong>合作名稱：</strong> " . htmlspecialchars($content_row['coop_name'] ?? '無資料') . "</p>
                  <p>📝 <strong>合作說明：</strong> " . htmlspecialchars($content_row['coop_desc'] ?? '無資料') . "</p>
                  <p>📂 <strong>合作類型：</strong> " . htmlspecialchars($content_row['coop_type'] ?? '無資料') . "</p>
                  <p>📝 <strong>預期效益：</strong> " . htmlspecialchars($content_row['benefit'] ?? '無資料') . "</p>
                  <p>📂 <strong>活動地址：</strong> " . 
                  ((!empty($content_row['city']) ? htmlspecialchars($content_row['city']) : '無資料') . 
                  (!empty($content_row['district']) ? " " . htmlspecialchars($content_row['district']) : '') . 
                  (!empty($content_row['address']) ? " " . htmlspecialchars($content_row['address']) : '')) . 
                  "</p>";

                  if (!empty($content_row['coop_benefit'])) {
                    $coop_benefit = json_decode($content_row['coop_benefit'], true) ?: [];
                    echo "<p>🎯 <strong>合作效益：</strong></p><ul style='margin-left:20px;'>";
                    foreach ($coop_benefit as $benefit) {
                      echo "<li>" . htmlspecialchars($benefit) . "</li>";
                    }
                    echo "</ul>";
                  }
                  echo "
                  <p>🗓️ <strong>合作期間：</strong> " . htmlspecialchars($content_row['coop_start'] ?? '') . " ～ " . htmlspecialchars($content_row['coop_end'] ?? '') . "</p>
                  ";
                  break;

                case 'spon': // org_donate
                  echo "
                  <p>🎈 <strong>活動名稱：</strong> " . htmlspecialchars($content_row['event_name'] ?? '無資料') . "</p>
                  <p>🙋‍♂️ <strong>參與人數：</strong> " . htmlspecialchars($content_row['event_participate'] ?? '無資料') . "<strong>人</strong></p>
                  <p>📝 <strong>活動描述：</strong> " . htmlspecialchars($content_row['event_description'] ?? '無資料') . "</p>
                  <p>💰 <strong>贊助方式：</strong> " . htmlspecialchars($content_row['sponsor_method'] ?? '無資料') . "</p>
                  <p>💸 <strong>贊助金額：</strong> " . (isset($content_row['sponsor_amount']) ? number_format((float)$content_row['sponsor_amount']) : '0') . " 元</p>
                  ";
                  break;

                case '贊助': // cor_spons
                  echo "
                  <p>💰 <strong>贊助方式：</strong> " . htmlspecialchars($content_row['sponsor_method'] ?? '無資料') . "</p>
                  <p>💸 <strong>贊助金額：</strong> " . (isset($content_row['sponsor_amount']) ? number_format((float)$content_row['sponsor_amount']) : '0') . " 元</p>
                  <p>📝 <strong>宣傳詳情：</strong> " . htmlspecialchars($content_row['content'] ?? '無資料') . "</p>
                  ";
                  break;

                case '實習': // cor_intern
                  echo "
                  <p>🧑‍💼 <strong>職缺名稱：</strong> " . htmlspecialchars($content_row['intern_title'] ?? '無資料') . "</p>
                  <p>👥 <strong>招募人數：</strong> " . htmlspecialchars($content_row['intern_number'] ?? '無資料') . " 人</p>
                  <p>💵 <strong>薪資：</strong> " . htmlspecialchars($content_row['salary'] ?? '無資料') . "</p>
                  <p>📍 <strong>地區：</strong> " . htmlspecialchars(($content_row['intern_city'] ?? '') . ' ' . ($content_row['intern_district'] ?? '')) . "</p>
                  <p>🕰️ <strong>工作時間：</strong> " . htmlspecialchars($content_row['worktime'] ?? '無資料') . "</p>
                  <p>🛠️ <strong>技能要求：</strong> " . htmlspecialchars($content_row['jobskill'] ?? '無資料') . "</p>
                  <p>📋 <strong>實習內容：</strong> " . htmlspecialchars($content_row['intern_detail'] ?? '無資料') . "</p>
                  <p>📜 <strong>其他需求：</strong> " . htmlspecialchars($content_row['requirements'] ?? '無資料') . "</p>
                  ";
                  break;
              }

              // 顯示曝光方式
              if (!empty($money_exposure)) {
                echo "<p>📢 <strong>金錢曝光方式：</strong></p><ul style='margin-left:20px;'>";
                foreach ($money_exposure as $exposure) {
                  echo "<li>" . htmlspecialchars($exposure) . "</li>";
                }
                echo "</ul>";
              }

              if (!empty($product_methods)) {
                echo "<p>🎁 <strong>產品曝光方式：</strong></p><ul style='margin-left:20px;'>";
                foreach ($product_methods as $product) {
                  echo "<li>" . htmlspecialchars($product) . "</li>";
                }
                echo "</ul>";
              }

              // 顯示建立時間和截止日期
              echo "
                  <p>🕓 <strong>建立時間：</strong> " . htmlspecialchars($content_row['created_at'] ?? '') . "</p>
                  <p>⏳ <strong>截止日期：</strong> $deadline</p>
                </div>
              </div>
              ";
              ?>
              <div class="tab-pane fade" id="real-estate-2-tab3">
              </div>
            </div>
          </div>
          <?php if ($u_permission !== '管理者'): ?>

          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3>基本資料</h3>
              <ul>
                <?php
                // 顯示公司資訊
                echo "<li><p>🏢 <strong>公司名稱：</strong><a href='profile.php?d_id=" . htmlspecialchars($d_id) . "'> " . 
                  htmlspecialchars($content_row['c_name'] ?? '無資料') . "</a></p></li>
                  <li><p>📧 <strong>聯絡信箱：</strong> " . 
                  htmlspecialchars($content_row['c_email'] ?? '無資料') . "</p></li>
                  <li><p>📞 <strong>聯絡電話：</strong> " . 
                  htmlspecialchars($content_row['c_phone'] ?? '無資料') . "</p></li>";

                // 聊天功能
                $receiver_query = "SELECT u_email FROM demanded WHERE d_id = '" . mysqli_real_escape_string($link, $d_id) . "'";
                $receiver_result = mysqli_query($link, $receiver_query);
                
                if ($receiver_result) {
                  $receiver_row = mysqli_fetch_assoc($receiver_result);
                  $receiver_email = $receiver_row['u_email'] ?? '';
                  
                  // 獲取當前用戶的電子郵件（如果已登錄）
                  $u_email = isset($_SESSION['u_email']) ? $_SESSION['u_email'] : '';
                  
                  // 安全編碼 URL 參數
                  $safe_email = urlencode($u_email);
                  $safe_receiver = urlencode($receiver_email);
                  
                  // 根據登錄狀態顯示適當的聊天按鈕
                  if (isset($_SESSION['u_permission']) && $_SESSION['u_permission']) {
                    echo '<li><a class="btn" style="background-color: #28c76f; color: white;" href="./chat/public/index .php?u_email=' . 
                      $safe_email . '&receiver=' . $safe_receiver . '" target="_blank">聊天室</a></li>';
                  } else {
                    echo '<li><a href="#" onclick="alert(\'請先登錄再進行洽談\'); return false;" class="btn">聊天室</a></li>';
                  }
                } else {
                  echo '<li>無法獲取聯絡資訊</li>';
                }
                ?>
                <li class="my-2">
                  <button class="btn" style="background-color: #28c76f; color: white;"
                    onclick="if(confirm('確認是否申請合作？')) { window.location.href='submitdb.php?d_id=<?= htmlspecialchars($d_id) ?>'; }">
                    我想合作
                  </button>
                </li>
                <li 
              </ul>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($u_permission === '管理者'): ?>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
            <h3>基本資料</h3>
              <ul>
                <?php
                // 顯示公司資訊
                echo "<li><p>🏢 <strong>公司名稱：</strong><a href='profile.php?d_id=" . htmlspecialchars($d_id) . "'> " . 
                  htmlspecialchars($content_row['c_name'] ?? '無資料') . "</a></p></li>
                  <li><p>📧 <strong>聯絡信箱：</strong> " . 
                  htmlspecialchars($content_row['c_email'] ?? '無資料') . "</p></li>
                  <li><p>📞 <strong>聯絡電話：</strong> " . 
                  htmlspecialchars($content_row['c_phone'] ?? '無資料') . "</p></li>";
                  ?>
              </ul> <!-- 問題一 -->
              <div class='dcard-body'>
                <p><strong>⚠️ 此文章已被檢舉 <?= (int)$row['d_ban'] ?> 次</strong></p> 
              </div>                                               

            <div class="my-2">
              <a href='deletepost.php?id=<?= htmlspecialchars($row['d_id']) ?>'
                class='btn btn-sm btn-danger'
                onclick="return confirm('確定要刪除這篇文章嗎？')">
                <i class='bi bi-trash'></i> 刪除文章
              </a>
            </div>
          <?php endif; ?>
          </div>
          </div>


        </div>
      </div>
    </section><!-- /Real Estate 2 Section -->

  </main>

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
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

</body>

</html>