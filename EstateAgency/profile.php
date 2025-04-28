<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 資料庫連接
$servername = "localhost"; // 你的資料庫位置
$username = "root";         // 你的資料庫使用者名稱
$password = "";             // 你的資料庫密碼
$dbname = "sa"; // 你的資料庫名稱

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 預設要查詢的 email
$target_email = 'b0967153520@gmail.com';

// 查詢資料
$sql = "SELECT u_email, o_name, o_type, s_name, s_type, s_email, s_phone, u_content FROM Organization_Registrations WHERE u_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $target_email);
$stmt->execute();
$result = $stmt->get_result();

$account_info = null;
if ($result->num_rows > 0) {
    $account_info = $result->fetch_assoc();
}

$stmt->close();
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

<body class="starter-page-page" style="padding-top: 100px;">
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
                <li><a href="agents.php">合作單位</a></li>
                <li><a href="contact.php">聯絡我們</a></li>
            </ul>
        </nav>
    </div>
</header>

<main id="main" class="main">

    <div class="container my-5">
    <h2 class="mb-4">
    <?php echo htmlspecialchars($account_info['u_email']); ?>&nbsp;&nbsp;&nbsp;
    <span style="color: #2F4F4F;">帳號資訊</span></h2>
        <?php if ($account_info): ?>
            <div class="card p-4 shadow-sm" style="border: 3px solid #66CDAA;">
                <div class="mb-3"><strong>組織名稱：</strong> <?php echo htmlspecialchars($account_info['o_name']); ?></div>
                <div class="mb-3"><strong>組織類型：</strong> <?php echo htmlspecialchars($account_info['o_type']); ?></div>
                <div class="mb-3"><strong>聯絡人姓名：</strong> <?php echo htmlspecialchars($account_info['s_name']); ?></div>
                <div class="mb-3"><strong>職稱：</strong> <?php echo htmlspecialchars($account_info['s_type']); ?></div>
                <div class="mb-3"><strong>聯絡人 Email：</strong> <?php echo htmlspecialchars($account_info['s_email']); ?></div>
                <div class="mb-3"><strong>聯絡人電話：</strong> <?php echo htmlspecialchars($account_info['s_phone']); ?></div>
                <div class="mb-3"><strong>組織簡介：</strong><br>
                    <div style="border: 1px solid #ccc; padding: 10px; margin-top: 5px; border-radius: 5px; background-color: #f9f9f9;">
                        <?php echo nl2br(htmlspecialchars($account_info['u_content'])); ?>
                    </div>
        </div>            
    </div>
        <?php else: ?>
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
