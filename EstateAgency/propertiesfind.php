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
  </style>
</head>

<body class="properties-page">

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
      <nav class="breadcrumbs">
        <div class="container" style="padding: 85px 0 0 0;">
          <ol>
            <li><a href="index.php">首頁</a></li>
            <li class="current">最新專案</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Real Estate Section -->
    <section id="real-estate" class="real-estate section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>最新專案</h2>
      </div><!-- End Section Title -->

      <div class='container'>

          <!-- 搜尋區塊 -->
<section class="search-bar py-4 bg-light">
  <div class="container">
    <form action="./propertiesfind.php" method="GET" class="row g-2 align-items-center justify-content-center">

      <!-- 第一個下拉框：選擇類型 -->
      <div class="col-md-3">
        <select class="form-select form-select-lg" name="type">
          <option value="all" selected>全部</option>
          <option value="spon">贊助</option>
          <option value="intern">實習</option>
        </select>
      </div>

      <!-- 第二個輸入框：關鍵字搜尋 -->
      <div class="col-md-5">
        <input type="text" class="form-control form-control-lg" name="keyword" placeholder="請輸入關鍵字搜尋...">
      </div>

      <!-- 搜尋按鈕 -->
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-lg w-100">
          <i class="bi bi-search me-2"></i>搜尋
        </button>
      </div>

    </form>
  </div>
</section>








        <section class="filter-bar py-3  bg-light">
          <div class="container ">
            <div class="d-flex flex-wrap gap-2 justify-content-center align-items-center">
              <label class="form-label me-2 mb-0">依標籤篩選：</label>
              <?php
              $link = mysqli_connect('localhost', 'root', '', 'sa');
              $u_permission = $_SESSION['u_permission'];
             

              $tagQuery = "SELECT DISTINCT d.tag FROM demanded d 
  LEFT JOIN org_donate od ON d.d_id = od.d_id
  LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
  LEFT JOIN cor_spons cs ON d.d_id = cs.d_id 
WHERE d.tag IS NOT NULL AND d.tag != '' AND d.u_permission != '$u_permission'";

              $tagResult = mysqli_query($link, $tagQuery);

              while ($row = mysqli_fetch_assoc($tagResult)) {
                $tag = $row['tag']; // <-- 注意這裡取 'tag'
                echo "<button type='button' class='btn btn-outline-primary filter-button' data-filter='{$tag}'>{$tag}</button>";
              }
              ?>


              <button type="button" id="clearFilters" class="btn btn-outline-secondary">清除篩選</button>

            </div>
          </div>
        </section>
        <div class='row py-5'>

          <div class="container">
            <div class='row mb-4'>
              <div class='col-12 text-end'>
                <?php
                if ($_SESSION['u_email']) {
                  echo " <a href='newproperty.php' class='btn btn-success'>
                    <i class='bi bi-plus-circle me-2'></i>發布需求";
                }
                ?>
                </a>
              </div>
            </div>
            <?php

$link = mysqli_connect('localhost', 'root', '', 'sa');
if (!$link) {
    die('連線失敗: ' . mysqli_connect_error());
}

$type = $_GET['type'] ?? 'all';
$keyword = $_GET['keyword'] ?? '';
$u_permission = $_SESSION['u_permission'] ?? '';

// 防止 injection：只允許合法的 type
$valid_types = ['all', 'spon', 'intern', 'coop'];
if (!in_array($type, $valid_types)) {
    die('非法搜尋類型');
}

// 組基本SQL
$params = [];
$types = '';

if ($u_permission === '組織團體') {
    $sql = "
        SELECT d.*,
               ci.c_name AS intern_c_name, ci.c_phone AS intern_c_phone, ci.c_email AS intern_c_email, ci.title AS intern_title, ci.content AS intern_content,
               cs.c_name AS spons_c_name, cs.c_phone AS spons_c_phone, cs.c_email AS spons_c_email, cs.title AS spons_title, cs.content AS spons_content
        FROM demanded d
        LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
        LEFT JOIN cor_spons cs ON d.d_id = cs.d_id
        WHERE d.u_permission != ?
    ";
} elseif ($u_permission === '企業') {
    $sql = "
        SELECT d.*,
               od.c_name AS donate_c_name, od.c_phone AS donate_c_phone, od.c_email AS donate_c_email, od.title AS donate_title, od.content AS donate_content,
               oc.c_name AS coop_c_name, oc.c_phone AS coop_c_phone, oc.c_email AS coop_c_email, oc.title AS coop_title, oc.content AS coop_content
        FROM demanded d
        LEFT JOIN org_donate od ON d.d_id = od.d_id
        LEFT JOIN org_coop oc ON d.d_id = oc.d_id
        WHERE d.u_permission != ?
    ";
} else {
    die('權限錯誤');
}

