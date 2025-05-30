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
$u_email=$_SESSION['u_email'];
$tag = $_POST['tag'];
$c_email = $_POST['c_email'];
$c_phone = $_POST['c_phone'];
$c_name = $_POST['c_name'];
$deadline = $_POST['deadline'];






// 1. 先插入 demanded
$sql1 = "INSERT INTO demanded (u_email,u_permission,tag) VALUES ('$u_email','$u_permission','$tag')";
if (!mysqli_query($conn, $sql1)) {
    die("插入 demanded 失敗: " . mysqli_error($conn));
}
$d_id = mysqli_insert_id($conn); // 取得 d_id

// 2. 根據 u_permission 來區分
if ($u_permission == '組織團體') {
    if ($tag === 'spon') {
        // 處理捐贈
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

        $sponsor_amount_sql = ($sponsor_amount !== NULL) ? "'$sponsor_amount'" : "NULL";
        $money_exposure_sql = ($money_exposure_json !== NULL) ? "'$money_exposure_json'" : "NULL";
        $product_methods_sql = ($product_methods_json !== NULL) ? "'$product_methods_json'" : "NULL";

        $sql2 = "INSERT INTO org_donate 
        (d_id, event_name, event_participate, event_description, sponsor_method, sponsor_amount, money_exposure, product_methods,c_email,c_phone,c_name,deadline)
        VALUES 
        ('$d_id', '$event_name', '$event_participate', '$event_description', '$sponsor_method', $sponsor_amount_sql, $money_exposure_sql, $product_methods_sql,'$c_email','$c_phone','$c_name','$deadline')";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>捐贈資料新增完成！</h1>";
        } else {
            die("插入 org_donate 失敗: " . mysqli_error($conn));
        }
    } 
            elseif ($tag === '合作') {
                // 1. 先抓出 coop_target（group 或 company）
                $coop_target = $_POST['coop_target'] ?? '';
        
                // 如果是「社團」合作
                if ($coop_target === 'group') {
                    // 基本欄位
                    $coop_type     = $_POST['coop_type']    ?? '';
                    $coop_name     = $_POST['coop_name']     ?? '';
                    $coop_desc     = $_POST['coop_desc']     ?? '';
                    $city  = $_POST['city'] ?? '';
                    $district = $_POST['district'] ?? '';
                    // 前端 textarea name="未設定"，這裡要對應一下，如果你改了 name，這裡也要同步：
                    $address = $_POST['address']     ?? '';
        
                    // 多選「合作預期效益」
                    $benefits = $_POST['benefit'] ?? [];
                    $benefits_json = !empty($benefits)
                        ? "'" . json_encode($benefits, JSON_UNESCAPED_UNICODE) . "'"
                        : "NULL";
        
                    // 合作期間
                    $coop_start = $_POST['coop_start'] ?? '';
                    $coop_end   = $_POST['coop_end']   ?? '';
                    
                    // 組 SQL（請改用 Prepared Statement 會更安全，以下範例簡化版）
                    $sql = "
                        INSERT INTO club_coop
                        (d_id, coop_type, coop_name, coop_desc, benefit, city, district, address, coop_start, coop_end, c_email, c_phone, c_name, deadline)
                        VALUES
                        (
                          '$d_id',
                          '$coop_type',
                          '$coop_name',
                          '$coop_desc',
                          $benefits_json,
                          '$city',
                          '$district',
                          '$address',
                          '$coop_start',
                          '$coop_end',
                          '$c_email',
                          '$c_phone',
                          '$c_name',
                          '$deadline'
                        )
                    ";
        
                    if (mysqli_query($conn, $sql)) {
                        echo "<h1 align='center'>社團合作資料新增完成！</h1>";
                    } else {
                        die("插入 cor_intern 失敗: " . mysqli_error($conn));
                    }
        
                }
                // 如果是「企業」合作
                elseif ($coop_target === 'company') {
                    // 基本欄位
                    $coop_type = $_POST['coop_type'] ?? '';
                    $coop_name = $_POST['coop_name']   ?? '';
                    $coop_desc = $_POST['coop_desc']   ?? '';
        
                    // 多選「合作預期效益」
                    $benefits = $_POST['benefit'] ?? [];
                    $benefits_json = !empty($benefits)
                        ? "'" . json_encode($benefits, JSON_UNESCAPED_UNICODE) . "'"
                        : "NULL";
        
                    // 合作期間
                    $coop_start = $_POST['coop_start'] ?? '';
                    $coop_end   = $_POST['coop_end']   ?? '';
        
                    // 組 SQL
                    $sql = "
                        INSERT INTO corp_coop
                        (d_id, coop_type, coop_name, coop_desc, benefit, coop_start, coop_end, c_email, c_phone, c_name, deadline)
                        VALUES
                        (
                          '$d_id',
                          '$coop_type',
                          '$coop_name',
                          '$coop_desc',
                          $benefits_json,
                          '$coop_start',
                          '$coop_end',
                          '$c_email',
                          '$c_phone',
                          '$c_name',
                          '$deadline'
                        )
                    ";
        
                    if (mysqli_query($conn, $sql)) {
                        echo "<h1 align='center'>企業合作資料新增完成！</h1>";
                    } else {
                        die("插入 org_coop 失敗: " . mysqli_error($conn));
                    }
                }
                // 其他 coop_target
                else {
                    die('未選擇合作對象');
                }
            }
            else {
                echo "<h1 align='center'>未知的提交類型</h1>";
            }
        }
        
        
        
     elseif ($u_permission == '企業') {
    // 處理企業四種：spon / 合作 / 招募 / 實習
    if ($tag === '贊助') {
        // 處理企業贊助 org_sponsorship
        $sponsor_method = $_POST['sponsor_method'];
        $sponsor_amount = isset($_POST['sponsor_amount']) ? $_POST['sponsor_amount'] : NULL;
        $title=$_POST['title'];
        $content=$_POST['content'];
        $money_exposure = [];
        if (isset($_POST['postbrand'])) $money_exposure[] = '海報商標';
        if (isset($_POST['postad'])) $money_exposure[] = '海報置入';
        if (isset($_POST['promotesignage'])) $money_exposure[] = '宣傳立牌';
        if (isset($_POST['socialpromote'])) $money_exposure[] = '社群宣傳';
        $money_exposure_json = !empty($money_exposure) ? json_encode($money_exposure, JSON_UNESCAPED_UNICODE) : NULL;
        $product_methods_json = isset($_POST['product']) ? json_encode($_POST['product'], JSON_UNESCAPED_UNICODE) : NULL;

        $sponsor_amount_sql = ($sponsor_amount !== NULL) ? "'$sponsor_amount'" : "NULL";
        $money_exposure_sql = ($money_exposure_json !== NULL) ? "'$money_exposure_json'" : "NULL";
        $product_methods_sql = ($product_methods_json !== NULL) ? "'$product_methods_json'" : "NULL";

        $sql2 = "INSERT INTO cor_spons 
        (d_id, sponsor_method, sponsor_amount, money_exposure, product_methods,c_email,c_phone,c_name,deadline,title,content)
        VALUES 
        ('$d_id', '$sponsor_method', $sponsor_amount_sql, $money_exposure_sql, $product_methods_sql,'$c_email','$c_phone','$c_name','$deadline','$title','$content')";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>企業贊助資料新增完成！</h1>";
        } else {
            die("插入 org_sponsorship 失敗: " . mysqli_error($conn));
        }
    } elseif ($tag === '合作') {
        // 處理企業合作 org_coop（跟組織團體合作共用）
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

        // $sql2 = "INSERT INTO org_coop
        // (d_id, coop_name, coop_description, coop_type, coop_benefit, coop_start, coop_end)
        // VALUES 
        // ('$d_id', $coop_name_sql, $coop_description_sql, $coop_type_sql, $coop_benefit_sql, $coop_start_sql, $coop_end_sql)";

        // if (mysqli_query($conn, $sql2)) {
        //     echo "<h1 align='center'>企業合作資料新增完成！</h1>";
        // } else {
        //     die("插入 org_coop 失敗: " . mysqli_error($conn));
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

        // $sql2 = "INSERT INTO org_recruitment 
        // (d_id, recruit_title, recruit_number, salary, recruit_city, recruit_district, worktime, jobskill, recruit_detail, requirements)
        // VALUES 
        // ('$d_id', '$recruit_title', '$recruit_number', '$salary', '$recruit_city', '$recruit_district', '$worktime', '$jobskill', '$recruit_detail', $requirements_sql)";

        // if (mysqli_query($conn, $sql2)) {
        //     echo "<h1 align='center'>企業招募資料新增完成！</h1>";
        // } else {
        //     die("插入 org_recruitment 失敗: " . mysqli_error($conn));
        // }
    } elseif ($tag === '實習') {
        // 處理企業實習 org_internship
        $intern_title = $_POST['intern_title']; // 注意，表單欄位一樣
        $intern_number = intval($_POST['intern_number']);
        $salary = $_POST['salary'];
        $intern_city = $_POST['intern_city'];
        $intern_district = $_POST['intern_district'];
        $worktime = $_POST['worktime'];
        $jobskill = $_POST['jobskill'];
        $intern_detail = $_POST['intern_detail'];

        $experience = isset($_POST['ex']) ? '具備相關經驗' : NULL;
        $language = isset($_POST['language']) ? '語言能力' : NULL;
        $subject = isset($_POST['subject']) ? '相關科系' : NULL;

        $requirements = array_filter([$experience, $language, $subject]);
        $requirements_json = !empty($requirements) ? json_encode($requirements, JSON_UNESCAPED_UNICODE) : NULL;
        $requirements_sql = ($requirements_json !== NULL) ? "'$requirements_json'" : "NULL";

        $sql2 = "INSERT INTO cor_intern
        (d_id, intern_title, intern_number, salary, intern_city, intern_district, worktime, jobskill, intern_detail, requirements,c_email,c_phone,c_name,deadline)
        VALUES 
        ('$d_id', '$intern_title', '$intern_number', '$salary', '$intern_city', '$intern_district', '$worktime', '$jobskill', '$intern_detail',$requirements_sql,'$c_email','$c_phone','$c_name','$deadline')";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>企業實習資料新增完成！</h1>";
        } else {
            die("插入 org_internship 失敗: " . mysqli_error($conn));
        }
    } else {
        echo "<h1 align='center'>未知的提交類型</h1>";
    }
}


// 3. 最後統一關閉連線
$conn->close();
