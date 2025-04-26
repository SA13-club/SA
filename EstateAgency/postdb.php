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
    // 資料庫連線設定
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sa";
    $u_permission=$_SESSION['u_permission'];
    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql2 = "INSERT INTO demanded (u_permission) values('$u_permission')";
    mysqli_query($conn, $sql2);
    // 檢查連線
    if ($conn->connect_error) {
        die("連線失敗: " . $conn->connect_error);
    }

    // 接收 POST 資料
    $event_name = $_POST['eventname'];
    $event_participate = intval($_POST['eventparticipate']);
    $event_description = $_POST['target'];
    $sponsor_method = $_POST['sponsor_method'];

    // sponsor_amount 可能是空的
    $sponsor_amount = isset($_POST['sponsor_amount']) ? $_POST['sponsor_amount'] : NULL;

    // 金錢贊助曝光方式（多選）
    $money_exposure = [];
    if (isset($_POST['postbrand'])) $money_exposure[] = '海報商標';
    if (isset($_POST['postad'])) $money_exposure[] = '海報置入';
    if (isset($_POST['promotesignage'])) $money_exposure[] = '宣傳立牌';
    if (isset($_POST['socialpromote'])) $money_exposure[] = '社群宣傳';
    $money_exposure_json = !empty($money_exposure) ? json_encode($money_exposure, JSON_UNESCAPED_UNICODE) : NULL;

    // 商品贊助方式（多選）
    $product_methods_json = isset($_POST['product']) ? json_encode($_POST['product'], JSON_UNESCAPED_UNICODE) : NULL;

    // SQL 寫入
    $sql = "INSERT INTO org_donate 
(d_id, event_name, event_participate, event_description, sponsor_method, sponsor_amount, money_exposure, product_methods) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssssss", $d_id,$event_name, $event_participate, $event_description, $sponsor_method, $sponsor_amount, $money_exposure_json, $product_methods_json);

    if ($stmt->execute()) {
        echo "資料新增成功！";
    } else {
        echo "錯誤: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    ?>

</body>

</html>