<?php
header('Content-Type: application/json');


$inputCode = $_POST['code'] ?? '';
$email = $_POST['email'] ?? '';
file_put_contents("verify_debug.log", "收到 email=$email, code=$inputCode\n", FILE_APPEND);
if (empty($email) || empty($inputCode)) {
    file_put_contents("verify_debug.log", "⚠️ 忽略空請求\n", FILE_APPEND);
    http_response_code(204);
    exit;
}
if (!isset($_SESSION['verify_code'], $_SESSION['verify_email'], $_SESSION['code_expire'])) {
    die("驗證碼不存在，請重新發送。");
}

if (time() > $_SESSION['code_expire']) {
    die("驗證碼已過期，請重新發送。");
}

if ($email != $_SESSION['verify_email'] || $inputCode != $_SESSION['verify_code']) {
    die("驗證失敗\n" .
        "你輸入的 email: $email\n" .
        "系統記錄的 email: {$_SESSION['verify_email']}\n" .
        "你輸入的驗證碼: $inputCode\n" .
        "系統記錄的驗證碼: {$_SESSION['verify_code']}");
}


// 驗證成功，導向重設密碼頁
echo json_encode([
  "status" => "success",
  "message" => "驗證成功，請重設密碼",
  "redirect" => "reset_password.php"
]);
file_put_contents("verify_debug.log", "已跳轉\n", FILE_APPEND);

exit;
