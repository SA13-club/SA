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
            color: #2eca6a;
            ;
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
            justify-content: space-between;
            align-items: center;
        }
        

        .filter-bar py-3 border-bottom bg-light {
            background-color: white;
        }

        /* 綠線動畫效果 */
        .hover-underline {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .hover-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            left: 0;
            bottom: -3px;
            background-color: var(--accent-color);
            transition: width 0.3s ease-in-out;
        }

        .hover-underline:hover::after {
            width: 100%;
        }

        .hover-underline.active-underline::after {
            width: 100%;
        }

        .collapsible ul {
            list-style: none;
            padding: 0;
            font-size: 15px;
        }

        .collapsible ul li {
            display: flex;
            flex-direction: column;
            padding-bottom: 15px;
        }

        .collapsible ul strong {
            text-transform: uppercase;
            font-weight: 400;
            color: color-mix(in srgb, var(--default-color), transparent 50%);
            font-size: 14px;
        }

        .star-rating {
        display: inline-block;
        font-size: 2em;
        color: #ccc;
        cursor: pointer;
        }


        .star-rating .star:hover,
        .star-rating .star.hovered,
        .star-rating .star.selected {
        color: gold;
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

        .clamp-4 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4; /* 限制三行 */
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5em; /* 依你版面調整 */
        max-height: 6em; /* 1.5em * 3行 */
        }

        .progress-steps {
            display: flex;
            align-items: center;
            margin-top: 8px;
        }

        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #ccc;
            color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            background-color: white;
            z-index: 1;
        }

        .step.active {
            border-color: #28c76f; /* 主色綠色 */
            color: #28c76f;
            font-weight: bold;
        }

        .step.waiting {
            border-color: orange;
            color: orange;
            font-weight: bold;
        }
        .step.not-accepted {
            border-color: red;
            color: red;
            font-weight: bold;
        }
        .step.active {
            border-color: #28c76f;
            color: #28c76f;
            font-weight: bold;
        }
        .connector {
            flex: 1;
            height: 2px;
            background-color: #ccc;
            margin: 0 5px;
            z-index: 0;
        }
        .connector.active-green {
            background-color: #28c76f;
        }
        .connector.active-orange {
            background-color: orange;
        }


    </style>

</head>


