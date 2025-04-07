<?php
session_start();
$u_email = $_POST['u_email'];
$u_password = $_POST['u_password'];

$link = mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "SELECT * FROM user_account WHERE u_email='$u_email' AND u_password='$u_password'";
$rs = mysqli_query($link, $sql);

if ($record = mysqli_fetch_assoc($rs)) {
    $_SESSION['u_email'] = $record['u_email'];
    $_SESSION['u_permission'] = $record['u_permission'];
    $_SESSION['u_content'] = $record['u_content'];
    header("Location: index.php?method=message&message=登入成功");
    exit();
} else {
    header("Location: index.php?method=message&message=登入失敗");
    exit();
}
?>