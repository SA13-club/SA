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
                  <li><a href="index.php"  >主頁</a></li>
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
                        <li class="current">發布募資</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>發布募資</h2>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12">
                    <form action="propertydb.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">
                            <!-- <p>一、需求標題</p>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" placeholder="請輸入簡要說明" required>
                            </div>

                            <p>二、需求詳細描述</p>
                            <div class="col-md-12">
                                <textarea class="form-control" name="content" rows="3" placeholder="請詳細說明需求和期望"
                                    required></textarea>
                            </div> -->
<?php
$u_permission=$_SESSION['u_permission'];

if($u_permission=='組織團體'){
echo'
                            <p>一、請選擇需求類型</p>
            <div class="col-md-6">
            <select class="form-select" id="demandtype" name="tag" required>
                <option selected disabled value="_">需求類型</option>
                <option value="spon">贊助</option>
                
            </select>
            </div>

<!-- 贊助細節區塊 -->
<div class="row gy-4">
  <div id="sponsorSection" style="display: none;">
    <p>二、贊助細節</p>
    
    <div class="row gy-3">
        <div class="col-md-4">
            <input type="text" class="form-control" name="eventname" placeholder="活動名稱" required>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="eventparticipate" placeholder="預計活動人數" required>
        </div>

    
    
    
      

    <div class="col-md-12">
                                <textarea class="form-control" name="target" rows="3" placeholder="活動描述"
                                    required></textarea>
    </div>

    <div class="col-md-4">
        <select class="form-select" id="sponsor_method" required>
          <option selected disabled value="_" >贊助方式</option>
          <option value="money">金錢</option>
          <option value="product">產品</option>
          
        </select>
    </div>
    <div id="sponsor_amount" style="display: none;">               
        <div class="col-md-4">
            <select class="form-select"   required>
            <option selected disabled value="_">贊助金額</option>
            <option value="10000">10000以內</option>
            <option value="20000">10000~20000</option>
            <option value="30000">20000~30000</option>
            <option value="40000">30000~40000</option>
            <option value="50000">40000~50000</option>
            <option value="other">金額詳談</option>
            </select>
        </div>
        <div class="col-md-6" id="money_options" >
        <label>金錢贊助曝光方式（可複選）</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="postbrand" value="海報商標" id="posterLogo">
            <label class="form-check-label" for="posterLogo">海報商標</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="postad" value="海報置入" id="posterInsert">
            <label class="form-check-label" for="posterInsert">海報置入</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="promotesignage" value="宣傳立牌" id="standee">
            <label class="form-check-label" for="standee">宣傳立牌</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="socialpromote" value="社群宣傳" id="social">
            <label class="form-check-label" for="social">社群宣傳</label>
        </div>
        </div>
    </div>

    <div id="productdona" style="display: none;">               
        <div class="col-md-6" id="product_options" >
        <label>商品贊助方式（可複選）</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="product[]" value="公關品發放" id="gift">
            <label class="form-check-label" for="gift">公關品發放</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="product[]" value="現場設攤位" id="booth">
            <label class="form-check-label" for="booth">現場設攤位</label>
        </div>
        </div>
    </div>




    </div>
  </div>
</div>
';}
elseif ($u_permission == '企業') {
    echo '
    <p>一、請選擇需求類型</p>
    <div class="col-md-6">
        <select class="form-select" id="demandtype2" name="tag" required>
            <option selected disabled value="_">需求類型</option>
            <option value="spon">贊助</option>
            <option value="合作">合作</option>
            <option value="招募">招募</option>
            <option value="實習">實習</option>
        </select>
    </div>

    <div class="row gy-4">
        <!-- 贊助細節區塊 -->
        <div id="sponsorSection2" style="display: none;">
            <p>二、贊助細節</p>
            <div class="row gy-3">
                <div class="col-md-4">
                    <select class="form-select" id="sponsor_method2" name="sponsor_method" required>
                        <option selected disabled value="_">贊助方式</option>
                        <option value="money">金錢</option>
                        <option value="product">產品</option>
                    </select>
                </div>

                <!-- 金錢贊助細節 -->
                <div id="sponsor_amount2" style="display: none;">
                    <div class="col-md-4">
                        <select class="form-select" id="sponsor_amount_select" name="sponsor_amount" required>
                            <option selected disabled value="_">贊助金額</option>
                            <option value="10000">10000以內</option>
                            <option value="20000">10000~20000</option>
                            <option value="30000">20000~30000</option>
                            <option value="40000">30000~40000</option>
                            <option value="50000">40000~50000</option>
                            <option value="other">金額詳談</option>
                        </select>
                    </div>
                    <div class="col-md-6" id="money_options2">
                        <label>需要社團宣傳手段</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="postbrand" value="海報商標" id="posterLogo">
                            <label class="form-check-label" for="posterLogo">海報商標</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="postad" value="海報置入" id="posterInsert">
                            <label class="form-check-label" for="posterInsert">海報置入</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="promotesignage" value="宣傳立牌" id="standee">
                            <label class="form-check-label" for="standee">宣傳立牌</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="socialpromote" value="社群宣傳" id="social">
                            <label class="form-check-label" for="social">社群宣傳</label>
                        </div>
                    </div>
                </div>

                <!-- 產品贊助細節 -->
                <div id="productdona2" style="display: none;">
                    <div class="col-md-6" id="product_options">
                        <label>需要社團宣傳手段</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="product[]" value="公關品發放" id="gift">
                            <label class="form-check-label" for="gift">公關品發放</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="product[]" value="現場設攤位" id="booth">
                            <label class="form-check-label" for="booth">現場設攤位</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 實習細節區塊 -->
        <div id="internsection" style="display: none;">
            <p>二、實習職缺資訊</p>
            <div class="row gy-3">
                <div class="col-md-4">
                    <label>職缺名稱</label>
                    <input type="text" class="form-control" name="recruit_title" placeholder="招募職缺名稱">
                </div>
                <div class="col-md-4">
                    <label>人數</label>
                    <input type="number" class="form-control" name="recruit_number" placeholder="招募人數">
                </div>
                <div class="col-md-4">
                    <label>地點</label>
                    <select id="city" class="form-select" name="recruit_city">
                        <option selected disabled value="">選擇縣市</option>
                        <option value="台北市">台北市</option>
                        <option value="新北市">新北市</option>
                        <option value="桃園市">桃園市</option>
                        <!-- (後續略) -->
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="district" class="form-select" name="recruit_district">
                        <option selected disabled value="">選擇行政區</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="recruit_detail" rows="3" placeholder="職缺說明與條件"></textarea>
                </div>

                <div class="col-md-6">
                    <label>應徵條件</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ex" value="具備相關經驗" id="experience">
                        <label class="form-check-label" for="experience">具備相關經驗</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="language" value="語言能力" id="language">
                        <label class="form-check-label" for="language">語言能力</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="subject" value="相關科系" id="subject">
                        <label class="form-check-label" for="subject">相關科系</label>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
?>



                            <p>三、負責人與聯絡資訊</p>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" placeholder="主要聯絡人姓名" required="">
                            </div>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" placeholder="聯絡人Email"
                                    required="">
                            </div>
                            <div class="col-md-5">
                                <input type="tel" class="form-control" name="phone" placeholder="聯絡人手機號碼" required="">
                            </div>
                            <p>四、需求截止日期</p>
                            <div class="col-md-5">
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit">發布需求</button>
                            </div>
                        </div>
                </div>
                </form>
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



                
    <script>
  const typeSelect = document.getElementById("demandtype");
  const sponsorSection = document.getElementById("sponsorSection");
  

  typeSelect.addEventListener("change", function () {
    const value = this.value;

    // 隱藏所有區塊
    sponsorSection.style.display = "none";
    

    // 顯示對應的區塊
    if (value === "spon") {
      sponsorSection.style.display = "block";
    } 
  });



  const sponsor_method = document.getElementById("sponsor_method");
  const sponsor_amount= document.getElementById("sponsor_amount");
  const productdona= document.getElementById("productdona");
  

    sponsor_method.addEventListener("change", function () {
    const value = this.value;

    // 隱藏所有區塊
    sponsor_amount.style.display = "none";
    productdona.style.display = "none";
    

    // 顯示對應的區塊
    if (value === "money") {
        sponsor_amount.style.display = "block";
    } else if(value=="product")
    {
        productdona.style.display = "block";
    }
  });


  







  
  const typeSelect2 = document.getElementById("demandtype2");
  const sponsorSection2 = document.getElementById("sponsorSection2");
  const internsection = document.getElementById("internsection");
  

  typeSelect2.addEventListener("change", function () {
    const value = this.value;

    // 隱藏所有區塊
    sponsorSection2.style.display = "none";
    internsection.style.display="none";
    // 顯示對應的區塊
    if (value === "spon") {
        sponsorSection2.style.display = "block";
    } 
    else if (value === "實習"){
        internsection.style.display="block";

    }
  });



  const sponsor_method2 = document.getElementById("sponsor_method2");
  const sponsor_amount2= document.getElementById("sponsor_amount2");
  const productdona2= document.getElementById("productdona2");
  

    sponsor_method2.addEventListener("change", function () {
    const value = this.value;

    // 隱藏所有區塊
    sponsor_amount2.style.display = "none";
    productdona2.style.display = "none";
    

    // 顯示對應的區塊
    if (value === "money") {
        sponsor_amount2.style.display = "block";
    } else if(value=="product")
    {
        productdona2.style.display = "block";
    }
  });
//行政區
                        const districtData = {
                            "台北市": ["中正區", "大同區", "中山區", "松山區", "大安區", "萬華區", "信義區", "士林區", "北投區", "內湖區", "南港區", "文山區"],
                            "新北市": ["板橋區", "新莊區", "中和區", "永和區", "土城區", "樹林區", "三重區", "新店區", "蘆洲區", "汐止區", "淡水區", "三峽區", "鶯歌區", "瑞芳區", "五股區", "泰山區", "林口區", "深坑區", "石碇區", "坪林區", "三芝區", "石門區", "八里區", "平溪區", "雙溪區", "貢寮區", "金山區", "萬里區", "烏來區"],
                            "桃園市": ["桃園區", "中壢區", "平鎮區", "八德區", "楊梅區", "蘆竹區", "大溪區", "龍潭區", "龜山區", "大園區", "觀音區", "新屋區", "復興區"],
                            "台中市": ["中區", "東區", "南區", "西區", "北區", "北屯區", "西屯區", "南屯區", "太平區", "大里區", "霧峰區", "烏日區", "豐原區", "后里區", "石岡區", "東勢區", "和平區", "新社區", "潭子區", "大雅區", "神岡區", "大肚區", "沙鹿區", "龍井區", "梧棲區", "清水區", "大甲區", "外埔區", "大安區"],
                            // 可以繼續補齊其他縣市喔
                        };

                        document.getElementById('city').addEventListener('change', function() {
                            const city = this.value;
                            const districtSelect = document.getElementById('district');
                            
                            // 清空原本的行政區選項
                            districtSelect.innerHTML = '<option selected disabled value="">選擇行政區</option>';
                            
                            if (districtData[city]) {
                                districtData[city].forEach(function(district) {
                                    const option = document.createElement('option');
                                    option.value = district;
                                    option.textContent = district;
                                    districtSelect.appendChild(option);
                                });
                            }
                        });
                        </script>









</body>

</html>