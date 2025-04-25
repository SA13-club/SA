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
                        <li>帳號資料管理</li>
                        <li>文章管理</li>
                        <li class="current">修改文章</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>修改文章</h2>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12">
                    <form action="propertydb.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <p>需求標題</p>
                                <input type="text" class="form-control" name="d_title" placeholder="請輸入簡要說明" required>
                            </div>

                            <div class="col-md-12">
                                <p>需求詳細描述</p>
                                <textarea class="form-control" name="d_content" rows="3" placeholder="請詳細說明需求和期望" required></textarea>
                            </div>

                            <div class="col-md-6">
                                <p>需求類型</p>
                                <select class="form-select" id="validationCustom04" name="d_tag" required>
                                    <option selected disabled value="_">請選擇需求類型</option>
                                    <option value="贊助">贊助</option>
                                    <option value="合作">合作</option>
                                    <option value="招募">招募</option>
                                    <option value="實習">實習</option>
                                </select>
                            </div>

                            <!-- 動態欄位插入位置 -->
                            <div class="col-md-12" id="extra-fields"></div>

                            <div class="col-md-12">
                                <p>預期目標</p>
                                <textarea class="form-control" name="d_target" rows="3" placeholder="請描述您希望通過此需求達成的具體目標" required=""></textarea>
                            </div>

                            <div class="col-md-12">
                                <p>負責人與聯絡資訊</p>
                                <input type="text" class="form-control" name="d_name" placeholder="主要聯絡人姓名" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="d_email" placeholder="聯絡人Email" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="d_phone" placeholder="聯絡人手機號碼" required="">
                            </div>


                            <div class="col-md-6">
                                <p>需求截止日期</p>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit">發布修改</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        const typeSelect = document.getElementById("validationCustom04");
                        const extraFields = document.getElementById("extra-fields");

                        typeSelect.addEventListener("change", function() {
                            const selected = this.value;
                            extraFields.innerHTML = ""; // 清空之前欄位

                            if (selected === "贊助") {
                                extraFields.innerHTML = `
                                <div class="row gy-4">
                                <div class="col-md-7">
                                    <p>贊助相關資訊</p>
                                    <select class="form-select" id="sponsorTypeSelect" name="donate_type" required>
                                    <option selected disabled value="_">請選擇贊助方式</option>
                                    <option value="金錢">金錢</option>
                                    <option value="物資">物資</option>
                                    <option value="服務">服務</option>
                                    <option value="其他">其他</option>
                                    </select>
                                </div>
                                <div class="col-md-7" id="sponsorSpecificInput"></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="donate_exposure" placeholder="預期品牌曝光方式" required>
                                </div>
                                </div>
                            `;

                                const sponsorTypeSelect = document.getElementById("sponsorTypeSelect");
                                const sponsorSpecificInput = document.getElementById("sponsorSpecificInput");

                                sponsorTypeSelect.addEventListener("change", function() {
                                    const type = this.value;
                                    if (type === "金錢") {
                                        sponsorSpecificInput.innerHTML = `<input type="text" class="form-control" name="donate_money" placeholder="請輸入贊助金額" required>`;
                                    } else if (type === "物資") {
                                        sponsorSpecificInput.innerHTML = `<input type="text" class="form-control" name="donate_product" placeholder="請輸入物資內容" required>`;
                                    } else if (type === "服務") {
                                        sponsorSpecificInput.innerHTML = `<input type="text" class="form-control" name="donate_service" placeholder="請輸入服務內容" required>`;
                                    } else {
                                        sponsorSpecificInput.innerHTML = `<input type="text" class="form-control" name="donate_other" placeholder="請輸入贊助內容" required>`;
                                    }
                                });
                            } else if (selected === "合作") {
                                extraFields.innerHTML = `
                                <div class="row gy-4">
                                <div class="col-md-6">
                                <p>合作詳情</p>
                                <input type="text" class="form-control" name="collab_type" placeholder="合作形式（如講座、場地、物資）" required>
                                </div>
                                <div class="col-md-12">
                                <input type="text" class="form-control" name="collab_detail" placeholder="合作條件或限制（如需審核、參與人數）" required>
                                </div>
                                </div>
                            `;
                            } else if (selected === "招募") {
                                extraFields.innerHTML = `
                                <div class="row gy-4">
                                <div class="col-md-8">
                                <p>招募職缺資訊</p>
                                <input type="text" class="form-control" name="recruit_title" placeholder="招募職缺名稱" required>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name="recruit_address" placeholder="工作地點" required>
                                </div>
                                <div class="col-md-12">
                                <textarea class="form-control" name="recruit_detail" rows="3" placeholder="職缺說明與條件" required></textarea>
                                </div>
                                </div>
                            `;
                            } else if (selected === "實習") {
                                extraFields.innerHTML = `
                                <div class="row gy-4">
                                <div class="col-md-7">
                                <p>實習資訊</p>
                                <input type="text" class="form-control" name="intern_name" placeholder="實習職位名稱" required>
                                </div>
                                <div class="col-md-7">
                                <input type="text" class="form-control" name="intern_money" placeholder="提供薪資金額(若無請填0)" required>
                                </div>
                                <div class="col-md-6">
                                <p>實習開始時間</p>
                                <input type="date" class="form-control" name="intern_begin" placeholder="實習開始時間" required>
                                </div>
                                <div class="col-md-6">
                                <p>實習結束時間</p>
                                <input type="date" class="form-control" name="intern_end" placeholder="實習結束時間" required>
                                </div>
                                </div>
                            `;
                            }
                        });
                    </script>

                </div>
            </div>

        </section><!-- /Starter Section Section -->

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
            <p>© <span>Copyright</span> <strong class="px-1 sitename">EstateAgency</strong> <span>All Rights
                    Reserved</span></p>
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
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>