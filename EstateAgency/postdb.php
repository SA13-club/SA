<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url=newdona.php">
    <title>CoLaB - 新增資料</title>
</head>

<body>
<?php
session_start(); // 開啟 session
// 資料庫連線設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 接收共同的表單資料
$u_permission = $_SESSION['u_permission'];
$tag = $_POST['tag']; // 用來判斷是 donate 還是 cooperation

// 1. 先插入 demanded
$sql1 = "INSERT INTO demanded (u_permission) VALUES ('$u_permission')";
if (mysqli_query($conn, $sql1)) {
    $d_id = mysqli_insert_id($conn); // 抓 demanded 的 d_id

    // 2. 根據 tag 判斷要插哪一張表
    if ($tag === 'donate') {
        // 這是捐贈資料
        $event_name = $_POST['eventname'];
        $event_participate = intval($_POST['eventparticipate']);
        $event_description = $_POST['target'];
        $sponsor_method = $_POST['sponsor_method'];
        $sponsor_amount = isset($_POST['sponsor_amount']) ? $_POST['sponsor_amount'] : NULL;

        // 金錢贊助曝光方式
        $money_exposure = [];
        if (isset($_POST['postbrand'])) $money_exposure[] = '海報商標';
        if (isset($_POST['postad'])) $money_exposure[] = '海報置入';
        if (isset($_POST['promotesignage'])) $money_exposure[] = '宣傳立牌';
        if (isset($_POST['socialpromote'])) $money_exposure[] = '社群宣傳';
        $money_exposure_json = !empty($money_exposure) ? json_encode($money_exposure, JSON_UNESCAPED_UNICODE) : NULL;

        // 商品贊助方式
        $product_methods_json = isset($_POST['product']) ? json_encode($_POST['product'], JSON_UNESCAPED_UNICODE) : NULL;

        // 包成 SQL 安全的字串
        $sponsor_amount_sql = ($sponsor_amount !== NULL) ? "'$sponsor_amount'" : "NULL";
        $money_exposure_sql = ($money_exposure_json !== NULL) ? "'$money_exposure_json'" : "NULL";
        $product_methods_sql = ($product_methods_json !== NULL) ? "'$product_methods_json'" : "NULL";

        // 插入 org_donate
        $sql2 = "INSERT INTO org_donate 
        (d_id, event_name, event_participate, event_description, sponsor_method, sponsor_amount, money_exposure, product_methods)
        VALUES 
        ('$d_id', '$event_name', '$event_participate', '$event_description', '$sponsor_method', $sponsor_amount_sql, $money_exposure_sql, $product_methods_sql)";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>捐贈資料新增完成！</h1>";
        } else {
            die("插入 org_donate 失敗: " . mysqli_error($conn));
        }

    } elseif ($tag === '合作') {
        // 這是合作資料
        $coop_name = isset($_POST['coopname']) ? $_POST['coopname'] : NULL;
        $coop_description = isset($_POST['coopdesc']) ? $_POST['coopdesc'] : NULL;
        $coop_type = isset($_POST['coop_type']) ? $_POST['coop_type'] : NULL;
        $coop_start = isset($_POST['coopstart']) ? $_POST['coopstart'] : NULL;
        $coop_end = isset($_POST['coopend']) ? $_POST['coopend'] : NULL;

        $coop_benefit = isset($_POST['benefit']) ? json_encode($_POST['benefit'], JSON_UNESCAPED_UNICODE) : NULL;

        // 包成 SQL 安全的字串
        $coop_name_sql = ($coop_name !== NULL) ? "'$coop_name'" : "NULL";
        $coop_description_sql = ($coop_description !== NULL) ? "'$coop_description'" : "NULL";
        $coop_type_sql = ($coop_type !== NULL) ? "'$coop_type'" : "NULL";
        $coop_benefit_sql = ($coop_benefit !== NULL) ? "'$coop_benefit'" : "NULL";
        $coop_start_sql = ($coop_start !== NULL) ? "'$coop_start'" : "NULL";
        $coop_end_sql = ($coop_end !== NULL) ? "'$coop_end'" : "NULL";

        // 插入 org_cooperation
        $sql2 = "INSERT INTO org_coop
        (d_id, coop_name, coop_description, coop_type, coop_benefit, coop_start, coop_end)
        VALUES 
        ('$d_id', $coop_name_sql, $coop_description_sql, $coop_type_sql, $coop_benefit_sql, $coop_start_sql, $coop_end_sql)";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>合作資料新增完成！</h1>";
        } else {
            die("插入 org_cooperation 失敗: " . mysqli_error($conn));
        }

    } else {
        echo "<h1 align='center'>未知的提交類型</h1>";
    }

} else {
    die("插入 demanded 失敗: " . mysqli_error($conn));
}

$conn->close();
?>
</body>

</html>
