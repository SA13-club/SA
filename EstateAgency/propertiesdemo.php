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


        <section class="filter-bar py-3 bg-light">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-md-4 mb-2">
                <label class="form-label">依標籤篩選：</label>
                <select id="tagSelect" class="form-select">
                  <option value="">請選擇標籤</option>
                  <div class="col-md-4 mb-2" id="fieldValueWrapper" style="display: none;">
                    <label class="form-label">細項條件：</label>
                    <select id="fieldValueSelect" class="form-select">
                      <option value="">請選擇條件</option>
                    </select>
                  </div>

                  <?php
                  $link = mysqli_connect('localhost', 'root', '', 'sa');
                  $u_permission = $_SESSION['u_permission'];

                  // 建立一個陣列存條件
                  $tagParts = [];

                  if ($u_permission == '組織團體') {
                    // 組織團體可以看到：club_coop（合作）、cor_intern、cor_spons
                    $tagParts[] = "EXISTS (SELECT 1 FROM club_coop cc WHERE cc.d_id = d.d_id)";
                    $tagParts[] = "EXISTS (SELECT 1 FROM cor_intern ci WHERE ci.d_id = d.d_id)";
                    $tagParts[] = "EXISTS (SELECT 1 FROM cor_spons cs WHERE cs.d_id = d.d_id)";
                  } elseif ($u_permission == '企業') {
                    // 企業可以看到：corp_coop（合作）、org_donate
                    $tagParts[] = "EXISTS (SELECT 1 FROM corp_coop cc WHERE cc.d_id = d.d_id)";
                    $tagParts[] = "EXISTS (SELECT 1 FROM org_donate od WHERE od.d_id = d.d_id)";
                  }

                  // 組合 SQL
                  $tagCondition = implode(" OR ", $tagParts);

                  $tagQuery = "
                    SELECT DISTINCT d.tag FROM demanded d
                    WHERE d.tag IS NOT NULL AND d.tag != '' AND ($tagCondition)
                  ";

                  $tagResult = mysqli_query($link, $tagQuery);

                  while ($row = mysqli_fetch_assoc($tagResult)) {
                    $tag = $row['tag'];
                    $displayTag = $tag;
                    if ($tag == 'spon') $displayTag = '贊助';
                    elseif ($tag == '實習') $displayTag = '實習';
                    elseif ($tag == '合作') $displayTag = '合作';
                    elseif ($tag == '招募') $displayTag = '招募';

                    echo "<option value='{$tag}'>{$displayTag}</option>";
                  }
                  $filterTag = $_GET['tag'] ?? '';
                  $filterField = $_GET['field'] ?? '';

                  ?>
                </select>
              </div>

              <div class="col-md-4 mb-2">
                <label class="form-label">對應欄位：</label>
                <select id="fieldSelect" class="form-select" disabled>
                  <option value="">請先選擇標籤</option>
                </select>
              </div>

              <div class="col-md-2 mb-2">
                <button type="button" id="clearFilters" class="btn btn-outline-secondary w-100">清除篩選</button>
              </div>
              <div class="col-md-2 mb-2">
                <button type="button" id="applyFilters" class="btn btn-success w-100">確認篩選</button>
              </div>
            </div>
          </div>
        </section>
        <div class='row py-5'>

          <div class="container">
            <div class='row mb-4'>
              <div class='col-12 text-end'>
                <?php
                if ($_SESSION['u_email']) {
                  echo " <a href='newdona.php' class='btn btn-success'>
                    <i class='bi bi-plus-circle me-2'></i>發布需求";
                }
                ?>
                </a>
              </div>
            </div>
            <?php

            $u_permission = $_SESSION['u_permission'];
            $link = mysqli_connect('localhost', 'root', '', 'sa');

            if (!$link) {
              die('連線失敗: ' . mysqli_connect_error());
            }

            $u_permission = $_SESSION['u_permission'] ?? '';

            // 根據權限組織不同的 SQL
            if ($u_permission == '組織團體') {
              $sql = "
    SELECT 
        d.*, 
        ci.c_name AS intern_c_name, ci.c_phone AS intern_c_phone, ci.c_email AS intern_c_email, ci.title AS intern_title,
        cs.c_name AS spons_c_name, cs.c_phone AS spons_c_phone, cs.c_email AS spons_c_email, cs.title AS spons_title,
        COALESCE(clc.c_name) AS coop_c_name,
        COALESCE(clc.c_phone) AS coop_c_phone,
        COALESCE(clc.c_email) AS coop_c_email,
        COALESCE(clc.coop_name) AS coop_title
    FROM demanded d
    LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
    LEFT JOIN cor_spons cs ON d.d_id = cs.d_id
    LEFT JOIN club_coop clc ON d.d_id = clc.d_id
    WHERE 
        (d.u_permission = '企業' AND (ci.d_id IS NOT NULL OR cs.d_id IS NOT NULL))
        OR 
        (d.u_permission = '組織團體' AND clc.d_id IS NOT NULL)
";
            } elseif ($u_permission == '企業') {
              $sql = "
    SELECT 
        d.*, 
        od.c_name AS donate_c_name, od.c_phone AS donate_c_phone, od.c_email AS donate_c_email, od.title AS donate_title,
        COALESCE(cc.c_name) AS coop_c_name,
        COALESCE(cc.c_phone) AS coop_c_phone,
        COALESCE(cc.c_email) AS coop_c_email,
        COALESCE(cc.coop_name) AS coop_title
    FROM demanded d
    LEFT JOIN org_donate od ON d.d_id = od.d_id
    LEFT JOIN corp_coop cc ON d.d_id = cc.d_id
    WHERE d.u_permission != ?
";
            } else {
              $sql = "
    SELECT 
        d.*, 
        ci.c_name AS intern_c_name, ci.c_phone AS intern_c_phone, ci.c_email AS intern_c_email, ci.title AS intern_title,
        cs.c_name AS spons_c_name, cs.c_phone AS spons_c_phone, cs.c_email AS spons_c_email, cs.title AS spons_title,
        od.c_name AS donate_c_name, od.c_phone AS donate_c_phone, od.c_email AS donate_c_email, od.title AS donate_title,
        COALESCE(cc.c_name, clc.c_name) AS coop_c_name,
        COALESCE(cc.c_phone, clc.c_phone) AS coop_c_phone,
        COALESCE(cc.c_email, clc.c_email) AS coop_c_email,
        COALESCE(cc.coop_name, clc.coop_name) AS coop_title
    FROM demanded d
    LEFT JOIN corp_coop cc ON d.d_id = cc.d_id
    LEFT JOIN club_coop clc ON d.d_id = clc.d_id
    LEFT JOIN org_donate od ON d.d_id = od.d_id
    LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
    LEFT JOIN cor_spons cs ON d.d_id = cs.d_id
    WHERE d.u_permission != ?
";
            }

            // 使用 prepared statement，防止 SQL injection
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, 's', $u_permission);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // 取出所有資料

            while ($row = mysqli_fetch_assoc($result)) {
              $displayTag = $row['tag'];
              if ($displayTag == 'spon') $displayTag = '贊助';
              elseif ($displayTag == '實習') $displayTag = '實習';
              elseif ($displayTag == '合作') $displayTag = '合作';
              elseif ($displayTag == '招募') $displayTag = '招募';

              if ($filterTag && $displayTag !== $filterTag) continue;

              if ($filterField) {
                $fieldMatched = false;
                $fieldValues = [
                  $row['coop_title'],
                  $row['spons_title'],
                  $row['intern_title'],
                  $row['donate_title']
                ];

                foreach ($fieldValues as $val) {
                  if (!empty($val) && strpos($val, $filterField) !== false) {
                    $fieldMatched = true;
                    break;
                  }
                }

                if (!$fieldMatched) continue;
              }
              if ($u_permission == '企業' && $row['tag'] == '合作' && $row['coop_c_name'] == null) {
                continue; // 這是合作文章，但不是 corp_coop 來的，就略過
              }
              $tag = $row['tag'];
              if ($tag == 'spon') {
                $tag = '贊助';
              }

              echo "
              <div class='dcard-post' data-category='{$tag}'>
                  <a href='property-single.php?id={$row['d_id']}'>
                      <div class='dcard-header'>
                          <span class='dcard-tag'>#{$tag}</span>
                      </div>
                      <div class='dcard-body'>
              ";

              // 主標題處理
              switch ($row['tag']) {
                case '合作':
                  $title = $row['coop_title'];
                  echo "<p><strong>✏️ 合作標題：</strong> " . (!empty($title) ? htmlspecialchars($title) : '無標題') . "</p>";
                  break;
                case '贊助':
                  $title = $row['spons_title'];
                  echo "<p><strong>✏️ 活動標題：</strong> " . (!empty($title) ? htmlspecialchars($title) : '無標題') . "</p>";
                  break;
                case '實習':
                  $title = $row['intern_title'];
                  echo "<p><strong>✏️ 職缺標題：</strong> " . (!empty($title) ? htmlspecialchars($title) : '無標題') . "</p>";
                  break;
                case 'spon':
                  $title = $row['donate_title'];
                  echo "<p><strong>✏️ 活動標題：</strong> " . (!empty($title) ? htmlspecialchars($title) : '無標題') . "</p>";
                  break;
                default:
                  $title = $row['coop_title'] ?? $row['spons_title'] ?? $row['intern_title'] ?? $row['donate_title'] ?? null;
                  echo "<p><strong>✏️ 標題：</strong> " . (!empty($title) ? htmlspecialchars($title) : '無標題') . "</p>";
                  break;
              }

              // 聯絡人資訊顯示（先定義）
              $contact_name = $row['intern_c_name'] ?? $row['spons_c_name'] ?? $row['donate_c_name'] ?? $row['coop_c_name'] ?? null;
              $contact_phone = $row['intern_c_phone'] ?? $row['spons_c_phone'] ?? $row['donate_c_phone'] ?? $row['coop_c_phone'] ?? null;
              $contact_email = $row['intern_c_email'] ?? $row['spons_c_email'] ?? $row['donate_c_email'] ?? $row['coop_c_email'] ?? null;

              echo "<div class='dcard-footer'>";
              if ($contact_name) {
                echo "
                      <span>👤 聯絡人：{$contact_name}</span>
                      <span>📞 電話：{$contact_phone}</span>
                      <span>✉️ Email：{$contact_email}</span>
                  ";
              } else {
                echo "<span>尚無聯絡資料</span>";
              }

              echo "
                      </div> <!-- dcard-footer -->
                  </div> <!-- dcard-body -->
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
      // 直接刷新頁面回原始 URL，清掉所有參數
      window.location.href = 'propertiesdemo.php';
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    const fieldOptions = {
      '合作': ['合作名稱', '合作類型', '合作效益'],
      '贊助': ['贊助方式', '贊助金額'],
      '實習': ['職缺名稱', '地點', '薪資', '技能要求'],
      '招募': ['招募類型', '條件'],
      'spon': ['活動名稱', '贊助方式']
    };

    document.getElementById('tagSelect').addEventListener('change', function() {
      const tag = this.value;
      const fieldSelect = document.getElementById('fieldSelect');

      // 清空欄位
      fieldSelect.innerHTML = '';
      if (!tag || !fieldOptions[tag] && !fieldOptions[translateTag(tag)]) {
        fieldSelect.disabled = true;
        fieldSelect.innerHTML = '<option value="">無可用欄位</option>';
        return;
      }

      const options = fieldOptions[tag] || fieldOptions[translateTag(tag)];

      // 加入選項
      fieldSelect.disabled = false;
      fieldSelect.innerHTML = '<option value="">請選擇欄位</option>';
      options.forEach(field => {
        const opt = document.createElement('option');
        opt.value = field;
        opt.textContent = field;
        fieldSelect.appendChild(opt);
      });
    });

    function translateTag(tag) {
      // 把資料庫中的原始值轉成中文對照（保險起見）
      const map = {
        'spon': '贊助',
        '實習': '實習',
        '合作': '合作',
        '招募': '招募'
      };
      return map[tag] || tag;
    }
    document.getElementById('applyFilters').addEventListener('click', function() {
      const tag = document.getElementById('tagSelect').value;
      const field = document.getElementById('fieldSelect').value;

      if (!tag) {
        alert('請先選擇標籤！');
        return;
      }

      console.log('篩選條件:', {
        tag,
        field
      });

      // 這裡可以換成 AJAX 或導頁
      // 範例：重新導向 URL 加上查詢參數
      const params = new URLSearchParams();
      params.set('tag', tag);
      if (field) params.set('field', field);

      window.location.href = 'propertiesdemo.php?' + params.toString();
    });
  </script>



</body>

</html>