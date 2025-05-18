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
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

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
    .chat-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #0084ff;
      color: white;
      padding: 12px 18px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      z-index: 999;
      transition: background-color 0.3s;
    }

    .chat-button:hover {
      background-color: #006bbf;
    }
  </style>

</head>

<body class="index-page"style="
  background-image: url('/SA/EstateAgency/assets/img/bg2.png');
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
          <li><a href="index.php" class="active">主頁</a></li>
          <li><a href="about.php">關於</a></li>
          <li><a href="services.php">服務</a></li>
          <li><a href="propertiesdemo.php">最新專案</a></li>
          <li><a href="agents.php">合作單位</a></li>
          <li><a href="contact.php">聯絡我們</a></li>
          <?php
          if ($_SESSION['u_email']) {
            echo "<li><a href='Logout.php'>登出</a></li>";
            echo "<li><a href='account.php'>帳號管理</a></li>";
          } else {
            echo "<li><a href='LogIn.html'>登入</a></li>";
            echo "<li><a href='#' data-bs-toggle='modal' data-bs-target='#SignInPermission'>註冊</a></li>";
          }
          ?>
          <!-- <li><a href="LogIn.html">登入</a></li>
          <li><a href="#" data-bs-toggle="modal" data-bs-target="#SignInPermission">註冊</a></li> -->

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
          <div class="carousel-container">
            <div>
              <!-- <p>Organization</p> -->
              <h2><span>組織團體 </span>Organization</h2>
            </div>
          </div>
        </div><!-- End Carousel Item -->

        <!-- Modal -->
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

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-2.jpg" alt="">
          <div class="carousel-container">
            <div>
              <!-- <p>Doral, Florida</p> -->
              <h2><span>企業 </span> Business</h2>
            </div>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
          <div class="carousel-container">
            <div>
              <!-- <p>Doral, Florida</p> -->
              <h2><span>個人 </span>Person</h2>
              <a href="property-single.php" class="btn-get-started">rent | $ 3.000</a>
            </div>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>推薦文章</h2>
        <p>依照評分推薦</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
                   <?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "sa";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 1. 計算每個 email 的平均分並排序

$ratings = [];
$sql = "
    SELECT a_u_email AS email, b_feedback AS feedback
      FROM match_db
     WHERE status = 'completed' AND b_feedback <> 0 
    UNION ALL
    SELECT b_u_email AS email, a_feedback AS feedback
      FROM match_db
     WHERE status = 'completed' AND a_feedback <> 0
";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $email = $row['email'];
    $score = (float)$row['feedback'];
    if (!isset($ratings[$email])) {
        $ratings[$email] = ['total'=>0,'count'=>0];
    }
    $ratings[$email]['total'] += $score;
    $ratings[$email]['count']++;
}
$averages = [];
foreach ($ratings as $email => $d) {
    $averages[$email] = round($d['total'] / $d['count'], 2);
}
arsort($averages);
$topUsers = array_keys($averages);

