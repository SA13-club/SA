<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
$u_email = $_POST['u_email'];


$stmt = $conn->prepare("UPDATE user_account SET d_ban = IFNULL(d_ban, 0) + 1 WHERE u_email = ?");
$stmt->bind_param("s", $u_email);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();

$conn->close();
exit();
