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

<body class="starter-page-page">

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
        <!-- 添加足夠的上方間距，確保內容不被固定導航欄遮擋 -->
        <section class="forgot-password-section py-5" style="margin-top: 100px;">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow-lg rounded-4 p-4">
                            <!-- 添加網站標誌或圖標 -->
                            <div class="text-center mb-3">
                                <h1 class="sitename" style="font-size: 1.8rem;">Co<span style="color: #4CAF50;">LaB</span></h1>
                            </div>

                            <!-- 使用較大字體和適當間距 -->
                            <h2 class="text-center mb-4">忘記密碼</h2>
                            <!-- 添加簡短說明文字 -->

                            <form id="resetForm">
                                <div class="mb-3">
                                    <label for="password" class="form-label">請輸入密碼</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">重設密碼</button>
                            </form>
                        </div>
                    </div>
                </div>
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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");
            const passwordInput = document.getElementById("password");

            form.addEventListener("submit", async function(e) {
                e.preventDefault(); // ✅ 阻止預設送出

                const password = passwordInput.value.trim();
                if (!password) {
                    alert("請輸入新密碼");
                    return;
                }

                try {
                    const res = await fetch("resetdb.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `password=${encodeURIComponent(password)}`
                    });

                    const data = await res.json();

                    if (data.status === "success") {
                        alert(data.message);
                        window.location.href = "LogIn.html";
                    } else {
                        alert("❌ " + data.message);
                    }
                } catch (err) {
                    console.error("錯誤：", err);
                    showMessage("伺服器錯誤，請稍後再試", "danger");
                }
            });

        });
    </script>

    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>