// 2. 依平均分高低，為每個 user 找一篇「尚未 completed/terminated」的文章
$foundDemands = [];
foreach ($topUsers as $email) {
    $lastCheckedId = null;
    while (true) {
        // 取該 user 最新一篇未檢查過的文章
        $stmt1 = $conn->prepare("
            SELECT d_id, d_date 
              FROM demanded
             WHERE u_email = ?
               AND (? IS NULL OR d_id < ?)
             ORDER BY d_id DESC
             LIMIT 1
        ");
        $stmt1->bind_param('sis', $email, $lastCheckedId, $lastCheckedId);
        $stmt1->execute();
        $r1 = $stmt1->get_result();
        $stmt1->close();
        if (!$r1 || $r1->num_rows === 0) {
            // 沒文章了，跳到下一位
            break;
        }
        $row1 = $r1->fetch_assoc();
        $d_id = (int)$row1['d_id'];
        $lastCheckedId = $d_id;

        // 檢查這筆 demanded 在 match_db 是否已有 completed/terminated
        $stmt2 = $conn->prepare("
            SELECT COUNT(*) 
              FROM match_db
             WHERE demanded_id = ?
               AND status IN ('completed','terminated')
        ");
        $stmt2->bind_param('i', $d_id);
        $stmt2->execute();
        $stmt2->bind_result($cnt);
        $stmt2->fetch();
        $stmt2->close();

        if ($cnt === 0) {
            // 找到符合條件的文章，收錄後跳出 inner while
            $foundDemands[] = ['d_id'=> $d_id, 'd_date'=> $row1['d_date']];
            break;
        }
        // 若有記錄，繼續往更舊文章找
    }
    if (count($foundDemands) >= 6) {
        break;  // 已經收齊 6 筆
    }
}


// 3. 如果還沒滿 6 筆，用 demanded 最新文章補足，並避開已完成/終止
// 3. 如果还没满 6 笔，用 demanded 最新文章补足，避开相同 u_permission
if (count($foundDemands) < 6) {
    // 取 session 里的 u_permission
    $u_permission = $_SESSION['u_permission'];

    // 准备语句：排除掉相同 permission 的记录
    $stmt3 = $conn->prepare("
        SELECT d_id, d_date
          FROM demanded
         WHERE u_permission != ?
         ORDER BY d_id DESC
    ");
    $stmt3->bind_param('s', $u_permission);
    $stmt3->execute();
    $r = $stmt3->get_result();

    // 准备检查 match_db 状态的语句
    $checkStmt = $conn->prepare("
        SELECT COUNT(*)
          FROM match_db
         WHERE demanded_id = ?
           AND status IN ('completed','terminated')
    ");

    // 循环补足到 6 笔
    while (count($foundDemands) < 6 && ($row = $r->fetch_assoc())) {
        $d_id = (int)$row['d_id'];

        // 排除已收录过的
        $exists = false;
        foreach ($foundDemands as $d) {
            if ($d['d_id'] === $d_id) {
                $exists = true;
                break;
            }
        }
        if ($exists) {
            continue;
        }

        // 检查这篇 demanded 是否在 match_db 里已有 completed/terminated
        $checkStmt->bind_param('i', $d_id);
        $checkStmt->execute();
        $checkStmt->bind_result($termCount);
        $checkStmt->fetch();
        $checkStmt->reset();

        // 仅当没有 completed/terminated 才收录
        if ($termCount === 0) {
            $foundDemands[] = [
                'd_id'   => $d_id,
                'd_date' => $row['d_date'],
            ];
        }
    }

    $checkStmt->close();
    $stmt3->close();
}


// 4. 輸出結果
if (!empty($foundDemands)) {
    echo "<h3>選定文章列表</h3>";
    foreach ($foundDemands as $d) {
         



        echo '
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <a href="property-single.php?id='.$d['d_id'].'" class="stretched-link">
                <h3>標題</h3>
              </a>
              <p>內文</p>
            </div>
          </div><!-- End Service Item -->';
    }
} else {
    echo "<p>目前沒有任何文章可供媒合。</p>";
}

$conn->close();
?>





          


        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Agents Section -->
    <section id="agents" class="agents section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>最鐵贊助商</h2>
        <p>贊助排行榜</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>黃經理</h4>
                <span>已贊助50+社團與組織</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>林董事</h4>
                <span>已贊助50k+</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>張經理</h4>
                <span>已促成多次職涯講座<br></span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Agents Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>用戶回饋</h2>
        <p>最真實的用戶反應</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">



            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  評論一
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>用戶一</h3>
                  <h4>身份</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  評論二
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>用戶二</h3>
                  <h4>身份</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  評論三
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>用戶三</h3>
                  <h4>身份</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  評論四
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>用戶四</h3>
                  <h4>身份</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  評論五
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>用戶五</h3>
                  <h4>身份</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">EstateAgency</strong> <span>All Rights Reserved</span>
      </p>
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
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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
 
  <?php

 $u_email = $_SESSION['u_email'] ?? '';
 $safe_email = urlencode($u_email); // 確保網址安全
 if ($_SESSION['u_permission']) {
   echo '<a href="./chat/public/index .php?u_email=' . $safe_email . '" target="_blank" class="chat-button">聊天室</a>';
 }
 ?>


</body>

</html>