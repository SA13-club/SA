<?php
$servername = "localhost";
$username = "root";
$password = ""; // 預設空白
$dbname = "sa"; // 你的資料庫名稱（看你的 phpMyAdmin 左邊應該是 `sa` 或 `estateagency`）

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
} // 請依你實際資料庫連線路徑修改

$loginEmail = $_SESSION['u_email'];
$d_id = $_POST['d_id'] ?? null;
$rating = $_POST['rating'] ?? null;

if (!$d_id || !$rating || !$loginEmail) {
    http_response_code(400);
    echo "參數錯誤";
    exit;
}

$sql = "SELECT a_u_email, b_u_email FROM match_db WHERE d_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $d_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($loginEmail === $row['a_u_email']) {
        $updateSql = "UPDATE match_db SET a_feedback = ? WHERE d_id = ?";
    } elseif ($loginEmail === $row['b_u_email']) {
        $updateSql = "UPDATE match_db SET b_feedback = ? WHERE d_id = ?";
    } else {
        http_response_code(403);
        echo "無權限";
        exit;
    }

    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ii", $rating, $d_id);
    $stmt->execute();

    echo "評分成功";
} else {
    http_response_code(404);
    echo "找不到紀錄";
}
?>
