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
          <li><a href="index.php">主頁</a></li>
          <li><a href="about.php">操作指南</a></li>
          <li><a href="propertiesdemo.php">專案總覽</a></li>
          <li><a href="contact.php">聯絡我們</a></li>
          <?php
          if ($_SESSION['u_email']) {
            echo "<li><a href='Logout.php'>登出</a></li>";
            echo "<li><a href='account.php'>帳號中心</a></li>";
          } else {
            echo "<li><a href='LogIn.html' class='active'>登入</a></li>";
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
                <h1 class="sitename" style="font-size: 1.8rem;">Co<span style="color: #2eca6a;">LaB</span></h1>
              </div>

              <!-- 使用較大字體和適當間距 -->
              <h2 class="text-center mb-4">忘記密碼</h2>
              <!-- 添加簡短說明文字 -->
              <p class="text-center text-muted mb-4">請輸入您的會員電子郵件，我們將發送驗證碼協助您重設密碼</p>

              <form id="emailForm">
                <div class="mb-3">
                  <label for="email" class="form-label">電子郵件</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-success w-100">發送驗證碼</button>
              </form>

              <!-- 驗證碼輸入區塊（預設隱藏） -->
              <form id="codeForm" class="mt-4" style="display: none;">
                <div class="mb-3">
                  <label for="code" class="form-label">輸入驗證碼</label>
                  <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <button type="submit" class="btn btn-success w-100">確認驗證碼</button>
                <div class="text-center mt-2">
                  <button type="button" class="btn btn-link" id="resendCodeBtn">重新發送驗證碼</button>
                </div>
              </form>


              <div class="text-center mt-3">
                <a href="LogIn.html" class="btn btn-link">返回登入頁</a>
              </div>
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<script>
  const emailForm = document.getElementById("emailForm");
  const codeForm = document.getElementById("codeForm");
  const resendCodeBtn = document.getElementById("resendCodeBtn");
  let currentEmail = ""; // ✅ 用變數記住 email，供後續驗證使用

  // 發送驗證碼（第一次）
  emailForm.addEventListener("submit", async function(e) {
    e.preventDefault();
    const email = document.getElementById("email").value;
    currentEmail = email;

    try {
      const res = await fetch("send_verification_code.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${encodeURIComponent(email)}`
      });

      const data = await res.json();
      console.log("伺服器回應：", data);

      if (res.ok && data.status === "success") {
        emailForm.style.display = "none";
        codeForm.style.display = "block";
      } else {
        alert("發送失敗：\n" + data.message);
      }
    } catch (err) {
      console.error("錯誤：", err);
      alert("伺服器錯誤，請稍後再試");
    }
  });

  // 重新發送驗證碼
  resendCodeBtn.addEventListener("click", async function() {
    if (!currentEmail) {
      alert("找不到 email，請重新操作");
      return;
    }

    try {
      const res = await fetch("send_verification_code.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${encodeURIComponent(currentEmail)}`
      });

      const data = await res.json();
      console.log("重新發送回應：", data);

      if (res.ok && data.status === "success") {
        alert("已重新發送驗證碼到 " + currentEmail);
      } else {
        alert("發送失敗：\n" + data.message);
      }
    } catch (err) {
      console.error("錯誤：", err);
      alert("伺服器錯誤，請稍後再試");
    }
  });
  let codeFormSubmitted = false;

  // 驗證碼送出
  codeForm.addEventListener("submit", async function(e) {
    e.preventDefault();
    console.log("✅ codeForm 被提交");

    if (codeFormSubmitted) {
      console.warn("⚠️ 已提交過 codeForm，取消重複提交");
      return;
    }
    codeFormSubmitted = true;
    const code = document.getElementById("code").value;

    if (!currentEmail || !code) {
      alert("請填寫完整資訊");
      return;
    }

    console.log("驗證傳出 email =", currentEmail, "code =", code);

    try {
      const res = await fetch("verify_code.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${encodeURIComponent(currentEmail)}&code=${encodeURIComponent(code)}`
      });

      const data = await res.json();

      if (res.ok && data.status === "success") {
        alert("驗證成功，請繼續後續操作");
        window.location.href = "reset_password.php"; // 你可以在這裡轉跳
      } else {
        alert("驗證失敗：" + data.message);
      }
    } catch (err) {
      console.error("錯誤：", err);
      alert("伺服器錯誤，請稍後再試");
    }
  });
</script>



</html>