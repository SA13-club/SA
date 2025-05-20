<?php
$password = $_POST['password'];
$email = $_SESSION['verify_email'];
$link = mysqli_connect('localhost', 'root', '', 'sa');
$stmt = $link->prepare("UPDATE user_account SET u_password = ? WHERE u_email = ?");
$stmt->bind_param("ss", $password, $email);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "密碼更新成功"]);
} else {
    echo json_encode(["status" => "fail", "message" => "密碼更新失敗：" . $stmt->error]);
}
$stmt->close();
$link->close();
