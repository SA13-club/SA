<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Properties - EstateAgency Bootstrap Template</title>
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
    .dcard-post {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      transition: 0.3s;
    }

    .dcard-post:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dcard-header {
      display: flex;
      gap: 10px;
      font-weight: bold;
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: #222;
    }

    .dcard-tag {
      color: rgb(18, 226, 36);
    }

    .dcard-body {
      font-size: 0.95rem;
      color: #444;
      margin-bottom: 10px;
    }

    .dcard-footer {
      font-size: 0.85rem;
      color: #666;
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    .filter-bar py-3 border-bottom bg-light {
      background-color: white;
    }
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
        <h1 class="sitename">Co<span>LaB</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">主頁</a></li>
          <li><a href="about.php">操作指南</a></li>
          <li><a href="propertiesdemo.php">專案總覽</a></li>
          <li><a href="contact.php">聯絡我們</a></li>
          <?php
          if ($_SESSION['u_email']) {
            echo "<li><a href='Logout.php'>登出</a></li>";
            echo "<li><a href='account.php'>帳號中心</a></li>";
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
            <li class="current">最新專案</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Real Estate Section -->
    <section id="real-estate" class="real-estate section">

      <<div class='container'>
        <div class='row mb-4'>
          <div class='col-12 text-end'>
            <a href='newproperty.php' class="btn btn-success">
              <i class='bi bi-plus-circle me-2'></i>發布需求
            </a>
          </div>
        </div>
        <br>
        <!-- Filter Bar -->
        <!-- Filter Bar (Dynamic from DB) -->
        <!-- Filter Bar in sortdemo.php -->
        <section class="filter-bar py-3 border-bottom bg-light">
          <div class="container">
            <form method="get" action="sortdemo.php" class="d-flex flex-wrap gap-2 justify-content-center align-items-center">
              <label class="form-label me-2 mb-0">依標籤篩選：</label>

              <?php
              $link = mysqli_connect('localhost', 'root', '', 'sa');
              $tagQuery = "SELECT DISTINCT tag FROM demanded WHERE tag IS NOT NULL AND tag != ''";
              $tagResult = mysqli_query($link, $tagQuery);

              while ($row = mysqli_fetch_assoc($tagResult)) {
                $tag = $row['tag'];
                echo "<button type='submit' name='tag' value='{$tag}' class='btn btn-outline-primary'>{$tag}</button>";
              }
              ?>

              <!-- ✅ 清除篩選按鈕，導回顯示全部的頁面（例如 demand-list.php） -->
              <a href="./propertiesdemo.php" class="btn btn-outline-secondary">清除篩選</a>
            </form>
          </div>
        </section>



        <?php
        $link = mysqli_connect('localhost', 'root', '', 'sa');

        if (isset($_GET['tag'])) {
          $tag = $_GET['tag'];

          $stmt = $link->prepare("SELECT * FROM demanded WHERE tag = ?");
          $stmt->bind_param("s", $tag);
          $stmt->execute();
          $result = $stmt->get_result();

          echo "<h3 class='text-center my-4'>目前篩選：{$tag}</h3>";

          while ($row = $result->fetch_assoc()) {
            echo "
      <div class='dcard-post'>
        <a href='property-single.php?id={$row['id']}'>
          <div class='dcard-header'>
            <span class='dcard-tag'>#" . $row['tag'] . "</span>
            <span class='dcard-title'>" . $row['title'] . "</span>
          </div>
          <div class='dcard-body'>
            <p>" . $row['content'] . "</p>
          </div>
          <div class='dcard-footer'>
            <span>聯絡人："  . $row['name'] . "</span>
            <span>電話：" . $row['phone'] . "</span>
            <span>Email：" . $row['u_email'] . "</span>
          </div>
        </a>
      </div>
    ";
          }
        } else {
          echo "<p class='text-center mt-5'>未選擇標籤</p>";
        }
        ?>

        </div>
        </div>

    </section><!-- /Real Estate Section -->

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
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>