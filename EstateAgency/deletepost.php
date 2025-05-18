<meta http-equiv="refresh" content="3; url=account.php">

<?php
$d_id = $_GET['id'];
$link = mysqli_connect('localhost', 'root', '', 'sa');
mysqli_set_charset($link, "utf8mb4");

// 先查出tag
$sql = "SELECT tag FROM demanded WHERE d_id='$d_id'";
$result = mysqli_query($link, $sql);

// 檢查有沒有查到
if ($result && $row = mysqli_fetch_assoc($result)) {
    $tagx = $row['tag']; // 正確取得tag值

    // 根據tag決定要刪哪一張表
    switch ($tagx) {
        case '合作':
            $table = 'org_coop';
            break;
        case 'spon':
            $table = 'org_donate';
            break;
        case '招募':
            $table = 'cor_intern';
            break;
        case '贊助':
            $table = 'cor_spons';
            break;
        default:
            die('<h1 align="center">錯誤：未知的標籤類型！</h1>');
    }

    // 先刪子表
    $del1 = "DELETE FROM $table WHERE d_id='$d_id'";
    if (mysqli_query($link, $del1)) {
        // 再刪demanded主表
        $del2 = "DELETE FROM demanded WHERE d_id='$d_id'";
        if (mysqli_query($link, $del2)) {
            echo "<h1 align='center'>刪除完成！</h1>";
        } else {
            echo "<h1 align='center'>刪除 demanded 失敗：" . mysqli_error($link) . "</h1>";
        }
    } else {
        echo "<h1 align='center'>刪除 $table 失敗：" . mysqli_error($link) . "</h1>";
    }

} else {
    echo "<h1 align='center'>找不到這筆需求資料！</h1>";
}
?>
