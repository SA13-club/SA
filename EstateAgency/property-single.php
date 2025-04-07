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

<body class="property-single-page">

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

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>最新專案</h1>
              <!-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> -->
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">首頁</a></li>
            <li><a href="propertiesdemo.php">最新專案</a></li>
            <?php
              $id=$_GET['id'];
              $link = mysqli_connect('localhost', 'root', '', 'sa');
              $sql = "SELECT * FROM demanded where id='$id'";
              $result = mysqli_query($link, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<li class='current'><a >" . $row['title'] . "</a></li>";
              }
              ?>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Real Estate 2 Section -->
    <section id="real-estate-2" class="real-estate-2 section">

      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8" data-aos="fade-up">

            <div class="portfolio-description">
              <?php
              $id=$_GET['id'];
              $link = mysqli_connect('localhost', 'root', '', 'sa');
              $sql = "SELECT * FROM demanded where id='$id'";
              $result = mysqli_query($link, $sql);

              // echo "<h2 class='section-title'><strong>最新專案列表</strong></h2><br>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "
                    <div class='dcard-post'>
                      <div class='dcard-header'>
                        <span class='dcard-tag'>#" . $row['tag'] . "</span>
                        <h1 class='dcard-title'>" . $row['title'] . "</h1>
                      </div>
                    </div>
                    <div class='dcard-body'>
                      <div class='dcard-footer'>
                        <p><strong>預期目標：</strong>" . $row['target'] . "</p>
                        <p><strong>具體內容：</strong>" . $row['content'] . "</p>
                        <p><strong>聯絡人：</strong>" . $row['name'] . "</p>
                        <p><strong>電話：</strong>" . $row['phone'] . "</p>
                        <p><strong>Email：</strong>" . $row['email'] . "</p>
                        <p><strong>身份類型：</strong>" . $row['u_permission'] . "</p>
                        <p><strong>截止日期：</strong>" . $row['date'] . "</p>
                      </div>
                    </div>
                    <hr class='dcard-divider'>";
              }
              ?>

              <!-- <div class="testimonial-item">
                <p>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                </p>
                <div>
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Agent</h4>
                </div>
              </div>
            </div>
            <ul class="nav nav-pills mb-3">
              <li><a class="nav-link active" data-bs-toggle="pill" href="#real-estate-2-tab1">Video</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab2">Floor Plans</a></li>
              <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab3">Location</a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane fade show active" id="real-estate-2-tab1">

              </div>
              <div class="tab-pane fade" id="real-estate-2-tab2">
                <img src="assets/img/floor-plan.jpg" alt="" class="img-fluid">
              </div>

              -->
              <div class="tab-pane fade" id="real-estate-2-tab3">
                <!-- <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
              </div>
            </div>

          </div>

          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3>基本資料</h3>
              <ul>
                <li><strong>發布單位:</strong><?php
$link = mysqli_connect('localhost', 'root', '', 'sa');

$sql = "SELECT c.c_name 
        FROM corporation_account c 
        JOIN demanded d ON c.u_email = d.email";

$result = mysqli_query($link, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    echo "<li><strong>發布單位:</strong> {$row['c_name']}</li>";
} else {
    echo "<li>查無公司資料</li>";
}

mysqli_close($link);
?>
</li>
                <li><strong>狀態:</strong> 招募中</li>
                <li><strong>聯絡人:</strong> 可愛的狗狗</li>
                <li><strong>電話:</strong>09123456789</li>
                <li><strong>email:</strong> gmail.com</li>
                <li><strong>需求類型:</strong> 贊助</li>
              </ul>
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