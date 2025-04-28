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
        }

        .dcard-header {
            display: flex;
            gap: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .dcard-body {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }

        .dcard-footer {
            font-size: 0.85rem;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
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
                        <li><a href="account.php">帳號資料管理</a></li>
                        <li class="current">文章管理</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section contact section">

            <div class="container section-title" data-aos="fade-up">
                <h2>管理文章</h2>
            </div><!-- End Section Title -->

            <!-- Section Title -->
            <div class="container">
                <?php
                $link = mysqli_connect('localhost', 'root', '', 'sa');
                mysqli_set_charset($link, "utf8mb4");

                
                $u_email = $_SESSION['u_email'];

                // 查 demanded 基本資料
                $sql = "SELECT * FROM demanded WHERE u_email='$u_email'";
                $result = mysqli_query($link, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $d_id = $row['d_id'];
                    $tag = $row['tag'];
                    $u_permission = $row['u_permission'];

                    $detail = "";

                    // 先判斷 u_permission，再判斷 tag，決定要 JOIN 哪一張表
                    if ($u_permission == '組織團體') {
                        if ($tag == 'spon') {
                            $detail_sql = "SELECT * FROM org_donate WHERE d_id='$d_id'";
                        } elseif ($tag == '合作') {
                            $detail_sql = "SELECT * FROM org_coop WHERE d_id='$d_id'";
                        } else {
                            $detail_sql = null;
                        }
                    } elseif ($u_permission == '企業') {
                        if ($tag == '贊助') {
                            $detail_sql = "SELECT * FROM cor_spons WHERE d_id='$d_id'";
                        } elseif ($tag == '合作') {
                            $detail_sql = "SELECT * FROM cor_coop WHERE d_id='$d_id'";
                        } elseif ($tag == '招募') {
                            $detail_sql = "SELECT * FROM cor_recruit WHERE d_id='$d_id'";
                        } elseif ($tag == '實習') {
                            $detail_sql = "SELECT * FROM cor_intern WHERE d_id='$d_id'";
                        } else {
                            $detail_sql = null;
                        }
                    } else {
                        $detail_sql = null;
                    }

                    if ($detail_sql) {
                        $detail_result = mysqli_query($link, $detail_sql);
                        if ($detail_row = mysqli_fetch_assoc($detail_result)) {
                            // 顯示細節內容
                            if ($tag == 'spon') {
                                $detail = "
                    <p>活動名稱：{$detail_row['event_name']}</p>
                    <p>預計人數：{$detail_row['event_participate']}</p>
                    <p>活動描述：{$detail_row['event_description']}</p>
                    <p>贊助方式：{$detail_row['sponsor_method']}</p>
                ";
                            } elseif ($tag == '合作') {
                                $detail = "
                    <p>合作名稱：{$detail_row['coop_name']}</p>
                    <p>合作描述：{$detail_row['coop_description']}</p>
                    <p>合作類型：{$detail_row['coop_type']}</p>
                ";
                            } elseif ($tag == '贊助') {
                                $detail = "
                    <p>贊助方式：{$detail_row['sponsor_method']}</p>
                    <p>贊助金額：{$detail_row['sponsor_amount']}</p>
                ";
                            } elseif ($tag == '招募') {
                                $detail = "
                    <p>職缺名稱：{$detail_row['recruit_title']}</p>
                    <p>招募人數：{$detail_row['recruit_number']}</p>
                    <p>薪資待遇：{$detail_row['salary']}</p>
                ";
                            } elseif ($tag == '實習') {
                                $detail = "
                    <p>實習職缺：{$detail_row['intern_title']}</p>
                    <p>實習人數：{$detail_row['intern_number']}</p>
                    <p>薪資待遇：{$detail_row['salary']}</p>
                ";
                            }
                        }
                    }

                    // 顯示主表 + 細節
                    echo "
    <div class='dcard-post'>
        <div class='dcard-header'>
            <span class='text-success'>#{$row['tag']}</span>
        </div>
        <div class='dcard-body'>
            {$detail}
        </div>
        <div class='dcard-footer'>
            <div>
                <span>聯絡人：{$detail_row['c_name']}</span>
                <span> | 電話：{$detail_row['c_phone']}</span>
                <span> | Email：{$detail_row['c_email']}</span>
            </div>
            <div>
                <a href='editpost.php?id={$row['d_id']}' class='btn btn-sm btn-success me-2' style='background-color: #28c76f; border-color: #28c76f;'>
                    <i class='bi bi-pencil'></i> 修改
                </a>
                <a href='deletepost.php?id={$row['d_id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"確定要刪除這篇文章嗎？\")'>
                    <i class='bi bi-trash'></i> 刪除
                </a>
            </div>
        </div>
    </div>";
                }

                mysqli_close($link);
                ?>

            </div>

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