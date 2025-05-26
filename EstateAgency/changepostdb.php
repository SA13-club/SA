<meta http-equiv="refresh" content="3; url=newdona.php">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

$u_permission = $_SESSION['u_permission'];
$u_email = $_SESSION['u_email'];
$tag = $_POST['tag'];
$c_email = $_POST['c_email'];
$c_phone = $_POST['c_phone'];
$c_name = $_POST['c_name'];
$deadline = $_POST['deadline'];
$d_id = $_GET['id'];

// 2. 根據 u_permission 來區分
if ($u_permission == '組織團體') {
    if ($tag === 'spon') {
        // 更新捐贈資料 org_donate
        $event_name = $_POST['eventname'];
        $event_participate = intval($_POST['eventparticipate']);
        $event_description = $_POST['target'];
        $sponsor_method = $_POST['sponsor_method'];
        $sponsor_amount = isset($_POST['sponsor_amount']) ? $_POST['sponsor_amount'] : NULL;

        $money_exposure = [];
        if (isset($_POST['postbrand'])) $money_exposure[] = '海報商標';
        if (isset($_POST['postad'])) $money_exposure[] = '海報置入';
        if (isset($_POST['promotesignage'])) $money_exposure[] = '宣傳立牌';
        if (isset($_POST['socialpromote'])) $money_exposure[] = '社群宣傳';
        $money_exposure_json = !empty($money_exposure) ? json_encode($money_exposure, JSON_UNESCAPED_UNICODE) : NULL;
        $product_methods_json = isset($_POST['product']) ? json_encode($_POST['product'], JSON_UNESCAPED_UNICODE) : NULL;

        $sql2 = "UPDATE org_donate SET 
            event_name='$event_name',
            event_participate='$event_participate',
            event_description='$event_description',
            sponsor_method='$sponsor_method',
            sponsor_amount=" . ($sponsor_amount !== NULL ? "'$sponsor_amount'" : "NULL") . ",
            money_exposure=" . ($money_exposure_json !== NULL ? "'$money_exposure_json'" : "NULL") . ",
            product_methods=" . ($product_methods_json !== NULL ? "'$product_methods_json'" : "NULL") . ",
            c_email='$c_email',
            c_phone='$c_phone',
            c_name='$c_name',
            deadline='$deadline'
            WHERE d_id='$d_id'";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>捐贈資料更新完成！</h1>";
        } else {
            die("更新 org_donate 失敗: " . mysqli_error($conn));
        }
    } elseif ($tag === '合作') {
        // 更新合作資料 org_coop
        $coop_name = $_POST['coopname'] ?? NULL;
        $coop_description = $_POST['coopdesc'] ?? NULL;
        $coop_type = $_POST['coop_type'] ?? NULL;
        $coop_start = $_POST['coopstart'] ?? NULL;
        $coop_end = $_POST['coopend'] ?? NULL;
        $coop_benefit = isset($_POST['benefit']) ? json_encode($_POST['benefit'], JSON_UNESCAPED_UNICODE) : NULL;

        $sql2 = "UPDATE org_coop SET 
            coop_name=" . ($coop_name !== NULL ? "'$coop_name'" : "NULL") . ",
            coop_description=" . ($coop_description !== NULL ? "'$coop_description'" : "NULL") . ",
            coop_type=" . ($coop_type !== NULL ? "'$coop_type'" : "NULL") . ",
            coop_benefit=" . ($coop_benefit !== NULL ? "'$coop_benefit'" : "NULL") . ",
            coop_start=" . ($coop_start !== NULL ? "'$coop_start'" : "NULL") . ",
            coop_end=" . ($coop_end !== NULL ? "'$coop_end'" : "NULL") . ",
            c_email='$c_email',
            c_phone='$c_phone',
            c_name='$c_name',
            deadline='$deadline'
            WHERE d_id='$d_id'";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>合作資料更新完成！</h1>";
        } else {
            die("更新 org_coop 失敗: " . mysqli_error($conn));
        }
    } else {
        echo "<h1 align='center'>未知的提交類型</h1>";
    }
} elseif ($u_permission == '企業') {
    if ($tag === '贊助') {
        // 更新企業贊助 cor_spons
        $sponsor_method = $_POST['sponsor_method'];
        $sponsor_amount = isset($_POST['sponsor_amount']) ? $_POST['sponsor_amount'] : NULL;
        $money_exposure = [];
        if (isset($_POST['postbrand'])) $money_exposure[] = '海報商標';
        if (isset($_POST['postad'])) $money_exposure[] = '海報置入';
        if (isset($_POST['promotesignage'])) $money_exposure[] = '宣傳立牌';
        if (isset($_POST['socialpromote'])) $money_exposure[] = '社群宣傳';
        $money_exposure_json = !empty($money_exposure) ? json_encode($money_exposure, JSON_UNESCAPED_UNICODE) : NULL;
        $product_methods_json = isset($_POST['product']) ? json_encode($_POST['product'], JSON_UNESCAPED_UNICODE) : NULL;

        $sql2 = "UPDATE cor_spons SET 
            sponsor_method='$sponsor_method',
            sponsor_amount=" . ($sponsor_amount !== NULL ? "'$sponsor_amount'" : "NULL") . ",
            money_exposure=" . ($money_exposure_json !== NULL ? "'$money_exposure_json'" : "NULL") . ",
            product_methods=" . ($product_methods_json !== NULL ? "'$product_methods_json'" : "NULL") . ",
            c_email='$c_email',
            c_phone='$c_phone',
            c_name='$c_name',
            deadline='$deadline'
            WHERE d_id='$d_id'";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>企業贊助資料更新完成！</h1>";
        } else {
            die("更新 cor_spons 失敗: " . mysqli_error($conn));
        }
    } elseif ($tag == '實習') {
        // 更新企業實習 cor_intern
        $intern_title = $_POST['recruit_title'];
        $intern_number = intval($_POST['recruit_number']);
        $salary = $_POST['salary'];
        $intern_city = $_POST['recruit_city'];
        $intern_district = $_POST['recruit_district'];
        $worktime = $_POST['worktime'];
        $jobskill = $_POST['jobskill'];
        $intern_detail = $_POST['recruit_detail'];

        $experience = isset($_POST['ex']) ? '具備相關經驗' : NULL;
        $language = isset($_POST['language']) ? '語言能力' : NULL;
        $subject = isset($_POST['subject']) ? '相關科系' : NULL;

        $requirements = array_filter([$experience, $language, $subject]);
        $requirements_json = !empty($requirements) ? json_encode($requirements, JSON_UNESCAPED_UNICODE) : NULL;

        $sql2 = "UPDATE cor_intern SET 
            intern_title='$intern_title',
            intern_number='$intern_number',
            salary='$salary',
            intern_city='$intern_city',
            intern_district='$intern_district',
            worktime='$worktime',
            jobskill='$jobskill',
            intern_detail='$intern_detail',
            requirements=" . ($requirements_json !== NULL ? "'$requirements_json'" : "NULL") . ",
            c_email='$c_email',
            c_phone='$c_phone',
            c_name='$c_name',
            deadline='$deadline'
            WHERE d_id='$d_id'";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>企業實習資料更新完成！</h1>";
        } else {
            die("更新 cor_intern 失敗: " . mysqli_error($conn));
        }
    }
} elseif ($tag === '合作') {
    // $coop_name = isset($_POST['coopname']) ? $_POST['coopname'] : NULL;
    // $coop_description = isset($_POST['coopdesc']) ? $_POST['coopdesc'] : NULL;
    // $coop_type = isset($_POST['coop_type']) ? $_POST['coop_type'] : NULL;
    // $coop_start = isset($_POST['coopstart']) ? $_POST['coopstart'] : NULL;
    // $coop_end = isset($_POST['coopend']) ? $_POST['coopend'] : NULL;

    // $coop_benefit = isset($_POST['benefit']) ? json_encode($_POST['benefit'], JSON_UNESCAPED_UNICODE) : NULL;

    // $coop_name_sql = ($coop_name !== NULL) ? "'$coop_name'" : "NULL";
    // $coop_description_sql = ($coop_description !== NULL) ? "'$coop_description'" : "NULL";
    // $coop_type_sql = ($coop_type !== NULL) ? "'$coop_type'" : "NULL";
    // $coop_benefit_sql = ($coop_benefit !== NULL) ? "'$coop_benefit'" : "NULL";
    // $coop_start_sql = ($coop_start !== NULL) ? "'$coop_start'" : "NULL";
    // $coop_end_sql = ($coop_end !== NULL) ? "'$coop_end'" : "NULL";

    // $sql2 = "UPDATE cor_coop
    //     SET
    //     coop_name = $coop_name_sql,
    //     coop_description = $coop_description_sql,
    //     coop_type = $coop_type_sql,
    //     coop_benefit = $coop_benefit_sql,
    //     coop_start = $coop_start_sql,
    //     coop_end = $coop_end_sql,
    //     c_email='$c_email',
    //     c_phone='$c_phone',
    //     c_name='$c_name',
    //     deadline='$deadline'
    //     WHERE d_id = '$d_id'";

    // if (mysqli_query($conn, $sql2)) {
    //     echo "<h1 align='center'>企業合作資料更新完成！</h1>";
    // } else {
    //     die("更新 org_coop 失敗: " . mysqli_error($conn));
    // }
} elseif ($tag === '招募') {
    // 處理企業招募 org_recruitment
    // $recruit_title = $_POST['recruit_title'];
    // $recruit_number = intval($_POST['recruit_number']);
    // $salary = $_POST['salary'];
    // $recruit_city = $_POST['recruit_city'];
    // $recruit_district = $_POST['recruit_district'];
    // $worktime = $_POST['worktime'];
    // $jobskill = $_POST['jobskill'];
    // $recruit_detail = $_POST['recruit_detail'];

    // $experience = isset($_POST['ex']) ? '具備相關經驗' : NULL;
    // $language = isset($_POST['language']) ? '語言能力' : NULL;
    // $subject = isset($_POST['subject']) ? '相關科系' : NULL;

    // $requirements = array_filter([$experience, $language, $subject]);
    // $requirements_json = !empty($requirements) ? json_encode($requirements, JSON_UNESCAPED_UNICODE) : NULL;
    // $requirements_sql = ($requirements_json !== NULL) ? "'$requirements_json'" : "NULL";

    // $sql2 = "UPDATE cor_recruitment 
    // SET
    // recruit_title = '$recruit_title',
    // recruit_number = '$recruit_number',
    // salary = '$salary',
    // recruit_city = '$recruit_city',
    // recruit_district = '$recruit_district',
    // worktime = '$worktime',
    // jobskill = '$jobskill',
    // recruit_detail = '$recruit_detail',
    // requirements = $requirements_sql,
    // c_email='$c_email',
    // c_phone='$c_phone',
    // c_name='$c_name',
    // deadline='$deadline'
    // WHERE d_id = '$d_id'";

    // if (mysqli_query($conn, $sql2)) {
    //     echo "<h1 align='center'>企業招募資料更新完成！</h1>";
    // } else {
    //     die("更新 org_recruitment 失敗: " . mysqli_error($conn));
    // }
} else {
    echo "<h1 align='center'>未知的提交類型</h1>";
}


// 3. 統一關閉連線
$conn->close();
?>