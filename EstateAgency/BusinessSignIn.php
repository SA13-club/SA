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
</head>

<body class="starter-page-page">

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
          <li><a href="propertiesdemo.php">最新專案</a></li>
          <li><a href="agents.php">合作單位</a></li>
          <li><a href="contact.php">聯絡我們</a></li>
          <?php
                if ($_SESSION['u_email']) {
                    echo "<li><a href='Logout.php'>登出</a></li>";
                    echo "<li><a href='account.php'>帳號管理</a></li>";
                } else {
                    echo "<li><a href='LogIn.html'>登入</a></li>";
                    echo "<li><a href='#' data-bs-toggle='modal' data-bs-target='#SignInPermission' class='active'>註冊</a></li>";
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

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <nav class="breadcrumbs">
        <div class="container" style="padding: 85px 0 0 0;">
          <ol>
            <li><a href="index.php">首頁</a></li>
            <li class="current">企業註冊</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>企業註冊</h2>
        <p>歡迎各大企業加入此合作招募平台！</p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12">
          <form action="businessdb.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <p>一、基本公司資訊</p>
              <div class="col-md-6">
                <input type="text" class="form-control" name="c_name" placeholder="公司名稱" required="">
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" name="c_type" placeholder="公司類型" required="">
              </div>
              <div class="col-md-3">
                <select class="form-select" id="validationCustom04" name="c_industry" required>
                  <option selected disabled value="_">請選擇產業類別</option>
                  <option value="大眾傳播相關業">大眾傳播相關業</option>
                  <option value="旅遊／休閒／運動業">旅遊／休閒／運動業</option>
                  <option value="住宿／餐飲服務業">住宿／餐飲服務業</option>
                </select>
              </div>
              <div class="col-md-5">
                <input type="text" class="form-control" name="c_address" placeholder="公司地址" required="">
              </div>
              <div class="col-md-4">
                <input type="email" class="form-control" name="c_email" placeholder="公司Email" required="">
              </div>
              <div class="col-md-3">
                <input type="tel" class="form-control" name="c_phone" placeholder="公司電話" required="">
              </div>

                  <p>二、負責人與聯絡資訊</p>
                  
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="e_name" placeholder="主要聯絡人姓名" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="e_type" placeholder="職稱" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="form-control" name="e_email" placeholder="聯絡人Email" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="tel" class="form-control" name="e_phone" placeholder="聯絡人手機號碼" required="">
                  </div>
                  
                  <p>三、平台會員註冊</p>
                  <div class="col-md-5">
                    <input type="email" class="form-control" name="u_email" placeholder="Email" required="">
                  </div>
                  <div class="col-md-5">
                    <input type="password" class="form-control" name="u_password" placeholder="密碼" required="">
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="u_permission" placeholder="企業" value="企業" readonly>
                  </div>
                  <div class="col-md-12">
                    <textarea class="form-control" name="u_content" rows="3" placeholder="公司簡介" required=""></textarea>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                      <label class="form-check-label" for="exampleCheck1">
                        <a href="#">同意政策相關條款</a>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit">註冊</button>
                  </div>
  
                </div>
              </form>
          </div>
  
        </div>

    </section>

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