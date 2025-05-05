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
                        <li><a href="account.php">帳號管理</a></li>
                        <li class="current">修改文章</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'sa');
        mysqli_set_charset($link, "utf8mb4");

        $d_id = $_GET['id'];

        $sql = "
        SELECT *
        FROM demanded d
        LEFT JOIN club_coop cc ON d.d_id = cc.d_id
        LEFT JOIN corp_coop cp ON d.d_id = cp.d_id
        LEFT JOIN cor_intern ci ON d.d_id = ci.d_id
        LEFT JOIN cor_spons cs ON d.d_id = cs.d_id
        LEFT JOIN org_donate od ON d.d_id = od.d_id
        WHERE d.d_id = ?
        ";

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $d_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result); // $row 中就包含所有欄位
        ?>

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>修改文章</h2>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12">
                <?php var_dump($row); ?>
                    <form action="changepostdb.php?id=<?php echo $d_id; ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <?php
                            $u_permission = $_SESSION['u_permission'];

                            if ($u_permission == '組織團體') {
                                $money_exposure = isset($row['money_exposure']) ? explode(',', $row['money_exposure']) : [];
                                $product_exposure = isset($row['product_methods']) ? explode(',', $row['product_methods']) : [];
                                echo '
                            <p>一、請選擇需求類型</p>
                            <div class="col-md-6">
                                <select class="form-select" id="demandtype" name="tag" required>
                                    <option selected disabled value="_" ' . (($row['tag'] ?? '') === '_' ? ' selected' : '') . '>需求類型</option>
                                    <option value="spon" ' . (($row['tag'] ?? '') === 'spon' ? ' selected' : '') . '>贊助</option>
                                    <option value="合作" ' . (($row['tag'] ?? '') === '合作' ? ' selected' : '') . '>合作</option>
                                </select>
                            </div>
                            
                            <!-- 贊助細節區塊 -->
                            <div class="row gy-4">
                                <div id="sponsorSection" style="display: none;">
                                    <p>二、贊助細節</p>
                                    <div class="row gy-3">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="eventname" placeholder="活動名稱" value="' . htmlspecialchars($row['event_name'] ?? '') . '">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="eventparticipate" placeholder="預計活動人數" value="' . htmlspecialchars($row['event_participate'] ?? '') . '">
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="target" rows="3" placeholder="活動描述">' . htmlspecialchars($row['event_description'] ?? '') . '</textarea>
                                        </div>
                                    <div class="col-md-4">
                                        <select class="form-select" id="sponsor_method" name="sponsor_method">
                                        <option disabled value="_">贊助方式</option>
                                        <option value="money"' . (($row['sponsor_method'] ?? '') === 'money' ? ' selected' : '') . '>金錢</option>
                                        <option value="product"' . (($row['sponsor_method'] ?? '') === 'product' ? ' selected' : '') . '>產品</option>
                                        </select>
                                    </div>

                                    <div id="sponsor_amount" style="display: none;">
                                        <div class="col-md-4">
                                        <select class="form-select" name="sponsor_amount">
                                            <option disabled value="_">贊助金額</option>
                                            <option value="10000"' . (($row['sponsor_amount'] ?? '') === '10000' ? ' selected' : '') . '>10000以內</option>
                                            <option value="20000"' . (($row['sponsor_amount'] ?? '') === '20000' ? ' selected' : '') . '>10000~20000</option>
                                            <option value="30000"' . (($row['sponsor_amount'] ?? '') === '30000' ? ' selected' : '') . '>20000~30000</option>
                                            <option value="40000"' . (($row['sponsor_amount'] ?? '') === '40000' ? ' selected' : '') . '>30000~40000</option>
                                            <option value="50000"' . (($row['sponsor_amount'] ?? '') === '50000' ? ' selected' : '') . '>40000~50000</option>
                                            <option value="other"' . (($row['sponsor_amount'] ?? '') === 'other' ? ' selected' : '') . '>金額詳談</option>
                                        </select>
                                        </div>

                                        <div class="col-md-6" id="money_options">
                                            <label>金錢贊助曝光方式（可複選）</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="postbrand" value="海報商標" id="posterLogo"' .
                                                (in_array('海報商標', $money_exposure) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="posterLogo">海報商標</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="postad" value="海報置入" id="posterInsert"' .
                                                (in_array('海報置入', $money_exposure) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="posterInsert">海報置入</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="promotesignage" value="宣傳立牌" id="standee"' .
                                                (in_array('宣傳立牌', $money_exposure) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="standee">宣傳立牌</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="socialpromote" value="社群宣傳" id="social"' .
                                                (in_array('社群宣傳', $money_exposure) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="social">社群宣傳</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="productdona" style="display: none;">
                                        <div class="col-md-6" id="product_options">
                                            <label>商品贊助方式（可複選）</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="product[]" value="公關品發放" id="gift"' .
                                                (in_array('公關品發放', $product_methods) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="gift">公關品發放</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="product[]" value="現場設攤位" id="booth"' .
                                                (in_array('現場設攤位', $product_methods) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="booth">現場設攤位</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                              
                                <!-- 合作細節區塊 -->
                                <div id="cooperationSection" style="display: none;">
                                    <p>二、合作細節</p>
                                    <div class="row gy-3">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="coopname" placeholder="合作項目名稱" value="' . htmlspecialchars($row['coop_name'] ?? '') . '">
                                        </div>

                                        <div class="col-md-12">
                                            <textarea class="form-control" name="coopdesc" rows="3" placeholder="合作內容描述">' . htmlspecialchars($row['coop_desc'] ?? '') . '</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <select class="form-select" id="coop_type" name="coop_type">
                                                <option disabled value="_">合作類型</option>
                                                <option value="活動合辦"' . (($row['coop_type'] ?? '') === '活動合辦' ? ' selected' : '') . '>活動合辦</option>
                                                <option value="資源共享"' . (($row['coop_type'] ?? '') === '資源共享' ? ' selected' : '') . '>資源共享</option>
                                                <option value="長期合作"' . (($row['coop_type'] ?? '') === '長期合作' ? ' selected' : '') . '>長期合作</option>
                                                <option value="其他"' . (($row['coop_type'] ?? '') === '其他' ? ' selected' : '') . '>其他</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>合作預期效益（可複選）</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="benefit[]" value="提升知名度" id="awareness"' . 
                                                ((isset($row['benefit']) && strpos($row['benefit'], '提升知名度') !== false) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="awareness">提升知名度</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="benefit[]" value="增加資源" id="resources"' . 
                                                ((isset($row['benefit']) && strpos($row['benefit'], '增加資源') !== false) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="resources">增加資源</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="benefit[]" value="拓展關係網" id="network"' . 
                                                ((isset($row['benefit']) && strpos($row['benefit'], '拓展關係網') !== false) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="network">拓展關係網</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="benefit[]" value="技術交流" id="exchange"' . 
                                                ((isset($row['benefit']) && strpos($row['benefit'], '技術交流') !== false) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="exchange">技術交流</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label>合作時間</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="coopstart" placeholder="開始日期" value="' . htmlspecialchars($row['coop_start'] ?? '') . '">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="coopend" placeholder="結束日期" value="' . htmlspecialchars($row['coop_end'] ?? '') . '">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            } elseif ($u_permission == '企業') {
                                $money_exposure = isset($row['money_exposure']) ? explode(',', $row['money_exposure']) : [];
                                $product_methods = isset($row['product']) ? explode(',', $row['product']) : [];
                                $intern_req = isset($row['intern_requirement']) ? explode(',', $row['intern_requirement']) : [];
                                echo '
                                <p>一、請選擇需求類型</p>
                                <div class="col-md-6">
                                    <select class="form-select" id="demandtype2" name="tag" >
                                        <option selected disabled value="_" ' . (($row['tag'] ?? '') === '_' ? ' selected' : '') . '>需求類型</option>
                                        <option value="贊助" ' . (($row['tag'] ?? '') === '贊助' ? ' selected' : '') . '>贊助</option>
                                        <option value="合作" ' . (($row['tag'] ?? '') === '合作' ? ' selected' : '') . '>合作</option>
                                        <option value="招募" ' . (($row['tag'] ?? '') === '招募' ? ' selected' : '') . '>招募</option>
                                        <option value="實習" ' . (($row['tag'] ?? '') === '實習' ? ' selected' : '') . '>實習</option>
                                    </select>
                                </div>

                                <div class="row gy-4">
                                    <!-- 贊助細節區塊 -->
                                    <div id="sponsorSection2" style="display: none;">
                                        <p>二、贊助細節</p>
                                        <div class="row gy-3">
                                            <div class="col-md-4">
                                                <select class="form-select" id="sponsor_method2" name="sponsor_method" >
                                                    <option selected disabled value="_" ' . (($row['sponsor_method'] ?? '') === '_' ? ' selected' : '') . '>贊助方式</option>
                                                    <option value="money" ' . (($row['sponsor_method'] ?? '') === 'money' ? ' selected' : '') . '>金錢</option>
                                                    <option value="product" ' . (($row['sponsor_method'] ?? '') === 'product' ? ' selected' : '') . '>產品</option>
                                                </select>
                                            </div>

                                            <!-- 金錢贊助細節 -->
                                            <div id="sponsor_amount2" style="display: none;">
                                                <div class="col-md-4">
                                                    <select class="form-select" id="sponsor_amount_select" name="sponsor_amount" >
                                                        <option value="10000"' . (($row['sponsor_amount'] ?? '') === '10000' ? ' selected' : '') . '>10000以內</option>
                                                        <option value="20000"' . (($row['sponsor_amount'] ?? '') === '20000' ? ' selected' : '') . '>10000~20000</option>
                                                        <option value="30000"' . (($row['sponsor_amount'] ?? '') === '30000' ? ' selected' : '') . '>20000~30000</option>
                                                        <option value="40000"' . (($row['sponsor_amount'] ?? '') === '40000' ? ' selected' : '') . '>30000~40000</option>
                                                        <option value="50000"' . (($row['sponsor_amount'] ?? '') === '50000' ? ' selected' : '') . '>40000~50000</option>
                                                        <option value="other"' . (($row['sponsor_amount'] ?? '') === 'other' ? ' selected' : '') . '>金額詳談</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="money_options2">
                                                    <label>需要社團宣傳手段</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="postbrand" value="海報商標" id="posterLogo"'
                                                        . (in_array('海報商標', $money_exposure) ? ' checked' : '') . '>
                                                        <label class="form-check-label" for="posterLogo">海報商標</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="postad" value="海報置入" id="posterInsert"'
                                                        . (in_array('海報置入', $money_exposure) ? ' checked' : '') . '>
                                                        <label class="form-check-label" for="posterInsert">海報置入</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="promotesignage" value="宣傳立牌" id="standee"'
                                                        . (in_array('宣傳立牌', $money_exposure) ? ' checked' : '') . '>
                                                        <label class="form-check-label" for="standee">宣傳立牌</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="socialpromote" value="社群宣傳" id="social"'
                                                        . (in_array('社群宣傳', $money_exposure) ? ' checked' : '') . '>
                                                        <label class="form-check-label" for="social">社群宣傳</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 產品贊助細節 -->
                                            <div id="productdona2" style="display: none;">
                                                <div class="col-md-6" id="product_options">
                                                    <label>需要社團宣傳手段</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="product[]" value="公關品發放" id="gift"' .
                                                        (in_array('公關品發放', $product_methods) ? ' checked' : '') . '>
                                                        <label class="form-check-label" for="gift">公關品發放</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="product[]" value="現場設攤位" id="booth"' .
                                                        (in_array('現場設攤位', $product_methods) ? ' checked' : '') . '>
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
                                            <input type="text" class="form-control" name="intern_title" placeholder="招募職缺名稱"
                                                    value="' . htmlspecialchars($row['intern_title'] ?? '') . '">
                                            </div>
                                            <div class="col-md-4">
                                            <label>人數</label>
                                            <input type="number" class="form-control" name="intern_number" placeholder="招募人數"
                                                    value="' . htmlspecialchars($row['intern_number'] ?? '') . '">
                                            </div>
                                            <div class="col-md-4">
                                            <label>薪資</label>
                                            <input type="text" class="form-control" name="intern_salary" placeholder="薪資"
                                                    value="' . htmlspecialchars($row['intern_salary'] ?? '') . '">
                                            </div>
                                            <div class="col-md-4">
                                            <label>地點</label>
                                            <select id="city" class="form-select" name="intern_city">
                                                <option disabled value="">選擇縣市</option>
                                                <option value="台北市"' . (($row['intern_city'] ?? '') === '台北市' ? ' selected' : '') . '>台北市</option>
                                                <option value="新北市"' . (($row['intern_city'] ?? '') === '新北市' ? ' selected' : '') . '>新北市</option>
                                                <option value="桃園市"' . (($row['intern_city'] ?? '') === '桃園市' ? ' selected' : '') . '>桃園市</option>
                                            </select>
                                            </div>
                                            <div class="col-md-4">
                                            <label></label>
                                            <select id="district" class="form-select" name="intern_district">
                                                <option selected value="' . htmlspecialchars($row['intern_district'] ?? '') . '">' . htmlspecialchars($row['intern_district'] ?? '選擇行政區') . '</option>
                                            </select>
                                            </div>
                                            <div class="col-md-4">
                                            <label>上班時段</label>
                                            <input type="text" class="form-control" name="intern_worktime" placeholder="上班時段"
                                                    value="' . htmlspecialchars($row['intern_worktime'] ?? '') . '">
                                            </div>
                                            <div class="col-md-4">
                                            <label>工作技能</label>
                                            <input type="text" class="form-control" name="intern_skill" placeholder="工作技能"
                                                    value="' . htmlspecialchars($row['intern_skill'] ?? '') . '">
                                            </div>
                                            <div class="col-md-12">
                                            <textarea class="form-control" name="intern_detail" rows="3" placeholder="職缺說明與條件">'
                                            . htmlspecialchars($row['intern_detail'] ?? '') . '</textarea>
                                            </div>

                                            <div class="col-md-6">
                                            <label>應徵條件</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intern_requirement[]" value="具備相關經驗" id="experience"'
                                                . (in_array('具備相關經驗', $intern_req) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="experience">具備相關經驗</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intern_requirement[]" value="語言能力" id="language"'
                                                . (in_array('語言能力', $intern_req) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="language">語言能力</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intern_requirement[]" value="相關科系" id="subject"'
                                                . (in_array('相關科系', $intern_req) ? ' checked' : '') . '>
                                                <label class="form-check-label" for="subject">相關科系</label>
                                            </div>
                                            </div>
                                        </div>
                                </div>';
                            }
                            ?>



                            <p>三、負責人與聯絡資訊</p>

                            <div class="col-md-5">
                            <input type="text" class="form-control" name="c_name" placeholder="主要聯絡人姓名" required value="<?php echo htmlspecialchars($row['c_name'] ?? ''); ?>">
                            </div>

                            <div class="col-md-5">
                            <input type="email" class="form-control" name="c_email" placeholder="聯絡人Email" required value="<?php echo htmlspecialchars($row['c_email'] ?? ''); ?>">
                            </div>

                            <div class="col-md-5">
                            <input type="tel" class="form-control" name="c_phone" placeholder="聯絡人手機號碼" required value="<?php echo htmlspecialchars($row['c_phone'] ?? ''); ?>">
                            </div>

                            <p>四、需求截止日期</p>
                            <div class="col-md-5">
                            <input type="date" name="deadline" class="form-control" value="<?php echo htmlspecialchars($row['deadline'] ?? ''); ?>">
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
    document.addEventListener("DOMContentLoaded", function () {
    // ====== 區塊選擇邏輯（組織） ======
    const demandType = document.getElementById("demandtype");
    const sponsorSection = document.getElementById("sponsorSection");
    const coopSection = document.getElementById("cooperationSection");
    const sponsorMethod = document.getElementById("sponsor_method");
    const sponsorAmount = document.getElementById("sponsor_amount");
    const productDona = document.getElementById("productdona");

    function toggleOrgSections(type) {
        sponsorSection.style.display = "none";
        coopSection.style.display = "none";
        if (type === "spon") sponsorSection.style.display = "block";
        if (type === "合作") coopSection.style.display = "block";
    }

    function toggleSponsorDetails(method) {
        sponsorAmount.style.display = "none";
        productDona.style.display = "none";
        if (method === "money") sponsorAmount.style.display = "block";
        if (method === "product") productDona.style.display = "block";
    }

    if (demandType) {
        toggleOrgSections(demandType.value);
        demandType.addEventListener("change", function () {
            toggleOrgSections(this.value);
        });
    }

    if (sponsorMethod) {
        toggleSponsorDetails(sponsorMethod.value);
        sponsorMethod.addEventListener("change", function () {
            toggleSponsorDetails(this.value);
        });
    }

    // ====== 區塊選擇邏輯（企業） ======
    const demandType2 = document.getElementById("demandtype2");
    const sponsorSection2 = document.getElementById("sponsorSection2");
    const internSection = document.getElementById("internsection");
    const sponsorMethod2 = document.getElementById("sponsor_method2");
    const sponsorAmount2 = document.getElementById("sponsor_amount2");
    const productDona2 = document.getElementById("productdona2");

    function toggleCorpSections(type) {
        sponsorSection2.style.display = "none";
        internSection.style.display = "none";
        if (type === "贊助") sponsorSection2.style.display = "block";
        if (type === "實習") internSection.style.display = "block";
    }

    function toggleSponsorDetails2(method) {
        sponsorAmount2.style.display = "none";
        productDona2.style.display = "none";
        if (method === "money") sponsorAmount2.style.display = "block";
        if (method === "product") productDona2.style.display = "block";
    }

    if (demandType2) {
        toggleCorpSections(demandType2.value);
        demandType2.addEventListener("change", function () {
            toggleCorpSections(this.value);
        });
    }

    if (sponsorMethod2) {
        toggleSponsorDetails2(sponsorMethod2.value);
        sponsorMethod2.addEventListener("change", function () {
            toggleSponsorDetails2(this.value);
        });
    }

    // ====== 行政區邏輯 ======
    const districtData = {
        "台北市": ["中正區", "大同區", "中山區", "松山區", "大安區", "萬華區", "信義區", "士林區", "北投區", "內湖區", "南港區", "文山區"],
        "新北市": ["板橋區", "新莊區", "中和區", "永和區", "土城區", "樹林區", "三重區", "新店區", "蘆洲區", "汐止區", "淡水區", "三峽區", "鶯歌區", "瑞芳區", "五股區", "泰山區", "林口區", "深坑區", "石碇區", "坪林區", "三芝區", "石門區", "八里區", "平溪區", "雙溪區", "貢寮區", "金山區", "萬里區", "烏來區"],
        "桃園市": ["桃園區", "中壢區", "平鎮區", "八德區", "楊梅區", "蘆竹區", "大溪區", "龍潭區", "龜山區", "大園區", "觀音區", "新屋區", "復興區"]
        // 可擴充其他縣市
    };

    const citySelect = document.getElementById("city");
    const districtSelect = document.getElementById("district");

    if (citySelect && districtSelect) {
        citySelect.addEventListener("change", function () {
            const city = this.value;
            districtSelect.innerHTML = '<option selected disabled value="">選擇行政區</option>';
            if (districtData[city]) {
                districtData[city].forEach(function (district) {
                    const option = document.createElement("option");
                    option.value = district;
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            }
        });

        // 若預設 city 已有值，觸發更新區域選單
        if (citySelect.value) {
            const event = new Event("change");
            citySelect.dispatchEvent(event);
        }
    }
});
    </script>










</body>

</html>