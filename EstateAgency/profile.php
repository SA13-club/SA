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

    </style>

<?php
// 資料庫連線資訊
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 從網址取得 d_id
$d_id = isset($_GET['d_id']) ? intval($_GET['d_id']) : 0;

// 初始化
$account_info = null;
$source = null;

if ($d_id > 0) {
    // 從 demanded 找 u_email
    $stmt = $conn->prepare("SELECT u_email FROM demanded WHERE d_id = ?");
    $stmt->bind_param("i", $d_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $u_email = $row['u_email'];

        // 先找 organization_registrations
        $stmt = $conn->prepare("SELECT * FROM organization_registrations WHERE u_email = ?");
        $stmt->bind_param("s", $u_email);
        $stmt->execute();
        $org_result = $stmt->get_result();

        if ($account_info = $org_result->fetch_assoc()) {
            $source = 'organization';
        } else {
            // 再找 corporation_registrations
            $stmt = $conn->prepare("SELECT * FROM corporation_registrations WHERE u_email = ?");
            $stmt->bind_param("s", $u_email);
            $stmt->execute();
            $corp_result = $stmt->get_result();

            if ($account_info = $corp_result->fetch_assoc()) {
                $source = 'corporation';
            }
        }
    }
}

// 關閉連線
$conn->close();
?>



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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
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
                </style>

<body class="starter-page-page" style="
  padding-top: 100px;background-image: url('./assets/img/bg2.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  min-height: 100vh;
  margin: 0;">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <h1 class="sitename">Co<span>LaB</span></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php">主頁</a></li>
                    <li><a href="about.php">關於</a></li>
                    <li><a href="services.php">服務</a></li>
                    <li><a href="propertiesdemo.php">最新專案</a></li>
                    <li><a href="agents.php" class="active">合作單位</a></li>
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

    <main id="main" class="main">
        <div class="container my-5">
        <h2><span style="color: #2F4F4F;">帳號資訊</span></h2>
        <?php if ($account_info):
                ob_start(); // 開始輸出緩衝
            ?>
                <div class="card p-4 shadow-sm" style="border: 3px solid #6495ED;">
                    <h2 class="mb-4">
                        <i class="bi bi-building"></i>
                        <strong>
                            <?= htmlspecialchars($source === 'organization' ? $account_info['o_name'] : $account_info['c_name']) ?>
                        </strong>
                    </h2>

                    <div class="mb-3">
                        <i class="bi bi-tags"></i>
                        <strong><?= $source === 'organization' ? '組織類型：' : '公司類型：' ?></strong>
                        <?= htmlspecialchars($source === 'organization' ? $account_info['o_type'] : $account_info['c_type']) ?>
                    </div>

                    <?php if ($source === 'corporation'): ?>
                        <div class="mb-3">
                            <i class="bi bi-diagram-3"></i>
                            <strong>產業類別：</strong>
                            <?= htmlspecialchars($account_info['c_industry']) ?>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-geo-alt"></i>
                            <strong>公司地址：</strong>
                            <?= htmlspecialchars($account_info['c_address']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <i class="bi bi-person"></i>
                        <strong>聯絡人姓名：</strong>
                        <?= htmlspecialchars($source === 'organization' ? $account_info['s_name'] : $account_info['e_name']) ?>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-briefcase"></i>
                        <strong>聯絡人職稱：</strong>
                        <?= htmlspecialchars($source === 'organization' ? $account_info['s_type'] : $account_info['e_type']) ?>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-envelope"></i>
                        <strong>聯絡人 Email：</strong>
                        <?= htmlspecialchars($source === 'organization' ? $account_info['s_email'] : $account_info['e_email']) ?>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-telephone"></i>
                        <strong>聯絡人電話：</strong>
                        <?= htmlspecialchars($source === 'organization' ? $account_info['s_phone'] : $account_info['e_phone']) ?>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-card-text"></i>
                        <strong><?= $source === 'organization' ? '組織簡介：' : '公司簡介：' ?></strong><br>
                        <div style="border: 1px solid #ccc; padding: 10px; margin-top: 5px; border-radius: 5px; background-color: #f9f9f9;">
                            <?= nl2br(htmlspecialchars($account_info['u_content'])) ?>
                        </div>
                    </div>
                    

                </div>
                <br>
                    <br>
                    
                    <?php
// 預設輸出容器
echo "<div class='container'><h3>合作評價紀錄</h3>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("連線失敗: " . $conn->connect_error);

if (isset($_GET['d_id'])) {
    $d_id = intval($_GET['d_id']);

    // 查詢目標 email
    $stmt = $conn->prepare("SELECT u_email FROM demanded WHERE d_id = ?");
    $stmt->bind_param("i", $d_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $email = ($row = $res->fetch_assoc()) ? $row['u_email'] : null;
    $stmt->close();

    if ($email) {
        $sql = "
            SELECT b_u_email AS other_email, b_feedback AS feedback, status, d_date AS cooperation_time
            FROM match_db
            WHERE status = 'completed' AND a_u_email = ? AND b_feedback <> 0
            UNION
            SELECT a_u_email AS other_email, a_feedback AS feedback, status, d_date AS cooperation_time
            FROM match_db
            WHERE status = 'completed' AND b_u_email = ? AND a_feedback <> 0
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $count = 0;
        $total = 0;

        while ($r = $result->fetch_assoc()) {
            $count++;
            $total += $r['feedback'];
            echo "<div class='dcard-post'>
                    <div class='dcard-body'>
                        <p><strong>合作夥伴：</strong> {$r['other_email']}</p>
                        <p><strong>合作時間：</strong> {$r['cooperation_time']}</p>
                        <p><strong>狀態：</strong> {$r['status']}</p>
                        <p><strong>評分：</strong> {$r['feedback']} ★</p>
                    </div>
                  </div>";
        }

        if ($count === 0) {
            echo "<div class='alert alert-secondary'>尚無收到評價紀錄。</div>";
        } else {
            $avg = round($total / $count, 2);
            echo "<div class='alert alert-info'>平均評分：<strong>{$avg}</strong> / 5，共 {$count} 筆</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-warning'>查無使用者 email。</div>";
    }
}

echo "</div>";
?>



            <?php
                ob_end_flush();
            else: ?>
                <div class="alert alert-warning">找不到該帳號資訊。</div>
            <?php endif; ?>
        </div>
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
                            <strong>Sunday:</strong> <span>Closed</span>
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
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

</body>

</html>