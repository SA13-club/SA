<?php
session_start();

$inputCode = $_POST['code'] ?? '';
$email = $_POST['email'] ?? '';

if (!isset($_SESSION['verify_code'], $_SESSION['verify_email'], $_SESSION['code_expire'])) {
    die("驗證碼不存在，請重新發送。");
}

if (time() > $_SESSION['code_expire']) {
    die("驗證碼已過期，請重新發送。");
}

if ($email !== $_SESSION['verify_email'] || $inputCode != $_SESSION['verify_code']) {
    die("驗證失敗，請檢查您的驗證碼");
}

// 驗證成功，導向重設密碼頁
header("Location: reset_password.php");
exit;
