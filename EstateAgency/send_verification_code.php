<?php
session_start();
$email = $_POST['email'] ?? '';

// 檢查 email 合法性
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "無效的電子郵件";
    exit;
}

$code = rand(100000, 999999);
$_SESSION['verify_email'] = $email;
$_SESSION['verify_code'] = $code;
$_SESSION['code_expire'] = time() + 300;

// 寄信
mail($email, "CoLaB 驗證碼", "您的驗證碼為：$code，有效期限 5 分鐘");

// ✅ 回傳成功，不導向
http_response_code(200);
echo "驗證碼已發送";
exit;
