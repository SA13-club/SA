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
<style>
  /* 1. 整體區塊調整 */
.about-images {
  position: relative;
  padding: 2rem 1rem;
}

/* 2. 使用 Flexbox 微調欄位間距 */
.about-images .row.gy-6 {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}
.about-images.layout-right {
  padding: 2rem 1rem;
}


/* 3. 統一圖片外觀 */
.about-images .img-fluid {
  width: 100%;
  height: auto;
  border-radius: 0.75rem;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* 4. 滑鼠懸停放大效果 */
.about-images .img-fluid:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

/* 5. 第一張圖往下微位移，製造錯落感 */
.about-images .col-lg-6:first-child {
  transform: translateY(1rem);
}

/* 6. 第二張圖向內縮，並再往上微位移 */
.about-images .col-lg-6:last-child {
  display: flex;
  justify-content: flex-end;
  align-items: flex-start;
  transform: translate(-1rem, -1rem);
}

/* 7. 小螢幕下讓圖片自動堆疊 */
@media (max-width: 767.98px) {
  .about-images .row.gy-6 {
    display: block;
  }
  .about-images .col-lg-6 {
    transform: none !important;
    margin-bottom: 1rem;
  }
}
/* ── 讓圖片欄位變寬（從50%→60%）並撐滿欄位 ── */
.about-images.layout-right .row.gy-6 .col-lg-6 {
  flex: 0 0 60%;
  max-width: 60%;
}

.about-images.layout-right .row.gy-6 .col-lg-6 .img-fluid {
  width: 100%;
  /* 如果還想再放大一點，改成 110% 或 120% */
  /* width: 110%; */
}
/* ── 三圖＋往右斜放 ── */
.about-images.layout-right.skew-right {
  padding: 2rem 1rem;
}

/* Flex 容器，靠右對齊 */
.about-images.layout-right.skew-right > .row {
  display: flex;
  flex-wrap: nowrap;
  gap: 1rem;
  justify-content: flex-end;
}

/* 三分之一寬度 */
.about-images.layout-right.skew-right .col-lg-4 {
  flex: 0 0 33.333%;
  max-width: 33.333%;
  /* 斜轉 5 度 */
  transform: rotate(5deg);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* 錯落 Y 軸位移 */
.about-images.layout-right.skew-right .col-lg-4:nth-child(1) {
  transform: rotate(5deg) translateY(-1rem);
}
.about-images.layout-right.skew-right .col-lg-4:nth-child(2) {
  transform: rotate(5deg) translateY(0);
}
.about-images.layout-right.skew-right .col-lg-4:nth-child(3) {
  transform: rotate(5deg) translateY(1rem);
}

/* 統一圖片圓角＋陰影＋懸停放大 */
.about-images.layout-right.skew-right .img-fluid {
  width: 100%;
  height: auto;
  border-radius: 0.75rem;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}
.about-images.layout-right.skew-right .img-fluid:hover {
  transform: rotate(5deg) scale(1.05);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

/* 小螢幕：直排、取消斜轉與位移 */
@media (max-width: 767.98px) {
  .about-images.layout-right.skew-right > .row {
    display: block;
  }
  .about-images.layout-right.skew-right .col-lg-4 {
    max-width: 100%;
    transform: none !important;
    margin-bottom: 1rem;
  }
}
/* ── 讓三張圖再放大 10% ── */
.about-images.layout-right.skew-right .img-fluid {
  width: 110%;        /* 原本 100% → 放大到 110% */
  max-width: none;    /* 取消 max-width 限制 */
}

/* 如果你想同時在 transform 裡加 scale，也可以這樣： */
.about-images.layout-right.skew-right .col-lg-4 {
  /* 原本只有 rotate + translateY，改成加 scale(1.05) */
  transform: rotate(5deg) translateY(0) scale(1.05);
}
.about-images.layout-right.skew-right .col-lg-4:nth-child(1) {
  transform: rotate(5deg) translateY(-1rem) scale(1.05);
}
.about-images.layout-right.skew-right .col-lg-4:nth-child(2) {
  transform: rotate(5deg) translateY(0) scale(1.05);
}
.about-images.layout-right.skew-right .col-lg-4:nth-child(3) {
  transform: rotate(5deg) translateY(1rem) scale(1.05);
}




/* ── 四圖＋兩張一層＋向右斜放 ── */
.about-images.layout-right.skew-right > .row {
  display: flex;
  flex-wrap: wrap;      /* 允許換行 */
  gap: 1rem;
  justify-content: flex-end;  /* 靠右排 */
}

/* 每張圖佔 50% 寬度 */
.about-images.layout-right.skew-right .col-lg-6 {
  flex: 0 0 50%;
  max-width: 50%;
  transform: rotate(5deg);  /* 斜轉 */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* 交替上下錯落 + 放大 */
.about-images.layout-right.skew-right .col-lg-6:nth-child(odd) {
  transform: rotate(5deg) translateY(-1rem) scale(1.05);
}
.about-images.layout-right.skew-right .col-lg-6:nth-child(even) {
  transform: rotate(5deg) translateY(1rem) scale(1.05);
}

/* 圓角、陰影、懸停放大 */
.about-images.layout-right.skew-right .img-fluid {
  width: 200%;       /* 從 100% → 120% */
  max-width: none;   /* 取消限制 */
  border-radius: 0.75rem;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}
.about-images.layout-right.skew-right .img-fluid:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

/* 手機版：直排、取消斜轉與錯落 */
@media (max-width: 767.98px) {
  .about-images.layout-right.skew-right > .row {
    display: block;
  }
  .about-images.layout-right.skew-right .col-lg-6 {
    max-width: 100%;
    transform: none !important;
    margin-bottom: 1rem;
  }
}

.about-images.layout-right.skew-right {
  padding: 2rem 1rem 2rem 1rem;
  padding-right: 12rem; /* 保留右側空間 */

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
        <h1 class="sitename">Co<span>LaB</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">主頁</a></li>
          <li><a href="about.php" class="active">操作指南</a></li>
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
            <li class="current">操作指南</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container section-title" data-aos="fade-up">
          <h2>操作指南</h2>
          <p class="mb-0">你不會，我教你</p>
      </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are"></p>
            <h3>註冊與登入</h3>
            <p class="fst-italic">
             建立新帳號
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>註冊與登入</span></li>
              <li><i class="bi bi-check-circle"></i> <span>填寫資訊建立基本資料</span></li>
              
            </ul>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-6">
              <div class="col-lg-6">
                <img src="assets/img/註冊2.png" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-10">
                    
                      <img src="assets/img/註冊.png" class="img-fluid" alt="">
                    
                  </div>
                  
                </div>
              </div>
            </div>

          </div>



        </div>

        <br><br>
        <div class="row gy-4">
          <!-- HTML：三圖＋右斜區塊 -->
<div class="col-lg-6 about-images layout-right skew-right" data-aos="fade-up" data-aos-delay="200">
  <div class="row gy-4">
    <div class="col-lg-4">
      <a href="./newdona.php"><img src="assets/img/發布.png" class="img-fluid" alt=""></a>
    </div>
    <div class="col-lg-4">
      <a href="./account.php"><img src="assets/img/發布4.png" class="img-fluid" alt=""></a>
    </div>
    <div class="col-lg-4">
      <a href="./propertiesdemo.php"><img src="assets/img/發布二.png" class="img-fluid" alt=""></a>
    </div>
    <div class="col-lg-4">
      <a href="./propertiesdemo.php"><img src="assets/img/發布3.png" class="img-fluid" alt=""></a>
    </div>
    
  </div>
</div>


          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are"></p>
            <h3>發布需求</h3>
            <p class="fst-italic">
              找到合作機會
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>前往最新專案，可點擊右側新增專案，述說您的需求，編輯及刪除文章功能在個人帳號內進行管理</span></li>
              <li><i class="bi bi-check-circle"></i> <span>可以透過關鍵字搜尋或是您感興趣的欄位進行篩選</span></li>
              <li><i class="bi bi-check-circle"></i> <span>點擊方框查看需求細節是否符與您契合</span></li>
              
            </ul>
          </div>

          



        </div>
        <br><br>
        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are"></p>
            <h3>洽談合作</h3>
            <p class="fst-italic">
             找尋夥伴
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>點擊需求內聊天室按鈕開始與對方家洽合作事宜</span></li>
              <li><i class="bi bi-check-circle"></i> <span>如果初步洽談順利可以點選我想合作按鈕，雙方進入合作階段<br>
              分為三階段:同意->洽談中->完成合作(都須雙方按下同意按鈕後才會進入下一階段)
              
              </span></li>
              <li><i class="bi bi-check-circle"></i> <span>在合作完成時在專案管理右邊可以給予對方評分</span></li>
              
            </ul>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-6">
              <div class="col-lg-6">
                <a href='./account.php'>
                  <img src="assets/img/接洽2.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-10">
                    
                      <img src="assets/img/接洽.png" class="img-fluid" alt="">
                    
                  </div>
                  
                </div>
              </div>
            </div>

          </div>



        </div>

          
          

        </div>

        </div>

      

      </div>
    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>熱力值</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>專案數量</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>觸及率</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>合作人數</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row justify-content-around gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="assets/img/features-bg.jpg" alt=""></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>廣告找CoLaB</h3>
            <p>保證完成您的廣告需求 廣告找CoLaB 連結年輕無極限</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-easel flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">廣告找CoLaB</a></h4>
                <p>廣告找CoLaB 讓您熱度衝上天</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-patch-check flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">廣告找CoLaB</a></h4>
                <p>廣告找CoLaB 學生社團都來電</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">廣告找CoLaB</a></h4>
                <p>廣告找CoLaB 校園曝光看得見</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">廣告找CoLaB</a></h4>
                <p>廣告找CoLaB 讓您產品紅翻天</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>

    </section><!-- /Features Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>地址</h4>
            <p>輔仁大學</p>
            <p>新北市 新莊區</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>聯絡</h4>
            <p>
              <strong>電話：</strong> <span>0979822638</span><br>
              <strong>Email：</strong> <span>dennis.940822@gmail.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>客服時間</h4>
            <p>
              <strong>星期一～星期六：</strong> <span>11AM - 23PM</span><br>
              <strong>星期天：</strong> <span>公休</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="https://www.instagram.com/kamt1n/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://discord.gg/qCmPcxba" target="_blank" class="linkedin"><i class="bi bi-discord"></i></a>
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
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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