<body class="starter-page-page" style="
  padding-top: 100px;background-image: url('./assets/img/bg2.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 100vh;
  margin: 0;">
    <?php 

                 
                  // 检测这是一个收藏切换请求
                  if (isset($_POST['action']) && $_POST['action'] === 'toggle_favorite' && isset($_POST['d_id'])) {
                    if (empty($_SESSION['u_email'])) {
                      echo json_encode(['error' => '未登入']);
                      exit;
                    }

                    $user = $_SESSION['u_email'];
                    $d_id  = intval($_POST['d_id']);

                    // 复用页面既有的 $conn
                    $conn = new mysqli('localhost', 'root', '', 'sa');
                    if ($conn->connect_error) {
                      echo json_encode(['error' => 'DB 連線失敗']);
                      exit;
                    }

                    // 切换收藏状态
                    $stmt = $conn->prepare("
        SELECT 1 FROM user_favorites 
         WHERE user_email=? AND d_id=?
    ");
                    $stmt->bind_param('si', $user, $d_id);
                    $stmt->execute();
                    $stmt->store_result();
                    $exists = $stmt->num_rows > 0;
                    $stmt->close();

                    if ($exists) {
                      $del = $conn->prepare("
            DELETE FROM user_favorites 
             WHERE user_email=? AND d_id=?
        ");
                      $del->bind_param('si', $user, $d_id);
                      $del->execute();
                      $del->close();
                      echo json_encode(['saved' => false]);
                    } else {
                      $ins = $conn->prepare("
            INSERT INTO user_favorites (user_email,d_id) 
            VALUES (?,?)
        ");
                      $ins->bind_param('si', $user, $d_id);
                      $ins->execute();
                      $ins->close();
                      echo json_encode(['saved' => true]);
                    }

                    $conn->close();
                    exit;  // 处理完 Ajax 请求后立刻结束脚本
                  }


    if (isset($_GET['success'])): ?>
        <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 9999;">
            <div id="successToast" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        資料已成功更新！
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>


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

        <?php
        $u_email = $_SESSION['u_email'];
        $u_permission = $_SESSION['u_permission'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sa";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // 根據權限選擇資料表
        if ($u_permission == '企業') {
            $stmt = $conn->prepare("SELECT * FROM Corporation_Registrations WHERE u_email = ?");
        } else if ($u_permission == '組織團體') {
            $stmt = $conn->prepare("SELECT * FROM Organization_Registrations WHERE u_email = ?");
        }else if ($u_permission == '管理者') {
            $stmt = $conn->prepare("SELECT * FROM user_account WHERE u_email = ?");
        } else {
            die("無效的使用者權限");
        }

        $stmt->bind_param("s", $u_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt_user = $conn->prepare("SELECT u_password, u_content FROM User_Account WHERE u_email = ?");
        $stmt_user->bind_param("s", $u_email);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();
        $account = $result_user->fetch_assoc();

        if ($u_permission === '管理者') {
            // 被檢舉文章的SQL（你原本的 UNION 多表查詢）-- 被檢舉文章的SQL（管理者專用）
            $sql = "(
                SELECT d.d_id, d.tag, d.d_date, d.d_ban,
                       o.event_name AS donate_title,
                       NULL AS spons_title,
                       NULL AS intern_title,
                       NULL AS coop_title,
                       o.c_name AS donate_c_name, o.c_phone AS donate_c_phone, o.c_email AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       NULL AS coop_c_name, NULL AS coop_c_phone, NULL AS coop_c_email,
                       ua.u_email AS user_email,
                       ua.u_permission AS user_permission,
                       ua.banac AS user_banac
                FROM demanded d 
                JOIN org_donate o ON d.d_id = o.d_id 
                LEFT JOIN User_Account ua ON o.c_email = ua.u_email
                WHERE d.d_ban >= 1
            )
            UNION
            (
                SELECT d.d_id, d.tag, d.d_date, d.d_ban,
                       NULL AS donate_title,
                       c.title AS spons_title,
                       NULL AS intern_title,
                       NULL AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       c.c_name AS spons_c_name, c.c_phone AS spons_c_phone, c.c_email AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       NULL AS coop_c_name, NULL AS coop_c_phone, NULL AS coop_c_email,
                       ua.u_email AS user_email,
                       ua.u_permission AS user_permission,
                       ua.banac AS user_banac
                FROM demanded d 
                JOIN cor_spons c ON d.d_id = c.d_id 
                LEFT JOIN User_Account ua ON c.c_email = ua.u_email
                WHERE d.d_ban >= 1
            )
            UNION
            (
                SELECT d.d_id, d.tag, d.d_date, d.d_ban,
                       NULL AS donate_title,
                       NULL AS spons_title,
                       i.intern_title AS intern_title,
                       NULL AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       i.c_name AS intern_c_name, i.c_phone AS intern_c_phone, i.c_email AS intern_c_email,
                       NULL AS coop_c_name, NULL AS coop_c_phone, NULL AS coop_c_email,
                       ua.u_email AS user_email,
                       ua.u_permission AS user_permission,
                       ua.banac AS user_banac
                FROM demanded d 
                JOIN cor_intern i ON d.d_id = i.d_id 
                LEFT JOIN User_Account ua ON i.c_email = ua.u_email
                WHERE d.d_ban >= 1
            )
            UNION
            (
                SELECT d.d_id, d.tag, d.d_date, d.d_ban,
                       NULL AS donate_title,
                       NULL AS spons_title,
                       NULL AS intern_title,
                       co.coop_name AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       co.c_name AS coop_c_name, co.c_phone AS coop_c_phone, co.c_email AS coop_c_email,
                       ua.u_email AS user_email,
                       ua.u_permission AS user_permission,
                       ua.banac AS user_banac
                FROM demanded d 
                JOIN corp_coop co ON d.d_id = co.d_id 
                LEFT JOIN User_Account ua ON co.c_email = ua.u_email
                WHERE d.d_ban >= 1
            )
            UNION
            (
                SELECT d.d_id, d.tag, d.d_date, d.d_ban,
                       NULL AS donate_title,
                       NULL AS spons_title,
                       NULL AS intern_title,
                       co.coop_name AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       co.c_name AS coop_c_name, co.c_phone AS coop_c_phone, co.c_email AS coop_c_email,
                       ua.u_email AS user_email,
                       ua.u_permission AS user_permission,
                       ua.banac AS user_banac
                FROM demanded d 
                JOIN club_coop co ON d.d_id = co.d_id 
                LEFT JOIN User_Account ua ON co.c_email = ua.u_email
                WHERE d.d_ban >= 1
            )
            ORDER BY d_date DESC";
            
        
            // 執行文章查詢
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();  // 用於被檢舉文章列表 (banpro-section)
        
            // 被檢舉帳號查詢（新的SQL）
            $sql_banned_users = "
SELECT 
    ua.u_email AS user_email,
    ua.u_permission AS user_permission,
    ua.banac AS user_banac,
    COALESCE(c.e_name, o.s_name, '無資料') AS contact_name,
    COALESCE(c.e_phone, o.s_phone, '無資料') AS contact_phone
FROM User_Account ua
LEFT JOIN corporation_registrations c ON ua.u_email = c.u_email
LEFT JOIN organization_registrations o ON ua.u_email = o.u_email
WHERE ua.banac >= 1
ORDER BY ua.banac DESC;
        
          ";
        
            $stmt2 = $conn->prepare($sql_banned_users);
            $stmt2->execute();
            $result_banned = $stmt2->get_result();
        
            // 將 $result_banned 轉成陣列，方便foreach用
            $rows = [];
            while ($row = $result_banned->fetch_assoc()) {
                $rows[] = $row;
            }
        
        } else {
            // 一般使用者查詢自己文章 (不含帳號檢舉)
            $sql = "(
                SELECT d.d_id, d.tag, d.d_date,
                       o.event_name AS donate_title,
                       NULL AS spons_title,
                       NULL AS intern_title,
                       NULL AS coop_title,
                       o.c_name AS donate_c_name, o.c_phone AS donate_c_phone, o.c_email AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       NULL AS coop_c_name, NULL AS coop_c_phone, NULL AS coop_c_email
                FROM demanded d 
                JOIN org_donate o ON d.d_id = o.d_id 
                WHERE d.u_email = ?
            ) UNION (
                SELECT d.d_id, d.tag, d.d_date,
                       NULL AS donate_title,
                       c.title AS spons_title,
                       NULL AS intern_title,
                       NULL AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       c.c_name AS spons_c_name, c.c_phone AS spons_c_phone, c.c_email AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       NULL AS coop_c_name, NULL AS coop_c_phone, NULL AS coop_c_email
                FROM demanded d 
                JOIN cor_spons c ON d.d_id = c.d_id 
                WHERE d.u_email = ?
            ) UNION (
                SELECT d.d_id, d.tag, d.d_date,
                       NULL AS donate_title,
                       NULL AS spons_title,
                       i.intern_title AS intern_title,
                       NULL AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       i.c_name AS intern_c_name, i.c_phone AS intern_c_phone, i.c_email AS intern_c_email,
                       NULL AS coop_c_name, NULL AS coop_c_phone, NULL AS coop_c_email
                FROM demanded d 
                JOIN cor_intern i ON d.d_id = i.d_id 
                WHERE d.u_email = ?
            ) UNION (
                SELECT d.d_id, d.tag, d.d_date,
                       NULL AS donate_title,
                       NULL AS spons_title,
                       NULL AS intern_title,
                       co.coop_name AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       co.c_name AS coop_c_name, co.c_phone AS coop_c_phone, co.c_email AS coop_c_email
                FROM demanded d 
                JOIN corp_coop co ON d.d_id = co.d_id 
                WHERE d.u_email = ?
            ) UNION (
                SELECT d.d_id, d.tag, d.d_date,
                       NULL AS donate_title,
                       NULL AS spons_title,
                       NULL AS intern_title,
                       co.coop_name AS coop_title,
                       NULL AS donate_c_name, NULL AS donate_c_phone, NULL AS donate_c_email,
                       NULL AS spons_c_name, NULL AS spons_c_phone, NULL AS spons_c_email,
                       NULL AS intern_c_name, NULL AS intern_c_phone, NULL AS intern_c_email,
                       co.c_name AS coop_c_name, co.c_phone AS coop_c_phone, co.c_email AS coop_c_email
                FROM demanded d 
                JOIN club_coop co ON d.d_id = co.d_id 
                WHERE d.u_email = ?
            )
            ORDER BY d_date DESC";
        
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $u_email, $u_email, $u_email, $u_email, $u_email);
            $stmt->execute();
            $result = $stmt->get_result();
        
            $rows = []; // 沒有帳號被檢舉資料
        }
        
        
        ?>


<?php
$u_email = $_SESSION['u_email'];
$savedSql = "
  SELECT 
    d.d_id,
    d.tag,
    d.d_date,
    o.event_name   AS donate_title,
    c.title        AS spons_title,
    i.intern_title AS intern_title,
    co.coop_name   AS coop_title,
    o.c_name       AS donate_c_name, o.c_phone AS donate_c_phone, o.c_email AS donate_c_email,
    c.c_name       AS spons_c_name,  c.c_phone AS spons_c_phone,  c.c_email AS spons_c_email,
    i.c_name       AS intern_c_name, i.c_phone AS intern_c_phone, i.c_email AS intern_c_email,
    co.c_name      AS coop_c_name,   co.c_phone AS coop_c_phone,   co.c_email AS coop_c_email
  FROM user_favorites uf
  JOIN demanded d         ON uf.d_id = d.d_id
  LEFT JOIN org_donate o  ON d.d_id = o.d_id
  LEFT JOIN cor_spons c   ON d.d_id = c.d_id
  LEFT JOIN cor_intern i  ON d.d_id = i.d_id
  LEFT JOIN club_coop co   ON d.d_id = co.d_id
  LEFT JOIN corp_coop co2 ON d.d_id = co2.d_id
  WHERE uf.user_email = ?
  ORDER BY d.d_date DESC
";


// 2. 執行查詢
$stmt = $conn->prepare($savedSql);
$stmt->bind_param('s', $u_email);
$stmt->execute();
$result2 = $stmt->get_result();





 $currentUser = $_SESSION['u_email'] ?? '';
$myFavs = [];
if ($currentUser) {
  $resFav = mysqli_query($conn, "
    SELECT d_id
      FROM user_favorites
     WHERE user_email = '" . $currentUser . "'
  ");
  while ($fav = mysqli_fetch_assoc($resFav)) {
    $myFavs[] = (int)$fav['d_id'];
  }
}
?>

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index.php">首頁</a></li>
                        <li class="current">帳號管理</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="real-estate-2 section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-between gy-4 mt-4">
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div>
                            <h3 class="hover-underline" id="nav-form" onclick="showSection('form')"><a href="#">基本資料</a></h3>
                            <div class="collapsible">
                                <ul>
                                    <?php if ($u_permission === '企業'): ?>
                                        <li>
                                            <p>🏢 <strong>公司類型：</strong><?= htmlspecialchars($data['c_type']) ?></p>
                                        </li>
                                        <li>
                                            <p>👤 <strong>聯絡人姓名：</strong><?= htmlspecialchars($data['e_name']) ?></p>
                                        </li>
                                        <li>
                                            <p>💼 <strong>聯絡人職稱：</strong><?= htmlspecialchars($data['e_type']) ?></p>
                                        </li>
                                        <li>
                                            <p>📧 <strong>聯絡人Email：</strong><?= htmlspecialchars($data['e_email']) ?></p>
                                        </li>
                                        <li>
                                            <p>📞 <strong>聯絡人電話：</strong><?= htmlspecialchars($data['e_phone']) ?></p>
                                        </li>
                                        <li>
                                            <p class="clamp-4">📜 <strong>公司簡介：</strong><?= nl2br(htmlspecialchars($data['u_content'])) ?></p>
                                        </li>
                                    <?php elseif ($u_permission === '組織團體'): ?>
                                        <li>
                                            <p>🏢 <strong>組織類型：</strong><?= htmlspecialchars($data['o_type']) ?></p>
                                        </li>
                                        <li>
                                            <p>👤 <strong>聯絡人姓名：</strong><?= htmlspecialchars($data['s_name']) ?></p>
                                        </li>
                                        <li>
                                            <p>💼 <strong>聯絡人職稱：</strong><?= htmlspecialchars($data['s_type']) ?></p>
                                        </li>
                                        <li>
                                            <p>📧 <strong>聯絡人Email：</strong><?= htmlspecialchars($data['s_email']) ?></p>
                                        </li>
                                        <li>
                                            <p>📞 <strong>聯絡人電話：</strong><?= htmlspecialchars($data['s_phone']) ?></p>
                                        </li>
                                        <li>
                                            <p class="clamp-4">📜 <strong>組織簡介：</strong><?= nl2br(htmlspecialchars($data['u_content'])) ?></p>
                                        </li>
                                    <?php elseif ($u_permission === '管理者'): ?>
                                        <li>
                                            <p>📧 <strong>管理者Email：</strong><?= htmlspecialchars($data['u_email']) ?></p>
                                        </li>
                                        <li>
                                            <p class="clamp-4">📜 <strong>管理者簡介：</strong><?= nl2br(htmlspecialchars($data['u_content'])) ?></p>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php if ($u_permission === '管理者'): ?>
                            <div>
                                <h3 class="hover-underline" id="nav-banpro" onclick="showSection('banpro')"><a href="#">被檢舉文章</a></h3>
                            </div>
                            <div>
                                <h3 class="hover-underline" id="nav-banac" onclick="showSection('banac')"><a href="#">被檢舉帳號</a></h3>
                            </div> 

                        <?php else:?>
                        <div>
                            <h3 class="hover-underline" id="nav-published" onclick="showSection('published')"><a href="#">已發佈的文章</a></h3>
                        </div>
                        <div>
                            <h3 class="hover-underline" id="nav-projects" onclick="showSection('projects')"><a href="#">合作專案</a></h3>
                            
                        </div>
                        <div>
                            <h3 class="hover-underline" id="nav-saved" onclick="showSection('saved')"><a href="#">收藏的文章</a></h3>
                        </div>
                        <?php endif; ?>
                        
                    </div>

                    

                    <!-- 右側顯示區域 -->
                    <div class="col-lg-9" id="right-section">
                        <?php if ($u_permission !== '管理者'): ?>
                        <!-- 預設內容：已發佈的文章 -->
                        <div id="published-section" class="section-content">
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <?php
                                $contact_name = $row['donate_c_name'] ?? $row['spons_c_name'] ?? $row['intern_c_name'] ?? $row['coop_c_name'] ?? '無資料';
                                $contact_phone = $row['donate_c_phone'] ?? $row['spons_c_phone'] ?? $row['intern_c_phone'] ?? $row['coop_c_phone'] ?? '無資料';
                                $contact_email = $row['donate_c_email'] ?? $row['spons_c_email'] ?? $row['intern_c_email'] ?? $row['coop_c_email'] ?? '無資料';

                                // 主標題處理
                                $title = '';
                                switch ($row['tag']) {
                                    case '合作':
                                        $title = $row['coop_title'] ?? '';
                                        $label = '✏️ 合作標題：';
                                        break;
                                    case '贊助':
                                        $title = $row['spons_title'] ?? '';
                                        $label = '✏️ 活動標題：';
                                        break;
                                    case '實習':
                                        $title = $row['intern_title'] ?? '';
                                        $label = '✏️ 職缺標題：';
                                        break;
                                    case 'spon':
                                        $title = $row['donate_title'] ?? '';
                                        $label = '✏️ 活動標題：';
                                        break;
                                    default:
                                        $title = $row['title'] ?? '';
                                        $label = '✏️ 標題：';
                                        break;
                                }
                                ?>
                                <div class='dcard-post'>
                                    <div class='dcard-header'>
                                        <?php if ($row['tag'] == 'spon') {
                                            $row['tag'] = '贊助';
                                        } ?>
                                        <span class='dcard-tag'>#<?= htmlspecialchars($row['tag']) ?></span>
                                    </div>

                                    <div class='dcard-body'>
                                        <p><strong><?= $label ?></strong> <?= !empty($title) ? htmlspecialchars($title) : '無標題' ?></p>
                                    </div>

                                    <div class='dcard-footer'>
                                        <div>
                                            <span>👤 聯絡人：<?= htmlspecialchars($contact_name) ?></span>
                                            <span>📞 電話：<?= htmlspecialchars($contact_phone) ?></span>
                                            <span>✉️ Email：<?= htmlspecialchars($contact_email) ?></span>
                                        </div>
                                        <div>
                                            <a href='editpost.php?id=<?= $row['d_id'] ?>' class='btn btn-sm btn-success me-2' style='background-color: #28c76f; border-color: #28c76f;'>
                                                <i class='bi bi-pencil'></i> 修改
                                            </a>
                                            <a href='deletepost.php?id=<?= $row['d_id'] ?>' class='btn btn-sm btn-danger' onclick="return confirm('確定要刪除這篇文章嗎？')">
                                                <i class='bi bi-trash'></i> 刪除
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>


                        <?php if ($u_permission === '企業'): ?>
                            <!-- 表單：基本資料 -->
                            <div id="form-section" class="contact section-content" style="display: none;">
                                <form action="accountdb.php" method="post" class="php-email-form">
                                    <div class="row gy-4">
                                        <label>基本公司資訊</label>
                                        <div class='col-md-6'><input type='text' class='form-control' name='c_name' value="<?= $data['c_name'] ?>" placeholder='公司名稱' required></div>
                                        <div class='col-md-3'><input type='text' class='form-control' name='c_type' value="<?= $data['c_type'] ?>" placeholder='公司類型' required></div>
                                        <div class='col-md-3'>
                                            <select class='form-select' name='c_industry' required>
                                                <option disabled <?= empty($data['c_industry']) ? 'selected' : '' ?>>請選擇產業類別</option>
                                                <option value='大眾傳播相關業' <?= ($data['c_industry'] == '大眾傳播相關業') ? 'selected' : '' ?>>大眾傳播相關業</option>
                                                <option value='旅遊／休閒／運動業' <?= ($data['c_industry'] == '旅遊／休閒／運動業') ? 'selected' : '' ?>>旅遊／休閒／運動業</option>
                                                <option value='住宿／餐飲服務業' <?= ($data['c_industry'] == '住宿／餐飲服務業') ? 'selected' : '' ?>>住宿／餐飲服務業</option>
                                                <option value='高科技' <?= ($data['c_industry'] == '高科技') ? 'selected' : '' ?>>高科技</option>
                                            </select>
                                        </div>
                                        <div class='col-md-5'><input type='text' class='form-control' name='c_address' value="<?= $data['c_address'] ?>" placeholder='公司地址' required></div>
                                        <div class='col-md-4'><input type='email' class='form-control' name='c_email' value="<?= $data['c_email'] ?>" placeholder='公司Email' required></div>
                                        <div class='col-md-3'><input type='tel' class='form-control' name='c_phone' value="<?= $data['c_phone'] ?>" placeholder='公司電話' required></div>

                                        <label>聯絡資訊</label>
                                        <div class='col-md-6'><input type='text' class='form-control' name='e_name' value="<?= $data['e_name'] ?>" placeholder='聯絡人姓名' required></div>
                                        <div class='col-md-6'><input type='text' class='form-control' name='e_type' value="<?= $data['e_type'] ?>" placeholder='職稱' required></div>
                                        <div class='col-md-6'><input type='email' class='form-control' name='e_email' value="<?= $data['e_email'] ?>" placeholder='聯絡人Email' required></div>
                                        <div class='col-md-6'><input type='tel' class='form-control' name='e_phone' value="<?= $data['e_phone'] ?>" placeholder='聯絡人手機號碼' required></div>

                                        <label>平台會員訊息</label>
                                        <div class='col-md-5'><input type='email' class='form-control' name='u_email' value="<?= $data['u_email'] ?>" placeholder='Email' required></div>
                                        <div class='col-md-5'><input type='text' class='form-control' name='u_password' value="<?= $account['u_password'] ?>" placeholder='密碼' readonly></div>
                                        <div class='col-md-12'><textarea class='form-control' name='u_content' rows='5' placeholder='公司簡介' required><?= htmlspecialchars($account['u_content']) ?></textarea></div>

                                        <div class='col-md-12 text-center'><button type='submit'>更改</button></div>
                                    </div>
                                </form>
                            </div>
                        <?php elseif ($u_permission === '組織團體'): ?>
                            <div id="form-section" class="contact section-content" style="display: none;">
                                <form action="accountdb.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                                    <div class="row gy-4">
                                        <label>基本組織資訊</label>
                                        <div class='col-md-6'><input type='text' class='form-control' name='o_name' value="<?= $data['o_name'] ?>" placeholder='組織名稱' required></div>
                                        <div class='col-md-6'>
                                            <select class='form-select' name='o_type' required>
                                                <option disabled <?= empty($data['o_type']) ? 'selected' : '' ?>>請選擇組織類型</option>
                                                <option value='社團' <?= ($data['o_type'] == '社團') ? 'selected' : '' ?>>社團</option>
                                                <option value='系學會' <?= ($data['o_type'] == '系學會') ? 'selected' : '' ?>>系學會</option>
                                            </select>
                                        </div>

                                        <label>負責人與聯絡資訊</label>
                                        <div class='col-md-6'><input type='text' class='form-control' name='s_name' value="<?= $data['s_name'] ?>" placeholder='主要聯絡人姓名' required></div>
                                        <div class='col-md-6'><input type='text' class='form-control' name='s_type' value="<?= $data['s_type'] ?>" placeholder='職稱' required></div>
                                        <div class='col-md-6'><input type='email' class='form-control' name='s_email' value="<?= $data['s_email'] ?>" placeholder='聯絡人Email' required></div>
                                        <div class='col-md-6'><input type='tel' class='form-control' name='s_phone' value="<?= $data['s_phone'] ?>" placeholder='聯絡人手機號碼' required></div>

                                        <label>平台會員訊息</label>
                                        <div class="col-md-6"><input type="email" class="form-control" name="u_email" value="<?= $data['u_email'] ?>" placeholder="Email" readonly></div>
                                        <div class="col-md-6"><input type="text" class="form-control" name="u_password" value="<?= $account['u_password'] ?>" placeholder="密碼" required></div>
                                        <div class="col-md-12"><textarea class="form-control" name="u_content" rows="5" placeholder="組織簡介" required><?= htmlspecialchars($account['u_content']) ?></textarea></div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit">更改</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <?php elseif ($u_permission === '管理者'): ?>
                                    
                            <div id="form-section" class="contact section-content" style="display: none;">
                                <form action="accountdb.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                                    <div class="row gy-4">
                                        <label>管理者訊息</label>
                                        <div class="col-md-6"><input type="email" class="form-control" name="u_email" value="<?= $data['u_email'] ?>" placeholder="Email" readonly></div>
                                        <div class="col-md-6"><input type="text" class="form-control" name="u_password" value="<?= $account['u_password'] ?>" placeholder="密碼" required></div>
                                        <div class="col-md-12"><textarea class="form-control" name="u_content" rows="5" placeholder="組織簡介" required><?= htmlspecialchars($account['u_content']) ?></textarea></div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit">更改</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>

                        <!-- 合作專案（示範卡片） -->
                        <div id="projects-section" class="section-content" style="display: none;">
                                        <?php

                                        $me = $_SESSION['u_email'] ?? '';
                                        if (!$me) exit('請先登入');

                                        $conn = new mysqli("localhost","root","","sa");
                                        if ($conn->connect_error) die("DB 連線失敗");

                                        // 取出所有與我有關的 match
                                        $stmt = $conn->prepare("SELECT * FROM match_db WHERE a_u_email=? OR b_u_email=?");
                                        $stmt->bind_param("ss", $me, $me);
                                        $stmt->execute();
                                        $all = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                                        $stmt->close();

                                        // 分三區
                                        $pending    = []; // pending
                                        $negotiating= []; // negotiating
                                        $completed  = []; // completed
                                        foreach ($all as $r) {
                                            switch ($r['status']) {
                                                case 'pending':     $pending[]     = $r; break;
                                                case 'negotiating': $negotiating[] = $r; break;
                                                case 'completed':   $completed[]   = $r; break;
                                            }
                                        }

                                        // Render Block

                                        function renderBlock($title, $rows, $step, $label, $me, $conn) {
                                            if (empty($rows)) return;
                                            echo "<h3>$title</h3>";
                                            foreach ($rows as $r) {
                                                $partner = ($r['a_u_email'] === $me) ? $r['b_u_email'] : $r['a_u_email'];

                                                $t = $conn->prepare("SELECT tag FROM demanded WHERE d_id=?");
                                                $t->bind_param("s", $r['demanded_id']);
                                                $t->execute();
                                                $tag = htmlspecialchars($t->get_result()->fetch_assoc()['tag'] ?? '');
                                                $t->close();

                                                switch ($tag) {
                                                    case '企業合作': $tbl='corp_coop';  $key='coop_name'; break;
                                                    case '社團合作': $tbl='club_coop';  $key='coop_name'; break;
                                                    case 'spon':      $tbl='org_donate'; $key='event_name'; $tag='贊助'; break;
                                                    case '贊助':      $tbl='cor_spons';  $key='title'; break;
                                                    case '實習':      $tbl='cor_intern'; $key='intern_title'; break;
                                                    default:          $tbl=''; $key=''; break;
                                                }

                                                $proj = '';
                                                if ($tbl) {
                                                    $u = $conn->prepare("SELECT $key FROM $tbl WHERE d_id=?");
                                                    $u->bind_param("s", $r['demanded_id']);
                                                    $u->execute();
                                                    $proj = htmlspecialchars($u->get_result()->fetch_assoc()[$key] ?? '');
                                                    $u->close();
                                                }

                                                $who = ($r['a_u_email'] === $me) ? 'a' : 'b';
                                                $confirmed = $r["{$step}_{$who}"];
                                                $btnText = $confirmed ? "等待對方$label" : "我$label";

                                                $feedbackScore = 0;
                                                if ($me === $r['a_u_email']) {
                                                    $feedbackScore = $r['a_feedback'];
                                                } elseif ($me === $r['b_u_email']) {
                                                    $feedbackScore = $r['b_feedback'];
                                                }

                                                // 判斷進度階段
                                                $stepIndex = 1;
                                                if ($r['status'] === 'pending') {
                                                    $stepIndex = 1;
                                                } elseif ($r['status'] === 'negotiating') {
                                                    $stepIndex = 2;
                                                } elseif ($r['status'] === 'completed') {
                                                    $stepIndex = 3;
                                                }

                                                // 第一階段狀態判斷
                                                $isWaitingStep1 = false;
                                                $isNotAcceptedStep1 = false;
                                                $waitingText1 = '';

                                                // 第二階段狀態判斷
                                                $isWaitingStep2 = false;
                                                $isNotAcceptedStep2 = false;
                                                $waitingText2 = '';

                                                if ($r['status'] === 'pending') {
                                                    if ($r['agree_a'] == 1 && $r['agree_b'] == 0) {
                                                        if ($me === $r['a_u_email']) {
                                                            $isWaitingStep1 = true;
                                                            $waitingText1 = "你已發出合作，等待對方接受";
                                                        } elseif ($me === $r['b_u_email']) {
                                                            $isNotAcceptedStep1 = true;
                                                            $waitingText1 = "你尚未接受對方合作邀請";
                                                        }
                                                    } elseif ($r['agree_b'] == 1 && $r['agree_a'] == 0) {
                                                        if ($me === $r['b_u_email']) {
                                                            $isWaitingStep1 = true;
                                                            $waitingText1 = "你已發出合作，等待對方接受";
                                                        } elseif ($me === $r['a_u_email']) {
                                                            $isNotAcceptedStep1 = true;
                                                            $waitingText1 = "你尚未接受對方合作邀請";
                                                        }
                                                    }
                                                } elseif ($r['status'] === 'negotiating') {
                                                    $meIsA = ($me === $r['a_u_email']);
                                                    $meIsB = ($me === $r['b_u_email']);

                                                    $meCompleteFlag = $meIsA ? $r['complete_a'] : ($meIsB ? $r['complete_b'] : 0);
                                                    $otherCompleteFlag = $meIsA ? $r['complete_b'] : ($meIsB ? $r['complete_a'] : 0);

                                                    if ($meCompleteFlag == 1 && $otherCompleteFlag == 0) {
                                                        $isWaitingStep2 = true;
                                                        $waitingText2 = "你已完成洽談，等待對方完成";
                                                    } elseif ($meCompleteFlag == 0) {
                                                        $isNotAcceptedStep2 = true;
                                                        $waitingText2 = "你尚未完成洽談";
                                                    }
                                                }

                                                // Step 顏色 class
                                                $step1Class = $isWaitingStep1 ? 'waiting' : ($isNotAcceptedStep1 ? 'not-accepted' : (($stepIndex >= 1) ? 'active' : ''));
                                                $step2Class = $isWaitingStep2 ? 'waiting' : ($isNotAcceptedStep2 ? 'not-accepted' : (($stepIndex >= 2) ? 'active' : ''));
                                                $step3Class = ($stepIndex >= 3) ? 'active' : '';

                                                // 連接線顏色判斷 (符合你的需求)
                                                $connector1Class = '';
                                                $connector2Class = '';

                                                if ($stepIndex == 1) {
                                                    // 進度在1：第一條線橘色，第二條線灰色
                                                    $connector1Class = 'active-orange';
                                                    $connector2Class = '';
                                                } elseif ($stepIndex == 2) {
                                                    // 進度在1到2：第一條線綠色，第二條線橘色
                                                    $connector1Class = 'active-green';
                                                    $connector2Class = 'active-orange';
                                                } elseif ($stepIndex >= 3) {
                                                    // 進度3以上：兩條線綠色
                                                    $connector1Class = 'active-green';
                                                    $connector2Class = 'active-green';
                                                }

                                                echo "
                                                <div class='dcard-post'>
                                                    <div class='dcard-header'><span class='dcard-tag'>#$tag</span></div>
                                                    <div class='progress-steps' style='margin-bottom: 15px;'>
                                                        <div class='step $step1Class'>1</div>
                                                        <div class='connector $connector1Class'></div>
                                                        <div class='step $step2Class'>2</div>
                                                        <div class='connector $connector2Class'></div>
                                                        <div class='step $step3Class'>3</div>
                                                    </div>";

                                                if ($isWaitingStep2 || $isNotAcceptedStep2) {
                                                    echo "<p style='color:" . ($isWaitingStep2 ? 'orange' : 'red') . "; font-weight: bold; margin-top: 5px;'>$waitingText2</p>";
                                                } elseif ($isWaitingStep1 || $isNotAcceptedStep1) {
                                                    echo "<p style='color:" . ($isWaitingStep1 ? 'orange' : 'red') . "; font-weight: bold; margin-top: 5px;'>$waitingText1</p>";
                                                }

                                                echo "
                                                    <div class='dcard-body'>
                                                        <p><strong>合作夥伴：</strong>$partner</p>
                                                        <p><strong>專案名稱：</strong><a href='./property-single.php?id={$r['demanded_id']}'>$proj</a></p>
                                                        <p><strong>開始日期：</strong>{$r['d_date']}</p>
                                                        <p><strong>狀態：</strong>$title</p>
                                                    </div>
                                                    <div class='dcard-footer'>
                                                        <div>
                                                            <button class='js-action btn' 
                                                                    style='background-color:#28c76f;color:white;' 
                                                                    data-did='{$r['d_id']}' 
                                                                    data-step='$step'>
                                                                $btnText
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <div class='star-rating' data-rating='$feedbackScore' data-match-id='{$r['d_id']}'>";
                                                            if ($r['status'] === 'completed') {
                                                                for ($i = 1; $i <= 5; $i++) {
                                                                    $selected = ($i <= $feedbackScore) ? "selected" : "";
                                                                    echo "<span class='star $selected' data-value='$i'>★</span>";
                                                                }
                                                               echo '<a href="./complete_feedback.php?match_id=' . $r['d_id'] . '">點我給評</a>';

                                                            }
                                                echo "</div>
                                                            <a class='btn chat-button' style='background-color:#28c76f;color:white; margin-left: 10px; border-radius: 100%;'
                                                            href='./chat/public/index.php?u_email=" . urlencode($me) . "&receiver=" . urlencode($partner) . "' 
                                                            target='_blank'><i class='bi bi-chat-dots-fill'></i></a>
                                                        </div>
                                                    </div>
                                                </div>";
                                            }
                                        }
                                        // 輸出
                                        renderBlock('同意申請',   $pending,     'agree',    '同意',     $me, $conn);
                                        renderBlock('洽談中',     $negotiating, 'complete', '同意完成',     $me, $conn);
                                        renderBlock('已完成合作', $completed,   'terminate','已完成合作', $me, $conn);

                                        $conn->close();
                                    ?>
                        </div>

                        <div id="saved-section" class="section-content">
                            
                            <?php while ($row = $result2->fetch_assoc()): ?>
                                <?php
                                    $d_id  = (int)$row['d_id'];
                                    $saved = in_array($d_id, $myFavs);
                                
                                       $iconClass = $saved ? 'bi-heart-fill saved' : 'bi-heart';
                                        $iconStyle = $saved ? 'color:red;' : '';


                                $contact_name = $row['donate_c_name'] ?? $row['spons_c_name'] ?? $row['intern_c_name'] ?? $row['coop_c_name'] ?? '無資料';
                                $contact_phone = $row['donate_c_phone'] ?? $row['spons_c_phone'] ?? $row['intern_c_phone'] ?? $row['coop_c_phone'] ?? '無資料';
                                $contact_email = $row['donate_c_email'] ?? $row['spons_c_email'] ?? $row['intern_c_email'] ?? $row['coop_c_email'] ?? '無資料';

                                // 主標題處理
                                $title = '';
                                switch ($row['tag']) {
                                    case '合作':
                                        $title = $row['coop_title'] ?? '';
                                        $label = '✏️ 合作標題：';
                                        break;
                                    case '贊助':
                                        $title = $row['spons_title'] ?? '';
                                        $label = '✏️ 活動標題：';
                                        break;
                                    case '實習':
                                        $title = $row['intern_title'] ?? '';
                                        $label = '✏️ 職缺標題：';
                                        break;
                                    case 'spon':
                                        $title = $row['donate_title'] ?? '';
                                        $label = '✏️ 活動標題：';
                                        break;
                                    default:
                                        $title = $row['title'] ?? '';
                                        $label = '✏️ 標題：';
                                        break;
                                }
                                ?>                            
                        
                                <div class='dcard-post'>
                                     <a href="./property-single.php?id=<?=$row['d_id']?>">
                                        <div class='dcard-header'>
                                            <?php if ($row['tag'] == 'spon') {
                                                $row['tag'] = '贊助';
                                            } ?>
                                            <span class='dcard-tag'>#<?= htmlspecialchars($row['tag']) ?></span>
                                        </div>

                                        <div class='dcard-body'>
                                            <p><strong><?= $label ?></strong> <?= !empty($title) ? htmlspecialchars($title) : '無標題' ?></p>
                                        </div>

                                        <div class='dcard-footer'>
                                            <div>
                                                <span>👤 聯絡人：<?= htmlspecialchars($contact_name) ?></span>
                                                <span>📞 電話：<?= htmlspecialchars($contact_phone) ?></span>
                                                <span>✉️ Email：<?= htmlspecialchars($contact_email) ?></span>

                                                <?php 
                                                    echo "<i class=\"bi {$iconClass} favorite-icon\" "
                                                        . "data-id=\"{$d_id}\" "
                                                        . "title=\"收藏\" "
                                                        . "style=\"{$iconStyle}\"></i>";
                                                ?>

                                            </div>
                                              

                                            
                                        </div>
                                   
                                    </a>
                                </div>

                                
                            <?php endwhile; ?>
                        </div>

                        <div id="banac-section" class="section-content">
                            <?php foreach ($rows as $row): ?>
                                <a href="./profile.php?user_email=<?= htmlspecialchars($row['user_email']) ?>">
                                    <div class="dcard-post">
                                        <div class='dcard-header'>
                                            <span class='dcard-tag'>🚨 被檢舉帳號</span>
                                        </div>
                                        <div class='dcard-body'>
                                            <p><strong>⚠️ 此帳號已被檢舉 <?= (int)$row['user_banac'] ?> 次</strong></p>
                                            <p><strong>📛 身份：</strong><?= htmlspecialchars($row['user_permission']) ?></p>
                                            <p><strong>✉️ 會員Email：</strong><?= htmlspecialchars($row['user_email']) ?></p>
                                        </div>
                                        <div class='dcard-footer'>
                                        <div>
                                            <span>👤 <strong>負責人：</strong><?= htmlspecialchars($row['contact_name']) ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>📞 <strong>電話：</strong><?= htmlspecialchars($row['contact_phone']) ?></span>
                                        </div>
                                        <div>
                                            <a href='deletepost.php?id=<?= $row['d_id'] ?>' class='btn btn-sm btn-danger' onclick="return confirm('確定要刪除這個帳號嗎？')">
                                                    <i class='bi bi-trash'></i> 刪除帳號
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>






                    <div id="banpro-section" class="section-content">   <?php while ($row = $result->fetch_assoc()): ?>
                            <?php
                                $d_id  = (int)$row['d_id'];
                                $saved = in_array($d_id, $myFavs);
                                $iconClass = $saved ? 'bi-heart-fill saved' : 'bi-heart';
                                $iconStyle = $saved ? 'color:red;' : '';

                                $contact_name = $row['donate_c_name'] ?? $row['spons_c_name'] ?? $row['intern_c_name'] ?? $row['coop_c_name'] ?? '無資料';
                                $contact_phone = $row['donate_c_phone'] ?? $row['spons_c_phone'] ?? $row['intern_c_phone'] ?? $row['coop_c_phone'] ?? '無資料';
                                $contact_email = $row['donate_c_email'] ?? $row['spons_c_email'] ?? $row['intern_c_email'] ?? $row['coop_c_email'] ?? '無資料';
                            


                                // 主標題處理
                                $title = '';
                                switch ($row['tag']) {
                                    case '合作':
                                        $title = $row['coop_title'] ?? '';
                                        $label = '✏️ 合作標題：';
                                        break;
                                    case '贊助':
                                        $title = $row['spons_title'] ?? '';
                                        $label = '✏️ 活動標題：';
                                        break;
                                    case '實習':
                                        $title = $row['intern_title'] ?? '';
                                        $label = '✏️ 職缺標題：';
                                        break;
                                    case 'spon':
                                        $title = $row['donate_title'] ?? '';
                                        $label = '✏️ 活動標題：';
                                        break;
                                    default:
                                        $title = $row['title'] ?? '';
                                        $label = '✏️ 標題：';
                                        break;
                                }
                            ?>                            

                            <div class='dcard-post'> 
                                <!-- 不要把整個卡片都包在 a 裡 -->
                                <a href="./property-single.php?id=<?= $row['d_id'] ?>" class="dcard-link">
                                    <div class='dcard-header'>
                                        <span class='dcard-tag'>🚨 被檢舉 #<?= htmlspecialchars($row['tag']) ?></span>
                                    </div>

                                    <div class='dcard-body'>
                                        <p><strong>⚠️ 此文章已被檢舉 <?= (int)$row['d_ban'] ?> 次</strong></p>
                                        <p><strong><?= $label ?></strong> <?= !empty($title) ? htmlspecialchars($title) : '無標題' ?></p>
                                    </div>
                                </a>

                                <div class='dcard-footer'>
                                    <div class="footer-left">
                                        <span>👤 聯絡人：<?= htmlspecialchars($contact_name) ?></span>&nbsp;&nbsp;
                                        <span>📞 電話：<?= htmlspecialchars($contact_phone) ?></span>&nbsp;&nbsp;
                                        <span>✉️ Email：<?= htmlspecialchars($contact_email) ?></span>
                                    </div>
                                    <div class="footer-right">
                                        <a href='deletepost.php?id=<?= $row['d_id'] ?>' class='btn btn-sm btn-danger' onclick="return confirm('確定要刪除這個文章嗎？')">
                                            <i class='bi bi-trash'></i> 刪除文章
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            </div>

            <script>
                function showSection(section) {
                    const sections = ['form', 'published', 'projects','saved','banpro','banac'];
                   
                        
                       
                        

                    sections.forEach(id => {
                        // 顯示/隱藏右側內容
                        const content = document.getElementById(id + '-section');
                        if (content) content.style.display = id === section ? 'block' : 'none';

                        // 控制綠線 class
                        const navItem = document.getElementById('nav-' + id);
                        if (navItem) {
                            if (id === section) {
                                navItem.classList.add('active-underline');
                            } else {
                                navItem.classList.remove('active-underline');
                            }
                        }
                    });
                  
                }

                // 預設載入「已發佈的文章」
                window.addEventListener('DOMContentLoaded', () => {
                    showSection('published');
                });
                
                document.querySelectorAll('.star-rating').forEach(rating => {
                const stars = rating.querySelectorAll('.star');
                const matchId = rating.dataset.matchId;

                stars.forEach(star => {
                    star.addEventListener('click', () => {
                    const selectedRating = parseInt(star.dataset.value);
                    console.log("你點了星星：" + selectedRating); // ← 檢查是否有觸發


                        // 更新前端星星顏色
                        stars.forEach(s => {
                            s.classList.toggle('selected', parseInt(s.dataset.value) <= selectedRating);
                        });

                        // 發送 AJAX 到 feedback.php
                        fetch('feedback.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: `d_id=${matchId}&rating=${selectedRating}`
                        })
                        .then(res => res.text())
                        .then(data => {
                            console.log("評分結果：" + data);
                        });
                    });
                });
            });
            if (window.location.search.includes('success=1')) {
                const url = new URL(window.location);
                url.searchParams.delete('success');
                window.history.replaceState({}, document.title, url.toString());
            }
            </script>

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
    
    <script>
    // AJAX 呼叫 update_status.php
    document.querySelectorAll('.js-action').forEach(btn=>{
    btn.onclick = async ()=>{
        const did  = btn.dataset.did;
        const step = btn.dataset.step;
        const res = await fetch('update_status.php', {
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:`d_id=${did}&step=${step}`
        });
        const j = await res.json();
        if (j.status) location.reload();
        else alert('更新失敗');
    };
    });


    document.querySelectorAll('.star-rating').forEach(rating => {
        const stars = rating.querySelectorAll('.star');
        let selectedRating = 0;

        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                const val = parseInt(star.dataset.value);
                stars.forEach(s => {
                    s.classList.toggle('hovered', parseInt(s.dataset.value) <= val);
                });
            });

            star.addEventListener('mouseout', () => {
                stars.forEach(s => s.classList.remove('hovered'));
            });

            star.addEventListener('click', () => {
                selectedRating = parseInt(star.dataset.value);
                rating.dataset.rating = selectedRating;
                stars.forEach(s => {
                    s.classList.toggle('selected', parseInt(s.dataset.value) <= selectedRating);
                });
                // 你可以在這裡做後端 AJAX 提交、console.log，或其他處理
                console.log("使用者評分為：" + selectedRating);
            });
        });
    });
    </script>

    <!-- Bootstrap 5 JS（CDN）-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const toastEl = document.getElementById('successToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>

  <!-- 儲存文章 -->

  <script>
    document.querySelectorAll('.bi-heart, .bi-heart-fill').forEach(icon => {
      icon.addEventListener('click', e => {
        const el = e.currentTarget;
        const did = el.dataset.id;

        fetch(window.location.href, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=toggle_favorite&d_id=' + encodeURIComponent(did)
          })
          .then(r => r.json())
          .then(json => {
            if (json.error) {
              alert(json.error);
              return;
            }
            if (json.saved) {
              el.classList.replace('bi-heart', 'bi-heart-fill');
              el.classList.add('saved');
            } else {
              el.classList.replace('bi-heart-fill', 'bi-heart');
              el.classList.remove('saved');
            }
          })

      });
    });

  </script>
  <script>
document.querySelectorAll('.favorite-icon').forEach(icon => {
  icon.addEventListener('click', function(event) {
    event.stopPropagation(); // 不讓點擊觸發 a 連結
    event.preventDefault();

    const isSaved = this.classList.contains('bi-heart-fill');
    const dId = this.dataset.id;

    // 切換圖示與顏色
    if (isSaved) {
      this.classList.remove('bi-heart-fill', 'saved');
      this.classList.add('bi-heart');
      this.style.color = ''; // 取消紅色
    } else {
      this.classList.remove('bi-heart');
      this.classList.add('bi-heart-fill', 'saved');
      this.style.color = 'red';
    }

    // 你可以在這裡觸發 AJAX 送出收藏狀態
    // sendFavoriteStatus(dId, !isSaved);
  });
});
</script>




</body>


</html>






















































