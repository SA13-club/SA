<?php


// 資料庫連線資訊
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 初始化
$account_info = null;
$source = null;
$email = null;

// 取得參數
$d_id = isset($_GET['d_id']) ? intval($_GET['d_id']) : 0;
$user_email = isset($_GET['user_email']) ? trim($_GET['user_email']) : '';

// 依優先順序取得 email
if ($d_id > 0) {
    // 用 d_id 查 demanded 找 email
    $stmt = $conn->prepare("SELECT u_email FROM demanded WHERE d_id = ?");
    $stmt->bind_param("i", $d_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $email = $row['u_email'];
    }
    $stmt->close();
} elseif (!empty($user_email)) {
    $email = $user_email;
}

// 若有 email，查找帳號資訊（organization 或 corporation）
if ($email) {
    // 先查 organization_registrations
    $stmt = $conn->prepare("SELECT * FROM organization_registrations WHERE u_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $org_result = $stmt->get_result();

    if ($account_info = $org_result->fetch_assoc()) {
        $source = 'organization';
    } else {
        // 再查 corporation_registrations
        $stmt = $conn->prepare("SELECT * FROM corporation_registrations WHERE u_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $corp_result = $stmt->get_result();

        if ($account_info = $corp_result->fetch_assoc()) {
            $source = 'corporation';
        }
    }
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>CoLaB</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
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

        .filter-bar.py-3.border-bottom.bg-light {
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
    </style>
</head>

<body class="starter-page-page" style="
      padding-top: 100px;
      background-image: url('./assets/img/bg2.png');
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

    <main id="main" class="main">
        <div class="container my-5">
            <h2><span style="color: #2F4F4F;">帳號資訊</span></h2>

            <?php if ($account_info): ?>
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
                        <strong><?= $source === 'organization' ? '組織簡介：' : '公司簡介：' ?></strong><br />
                        <div style="border: 1px solid #ccc; padding: 10px; margin-top: 5px; border-radius: 5px; background-color: #f9f9f9;">
                            <?= nl2br(htmlspecialchars($account_info['u_content'] ?? '無簡介資料')) ?>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button class="btn" style="background-color:rgb(184, 0, 0); color: white;"
                            onclick="reportProject('<?= htmlspecialchars($email) ?>')">
                            檢舉此帳號
                        </button>

                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">查無該帳號資料，請確認網址參數。</div>
            <?php endif; ?>
        </div>


        <div class="container my-5">
            <h3><span style="color: #2F4F4F;">合作評價紀錄</span></h3>

            <?php
            if (!$email) {
                echo "<div class='alert alert-danger'>缺少有效的查詢參數 (d_id 或 user_email)</div>";
            } else {
                // 查詢評價
                $sql = "
                    SELECT b_u_email AS other_email, b_feedback AS feedback, status, d_date AS cooperation_time
                    FROM match_db
                    WHERE status = 'completed' AND a_u_email = ? AND b_feedback <> 0
                    UNION
                    SELECT a_u_email AS other_email, a_feedback AS feedback, status, d_date AS cooperation_time
                    FROM match_db
                    WHERE status = 'completed' AND b_u_email = ? AND a_feedback <> 0
                    ORDER BY cooperation_time DESC
                ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $email, $email);
                $stmt->execute();
                $result = $stmt->get_result();

                $count = 0;
                $total = 0;
                while ($row = $result->fetch_assoc()) {
                    $count++;
                    $total += $row['feedback'];

                    echo '<div class="dcard-post">';
                    echo '<div class="dcard-body">';
                    echo '<p><strong>合作夥伴：</strong> ' . htmlspecialchars($row['other_email']) . '</p>';
                    echo '<p><strong>合作時間：</strong> ' . htmlspecialchars($row['cooperation_time']) . '</p>';
                    echo '<p><strong>狀態：</strong> ' . htmlspecialchars($row['status']) . '</p>';
                    echo '<p><strong>評分：</strong> ' . htmlspecialchars($row['feedback']) . ' ★</p>';
                    echo '</div>';
                    echo '</div>';
                }

                if ($count === 0) {
                    echo '<div class="alert alert-secondary">尚無收到評價紀錄。</div>';
                } else {
                    $avg = round($total / $count, 2);
                    echo '<div class="alert alert-info">平均評分：<strong>' . $avg . '</strong> / 5，共 ' . $count . ' 筆</div>';
                }

                $stmt->close();
            }

            $conn->close();
            ?>
        </div>
    </main>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function reportProject(u_email) {
            if (!confirm('確定要檢舉此帳號？')) return;

            fetch('reportdba.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'u_email=' + encodeURIComponent(u_email)
                })
                .then(response => response.text())
                .then(result => {
                    if (result.trim() === 'success') {
                        alert('✅ 檢舉成功！');
                    } else {
                        alert('❌ 檢舉失敗，請稍後再試');
                    }
                })
                .catch(error => {
                    console.error('檢舉失敗:', error);
                    alert('❌ 檢舉過程發生錯誤');
                });
        }
    </script>
</body>

</html>