// 綁第一個參數
$params[] = &$u_permission;
$types .= 's';

// 加 type 篩選
if ($type !== 'all') {
    $sql .= " AND d.tag = ?";
    $params[] = &$type;
    $types .= 's';
}

// 加 keyword 搜尋條件
$keyword_like = "%$keyword%";
if (!empty($keyword)) {
    if ($u_permission === '組織團體') {
        $sql .= " AND (
            (ci.title LIKE ? OR ci.content LIKE ?) OR
            (cs.title LIKE ? OR cs.content LIKE ?)
        )";
    } elseif ($u_permission === '企業') {
        $sql .= " AND (
            (od.title LIKE ? OR od.content LIKE ?) OR
            (oc.title LIKE ? OR oc.content LIKE ?)
        )";
    }

    // 增加 4 個 keyword_like 參數
    for ($i = 0; $i < 4; $i++) {
        $params[] = &$keyword_like;
        $types .= 's';
    }
}

// 準備和綁定參數
$stmt = mysqli_prepare($link, $sql);
if (!$stmt) {
    die('Prepare failed: ' . mysqli_error($link));
}

array_unshift($params, $types);
call_user_func_array([$stmt, 'bind_param'], $params);

// 執行
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// 顯示結果
while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='dcard-post' data-category='" . htmlspecialchars($row['tag']) . "'>
        <a href='property-single.php?id=" . htmlspecialchars($row['d_id']) . "'>
            <div class='dcard-header'>
                <span class='dcard-tag'>#" . htmlspecialchars($row['tag']) . "</span>
            </div>
            <div class='dcard-footer'>
    ";

    if ($u_permission === '組織團體') {
        if (!empty($row['intern_c_name'])) {
            echo "
                <span>聯絡人：" . htmlspecialchars($row['intern_c_name']) . "</span>
                <span>電話：" . htmlspecialchars($row['intern_c_phone']) . "</span>
                <span>Email：" . htmlspecialchars($row['intern_c_email']) . "</span>
            ";
        } elseif (!empty($row['spons_c_name'])) {
            echo "
                <span>聯絡人：" . htmlspecialchars($row['spons_c_name']) . "</span>
                <span>電話：" . htmlspecialchars($row['spons_c_phone']) . "</span>
                <span>Email：" . htmlspecialchars($row['spons_c_email']) . "</span>
            ";
        } else {
            echo "<span>尚無聯絡資料</span>";
        }
    } elseif ($u_permission === '企業') {
        if (!empty($row['donate_c_name'])) {
            echo "
                <span>聯絡人：" . htmlspecialchars($row['donate_c_name']) . "</span>
                <span>電話：" . htmlspecialchars($row['donate_c_phone']) . "</span>
                <span>Email：" . htmlspecialchars($row['donate_c_email']) . "</span>
            ";
        } elseif (!empty($row['coop_c_name'])) {
            echo "
                <span>聯絡人：" . htmlspecialchars($row['coop_c_name']) . "</span>
                <span>電話：" . htmlspecialchars($row['coop_c_phone']) . "</span>
                <span>Email：" . htmlspecialchars($row['coop_c_email']) . "</span>
            ";
        } else {
            echo "<span>尚無聯絡資料</span>";
        }
    }

    echo "
            </div>
        </a>
    </div>
    ";
}
?>



          </div>
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
  <script>
    const buttons = document.querySelectorAll('.filter-button');
    const cards = document.querySelectorAll('.dcard-post'); // ← 改這裡！
    const clearButton = document.getElementById('clearFilters');

    function updateVisibleCards() {
      const activeFilters = Array.from(buttons)
        .filter(btn => btn.classList.contains('active'))
        .map(btn => btn.dataset.filter);

      cards.forEach(card => {
        const category = card.dataset.category;
        const shouldShow = activeFilters.length === 0 || activeFilters.includes(category);
        card.style.display = shouldShow ? 'block' : 'none';
      });
    }

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        button.classList.toggle('active');
        updateVisibleCards();
      });
    });

    clearButton.addEventListener('click', () => {
      buttons.forEach(btn => btn.classList.remove('active'));
      updateVisibleCards();
    });

    updateVisibleCards(); // 初始顯示全部卡片
  </script>



</body>

</html>