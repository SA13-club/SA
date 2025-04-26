<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url=newdona.php">
    <title>CoLaB</title>
</head>

<body>
    <?php
    session_start(); // 記得要有 session_start() 才能讀 $_SESSION
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

    // 接收資料
    $u_permission = $_SESSION['u_permission'];
    $tag = $_POST['tag'];
    $event_name = $_POST['eventname'];
    $event_participate = intval($_POST['eventparticipate']);
    $event_description = $_POST['target'];
    $sponsor_method = $_POST['sponsor_method'];
    $sponsor_amount = isset($_POST['sponsor_amount']) ? $_POST['sponsor_amount'] : NULL;

    // 處理金錢贊助曝光方式
    $money_exposure = [];
    if (isset($_POST['postbrand'])) $money_exposure[] = '海報商標';
    if (isset($_POST['postad'])) $money_exposure[] = '海報置入';
    if (isset($_POST['promotesignage'])) $money_exposure[] = '宣傳立牌';
    if (isset($_POST['socialpromote'])) $money_exposure[] = '社群宣傳';
    $money_exposure_json = !empty($money_exposure) ? json_encode($money_exposure, JSON_UNESCAPED_UNICODE) : NULL;

    // 處理商品贊助方式
    $product_methods_json = isset($_POST['product']) ? json_encode($_POST['product'], JSON_UNESCAPED_UNICODE) : NULL;

    // 把可能是 NULL 的值包好
    $sponsor_amount_sql = ($sponsor_amount !== NULL) ? "'$sponsor_amount'" : "NULL";
    $money_exposure_sql = ($money_exposure_json !== NULL) ? "'$money_exposure_json'" : "NULL";
    $product_methods_sql = ($product_methods_json !== NULL) ? "'$product_methods_json'" : "NULL";

    // 1. 先插入 demanded
    $sql1 = "INSERT INTO demanded (u_permission) VALUES ('$u_permission')";
    if (mysqli_query($conn, $sql1)) {
        // 抓 demanded 的 d_id
        $d_id = mysqli_insert_id($conn);

        // 2. 再插入 org_donate，帶入 d_id
        $sql2 = "INSERT INTO org_donate 
        (d_id, event_name, event_participate, event_description, sponsor_method, sponsor_amount, money_exposure, product_methods) 
        VALUES 
        ('$d_id', '$event_name', '$event_participate', '$event_description', '$sponsor_method', $sponsor_amount_sql, $money_exposure_sql, $product_methods_sql)";

        if (mysqli_query($conn, $sql2)) {
            echo "<h1 align='center'>新增完成</h1>";
        } else {
            die("插入 org_donate 失敗: " . mysqli_error($conn));
        }
    } else {
        die("插入 demanded 失敗: " . mysqli_error($conn));
    }

    $conn->close();
    ?>
</body>

</html>
