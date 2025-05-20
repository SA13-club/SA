<?php

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

$email = $_POST['email'] ?? '';

// 驗證 email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    file_put_contents("verify_debug.log", "收到 email=$email\n", FILE_APPEND);
    echo json_encode(["status" => "fail", "message" => "無效的電子郵件格式"]);
    exit;
}

// 資料庫連線
$link = mysqli_connect('localhost', 'root', '', 'sa');

if (!$link) {
    http_response_code(600);
    echo json_encode(["status" => "fail", "message" => "資料庫連線失敗"]);

    exit;
}

$sql="SELECT * FROM user_account WHERE u_email='$email'";
$result = mysqli_query($link, $sql);
if ($result->num_rows === 0) {
    http_response_code(404);
    echo json_encode(["status" => "fail", "message" => "此電子郵件尚未註冊"]);
    exit;
}

$code = rand(100000, 999999);
$_SESSION['verify_email'] = $email;
$_SESSION['verify_code'] = $code;
$_SESSION['code_expire'] = time() + 300;

$mail = new PHPMailer(true);

try {
    // 除錯訊息寫入檔案
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function ($str, $level) {
    };

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'chesteras452@gmail.com';
    $mail->Password   = 'duos gncf cras tcdu';  // 注意！不要用 Gmail 登入密碼
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->setFrom('chesteras452@gmail.com', 'CoLaB 驗證系統');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = '【CoLaB】您的驗證碼';
    $mail->Body    = "
        <p>您好，這是您申請重設密碼的驗證碼：</p>
        <h2>$code</h2>
        <p>此驗證碼將在 5 分鐘後失效。</p>
        <p>如果您沒有請求重設密碼，請忽略此信。</p>
    ";

    $mail->send();
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "驗證碼已發送至 $email"]);

} catch (Exception $e) {
    $errorMsg = $mail->ErrorInfo ?: $e->getMessage();
    http_response_code(500);
    echo json_encode(["status" => "fail", "message" => "寄送失敗：" . $errorMsg]);
}
