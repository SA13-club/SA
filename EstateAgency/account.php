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
    </style>

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
                        echo "<li><a href='account.php' class='active'>帳號管理</a></li>";
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

        $stmt = $conn->prepare("(
        SELECT d.d_id, d.tag, d.d_date,
               o.title AS donate_title,
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
        JOIN org_coop co ON d.d_id = co.d_id 
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
    ORDER BY d_date DESC
    ");



        $stmt->bind_param("ssssss", $u_email, $u_email, $u_email, $u_email, $u_email, $u_email);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container" style="padding: 85px 0 0 0;">
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
                                            <p>📜 <strong>公司簡介：</strong></p>
                                            <p><?= nl2br(htmlspecialchars($data['u_content'])) ?></p>
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
                                            <p>📜 <strong>組織簡介：</strong></p>
                                            <p><?= nl2br(htmlspecialchars($data['u_content'])) ?></p>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <h3 class="hover-underline" id="nav-published" onclick="showSection('published')"><a href="#">已發佈的文章</a></h3>
                        </div>
                        <div>
                            <h3 class="hover-underline" id="nav-projects" onclick="showSection('projects')"><a href="#">合作專案</a></h3>
                        </div>
                    </div>

                    <!-- 右側顯示區域 -->
                    <div class="col-lg-9" id="right-section">
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
                                        <?php if($row['tag']=='spon'){
                                            $row['tag']='贊助';
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
                                        <div class='col-md-5'><input type='text' class='form-control' name='u_password' value="<?= $account['u_password'] ?>" placeholder='密碼' required></div>
                                        <div class='col-md-12'><textarea class='form-control' name='u_content' rows='3' placeholder='公司簡介' required><?= htmlspecialchars($account['u_content']) ?></textarea></div>

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
                                        <div class="col-md-6"><input type="email" class="form-control" name="u_email" value="<?= $data['u_email'] ?>" placeholder="Email" required></div>
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
                            <div class='dcard-post'>
                                <a href='project-detail.php'>
                                    
                                    <div class='dcard-body'>
                                        <?php 
                                         $servername = "localhost";
                                         $username = "root";
                                         $password = "";
                                         $dbname = "sa";
                                 
                                         $conn = new mysqli($servername, $username, $password, $dbname);
                                 
                                      
                                       
                                            // …（前面連線程式不變）…

                                            $account_mail = $_SESSION['u_email'];

                                         
                                                

                                                // 假設前面已經建立好 $conn 與取得 $account_mail

                                                // 1. 撈出 a_u_email 或 b_u_email 等於使用者的所有紀錄
                                                $sql  = "SELECT * FROM match_db 
                                                        WHERE a_u_email = ? OR b_u_email = ?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("ss", $account_mail, $account_mail);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                // 2. 分區
                                                $pendingAgree = [];   // agree = 0
                                                $negotiation  = [];   // agree = 1, draft = 0
                                                $completed    = [];   // agree = 1, draft = 1

                                                while ($row = $result->fetch_assoc()) {
                                                    // 動態決定「合作夥伴」是哪個欄位
                                                    if ($row['a_u_email'] === $account_mail) {
                                                        $partner = $row['b_u_email'];
                                                    } else {
                                                        $partner = $row['a_u_email'];
                                                    }
                                                    $row['partner'] = $partner;

                                                    if ($row['agree'] == 0) {
                                                        $pendingAgree[] = $row;
                                                    }
                                                    elseif ($row['agree'] == 1 && $row['draft'] == 0) {
                                                        $negotiation[] = $row;
                                                    }
                                                    elseif ($row['agree'] == 1 && $row['draft'] == 1) {
                                                        $completed[] = $row;
                                                    }
                                                }

                                                // 3. 輸出「同意申請」
                                                if (!empty($pendingAgree)) {
                                                    echo "<h3>同意申請</h3>";
                                                    foreach ($pendingAgree as $r) {
                                                        echo "
                                                        <div class='dcard-post'>
                                                        <div class='dcard-header'>
                                                            <span class='dcard-tag'>#合作專案</span>
                                                        </div>
                                                        <div class='dcard-body'>
                                                            <p><strong>合作夥伴：</strong>{$r['partner']}</p>
                                                            <p><strong>專案名稱：</strong></p>
                                                            <p><strong>開始日期：</strong></p>
                                                            <p><strong>狀態：</strong>等待同意</p>
                                                        </div>
                                                        </div>
                                                        ";
                                                    }
                                                }

                                                // 4. 輸出「洽談中」
                                                if (!empty($negotiation)) {
                                                    echo "<h3>洽談中</h3>";
                                                    foreach ($negotiation as $r) {
                                                        echo "
                                                        <div class='dcard-post'>
                                                        <div class='dcard-header'>
                                                            <span class='dcard-tag'>#合作專案</span>
                                                        </div>
                                                        <div class='dcard-body'>
                                                            <p><strong>合作夥伴：</strong>{$r['partner']}</p>
                                                            <p><strong>專案名稱：</strong></p>
                                                            <p><strong>開始日期：</strong></p>
                                                            <p><strong>狀態：</strong>洽談中</p>
                                                        </div>
                                                        </div>
                                                        ";
                                                    }
                                                }

                                                // 5. 輸出「已完成合作」
                                                if (!empty($completed)) {
                                                    echo "<h3>已完成合作</h3>";
                                                    foreach ($completed as $r) {
                                                        echo "
                                                        <div class='dcard-post'>
                                                        <div class='dcard-header'>
                                                            <span class='dcard-tag'>#合作專案</span>
                                                        </div>
                                                        <div class='dcard-body'>
                                                            <p><strong>合作夥伴：</strong>{$r['partner']}</p>
                                                            <p><strong>專案名稱：</strong></p>
                                                            <p><strong>開始日期：</strong></p>
                                                            <p><strong>狀態：</strong>已完成</p>
                                                        </div>
                                                        </div>
                                                        ";
                                                    }
                                                }

                                                $stmt->close();
                                                ?>


                                     
                                    </div>
                                        






                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            </div>

            <script>
                function showSection(section) {
                    const sections = ['form', 'published', 'projects'];
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

</body>

</html>