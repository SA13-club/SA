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

<body class="properties-page" 　style="
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
        <h1 class="sitename">Co<span>LaB</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">主頁</a></li>
          <li><a href="about.php">操作指南</a></li>
          <li><a href="propertiesdemo.php" class='active'>專案總覽</a></li>
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
                  <?php
                  $link = mysqli_connect('localhost', 'root', '', 'sa');
                  if (!$link) {
                    die('連線失敗: ' . mysqli_connect_error());
                  }

                  $tag_sql = "SELECT DISTINCT tag FROM demanded WHERE tag IS NOT NULL AND tag != ''";
                  $tag_result = mysqli_query($link, $tag_sql);

                  while ($row = mysqli_fetch_assoc($tag_result)) {
                    $tag_value = htmlspecialchars($row['tag']);
                    $tag_display = $tag_value === 'spon' ? '贊助' : ($tag_value === 'intern' ? '實習' : $tag_value);
                    echo "<option value=\"$tag_value\">$tag_display</option>";
                  }
                  ?>
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
              <div class="row justify-content-center align-items-center">
                <!-- 標籤篩選 -->
                <div class="col-md-4 mb-2">
                  <label class="form-label">依標籤篩選：</label>
                  <select id="tagSelect" class="form-select">
                    <option value="">請選擇標籤</option>

                    <?php

                    $currentUser = $_SESSION['u_email'] ?? '';
                    $myFavs = [];
                    if ($currentUser) {
                      $resFav = mysqli_query($link, "
    SELECT d_id
      FROM user_favorites
     WHERE user_email = '" . mysqli_real_escape_string($link, $currentUser) . "'
  ");
                      while ($fav = mysqli_fetch_assoc($resFav)) {
                        $myFavs[] = (int)$fav['d_id'];
                      }
                    }
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
                      elseif ($tag == '贊助') $displayTag = '贊助';

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
                <div class="col-md-4 mb-2" id="fieldValueWrapper" style="display: none;">
                  <label class="form-label">細項條件：</label>
                  <select id="fieldValueSelect" class="form-select">
                    <option value="">請選擇條件</option>
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








        <section class="filter-bar py-3  bg-light">
          <div class="container ">
            <div class="d-flex flex-wrap gap-2 justify-content-center align-items-center">
              <!-- <label class="form-label me-2 mb-0">依標籤篩選：</label> -->
              <?php
              $link = mysqli_connect('localhost', 'root', '', 'sa');
              $u_permission = $_SESSION['u_permission'];
              $type = $_GET['type'] ?? 'all';
              $keyword = $_GET['keyword'] ?? '';


              $tagQuery = "SELECT DISTINCT d.tag FROM demanded d 
  LEFT JOIN org_donate od ON d.d_id = od.d_id
  LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
  LEFT JOIN cor_spons cs ON d.d_id = cs.d_id 
  LEFT JOIN corp_coop co ON d.d_id = co.d_id
  LEFT JOIN club_coop cl ON d.d_id = cl.d_id 
WHERE d.tag IS NOT NULL AND d.tag != '' AND d.u_permission != '$u_permission'";

              $tagResult = mysqli_query($link, $tagQuery);

              while ($row = mysqli_fetch_assoc($tagResult)) {
                $tag = $row['tag']; // <-- 注意這裡取 'tag'

                // echo "<button type='button' class='btn btn-outline-primary filter-button' data-filter='{$tag}'>{$tag}</button>";
              }
              ?>


              <!-- <button type="button" id="clearFilters" class="btn btn-outline-secondary">清除篩選</button> -->

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


            // 組基本SQL
            $params = [];
            $types = '';

            if ($u_permission === '組織團體') {
              $sql = "
        SELECT d.*,
               ci.c_name AS intern_c_name, ci.c_phone AS intern_c_phone, ci.c_email AS intern_c_email, ci.intern_title AS intern_title, ci.intern_detail AS intern_content,
               cs.c_name AS spons_c_name, cs.c_phone AS spons_c_phone, cs.c_email AS spons_c_email, cs.title AS spons_title, cs.content AS spons_content,
                clc.c_name AS club_c_name,
                clc.c_phone AS club_c_phone,
                clc.c_email AS club_c_email,
                clc.coop_name AS club_title, COALESCE(clc.coop_desc) AS club_content
        FROM demanded d
        LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
        LEFT JOIN cor_spons cs ON d.d_id = cs.d_id
        LEFT JOIN club_coop clc ON d.d_id = clc.d_id 
        WHERE d.u_permission != ?
    ";
            } elseif ($u_permission === '企業') {
              $sql = "
  SELECT d.*,
         od.c_name AS donate_c_name,
         od.c_phone AS donate_c_phone,
         od.c_email AS donate_c_email,
         od.event_name AS donate_title,
         od.event_description AS donate_content,
         cc.c_name AS coop_c_name,
         cc.c_phone AS coop_c_phone,
         cc.c_email AS coop_c_email,
         cc.coop_type AS coop_type,
         cc.coop_name AS coop_title,
         cc.coop_desc AS content
  FROM demanded d
  LEFT JOIN org_donate od ON d.d_id = od.d_id
  LEFT JOIN corp_coop cc ON d.d_id = cc.d_id
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
            (ci.intern_title LIKE ? OR ci.intern_detail LIKE ?) OR
            (cs.title LIKE ? OR cs.content LIKE ?)
            OR
            (clc.coop_name LIKE ? OR clc.coop_desc LIKE ?)
        )";
              } elseif ($u_permission === '企業') {
                $sql .= " AND (
            (od.event_name LIKE ? OR od.event_description LIKE ?) OR
            (cc.coop_name LIKE ? OR cc.coop_desc LIKE ?)
         
        )";
              }
              if (!empty($keyword)) {
                if ($u_permission === '組織團體') {
                  // SQL 已经有 6 个 LIKE ?，下面就绑定 6 个
                  for ($i = 0; $i < 6; $i++) {
                    $params[] = &$keyword_like;
                    $types  .= 's';
                  }
                } elseif ($u_permission === '企業') {
                  // 企业分支只有 4 个 LIKE ? 
                  for ($i = 0; $i < 4; $i++) {
                    $params[] = &$keyword_like;
                    $types  .= 's';
                  }
                }
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
              $tag = $row['tag'];
              if ($tag == 'spon') {
                $tag = '贊助';
              }
              echo "
    <div class='dcard-post' data-category='" . htmlspecialchars($tag) . "'>
        <a href='property-single.php?id=" . htmlspecialchars($row['d_id']) . "'>
            <div class='dcard-header'>
                <span class='dcard-tag'>#" . htmlspecialchars($tag) . "</span>
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
                } elseif (!empty($row['club_c_name'])) {
                  echo "
              <span>聯絡人：" . htmlspecialchars($row['club_c_name']) . "</span>
              <span>電話：" . htmlspecialchars($row['club_c_phone']) . "</span>
              <span>Email：" . htmlspecialchars($row['club_c_email']) . "</span>
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
      const urlParams = new URLSearchParams(window.location.search);
      const type = urlParams.get('type') || 'all';
      const keyword = urlParams.get('keyword') || '';
      window.location.href = `propertiesfind.php?type=${encodeURIComponent(type)}&keyword=${encodeURIComponent(keyword)}`;
    });


    updateVisibleCards(); // 初始顯示全部卡片
  </script>



  <!-- 篩選java -->

  <script>
    const fieldOptions = {
      '合作': ['合作方式', '合作地點', '合作效益'],
      '贊助': ['贊助方式', '贊助金額'],
      '實習': ['職缺名稱', '地點', '薪資', '技能要求', '實習期間'],
      '招募': ['招募類型', '條件', '活動時間'],
      'spon': ['贊助方式', '贊助金額'] // 若有用原始 tag
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
        '贊助': '贊助',
        '招募': '招募'
      };
      return map[tag] || tag;
    }
    const valueMapping = {
      '贊助方式': {
        '金錢': 'money',
        '產品': 'product'
      },
      '合作方式': {
        '活動合辦': '活動合辦',
        '聯誼活動': '聯誼活動',
        '長期合作': '長期合作',
        '成果發表': '成果發表'
      }
    };
    const sponsorAmountRanges = [{
        min: 0,
        max: 10000,
        label: '1萬以下'
      },
      {
        min: 10000,
        max: 50000,
        label: '1萬~5萬'
      },
      {
        min: 50000,
        max: Infinity,
        label: '5萬以上'
      }
    ];
    const userPermission = "<?php echo in_array($_SESSION['u_permission'], ['企業', '組織團體']) ? $_SESSION['u_permission'] : ''; ?>";

    document.getElementById('applyFilters').addEventListener('click', function() {
      const tag = document.getElementById('tagSelect').value;
      const field = document.getElementById('fieldSelect').value;

      const inputEl = document.getElementById('fieldValueInput');
      const selectEl = document.getElementById('fieldValueSelect');

      const amountMinEl = document.getElementById('sponsorAmountMin');
      const amountMaxEl = document.getElementById('sponsorAmountMax');

      if (!tag) {
        alert('請先選擇標籤！');
        return;
      }

      const params = new URLSearchParams();
      params.set('tag', tag);
      if (field) params.set('field', field);

      // ✅ 特別處理贊助金額區間
      if (field === '贊助金額' && amountMinEl && amountMaxEl) {
        const min = parseInt(amountMinEl.value);
        const max = parseInt(amountMaxEl.value);

        // ✅ 防呆檢查：最小不可大於最大
        if (!isNaN(min) && !isNaN(max) && min > max) {
          alert('最低金額不能大於最高金額！');
          amountMinEl.classList.add('is-invalid');
          amountMaxEl.classList.add('is-invalid');
          return;
        } else {
          amountMinEl.classList.remove('is-invalid');
          amountMaxEl.classList.remove('is-invalid');
        }

        if (!isNaN(min)) params.set('min', min);
        if (!isNaN(max)) params.set('max', max);
      } else {
        // 處理其他欄位選項或單一輸入欄
        const detail = inputEl?.value || selectEl?.value || '';
        if (field && detail) {
          const mappedValue = valueMapping[field]?.[detail] || detail;
          params.set('fieldValue', mappedValue);
        }
      }

      // ✅ 導向含參數的新網址
      window.location.href = 'propertiesdemo.php?' + params.toString();
    });




    const detailFieldOptions = {
      // 合作相關
      '合作名稱': ['產學合作', '社會公益', '品牌推廣'],
      '合作方式_組織團體': ['活動合辦', '聯誼活動', '長期合作', '成果發表'],
      '合作方式_企業': ['演講講座', '實習需求', '產學合作', '其他'],
      '合作地點': ['台北市', '新北市', '台中市', '台南市', '高雄市'],
      '合作效益': ['提升知名度', '拓展關係網', '技術交流'],

      // 贊助相關
      '贊助方式': ['金錢', '產品'],
      // '活動名稱': ['校園音樂祭', '創業競賽', '職涯講座'],

      // 實習相關
      '職缺名稱': ['軟體工程師', '行銷助理', '設計實習生'],
      '地點': ['台北市', '新竹市', '高雄市', '可遠端'],
      '薪資': ['無薪', '時薪 183', '月薪 20000~30000'],
      '技能要求': ['HTML/CSS', 'Python', 'Illustrator', '社群經營'],
      '實習期間': ['一個月', '兩個月', '整學期'],

      // 招募相關
      '招募類型': ['志工', '兼職', '活動協助'],
      '條件': ['具溝通能力', '時間彈性', '有責任感'],
      '活動時間': ['平日晚間', '週末全天', '寒暑假']
    };


    document.getElementById('fieldSelect').addEventListener('change', function() {
      const field = this.value;
      const wrapper = document.getElementById('fieldValueWrapper');
      const select = document.getElementById('fieldValueSelect');

      select.innerHTML = '<option value="">請選擇條件</option>';

      // ⚠️ 根據使用者身分動態找細項清單
      let detailKey = field;
      if (field === '合作方式') {
        detailKey = `${field}_${userPermission}`;
      }

      const options = detailFieldOptions[detailKey];

      if (field === '贊助金額') {
        wrapper.style.display = 'block';
        wrapper.innerHTML = `
<label>贊助金額區間</label>
<div class="d-flex gap-2 align-items-center">
  <input type="number" id="sponsorAmountMin" class="form-control" placeholder="最低金額">
  <span>~</span>
  <input type="number" id="sponsorAmountMax" class="form-control" placeholder="最高金額">
</div>
<small id="amountError" class="text-danger d-none">最低金額不能大於最高金額</small>
  `;
      } else if (options) {
        // ✅ 顯示下拉選單
        wrapper.style.display = 'block';
        wrapper.innerHTML = `
      <label for="fieldValueSelect">請選擇條件</label>
      <select id="fieldValueSelect" class="form-select">
        <option value="">請選擇條件</option>
        ${options.map(opt => `<option value="${opt}">${opt}</option>`).join('')}
      </select>
    `;
      } else {
        // 無細項，隱藏區塊
        wrapper.style.display = 'none';
        wrapper.innerHTML = '';
      }
    });
  </script>


</body>

</html>