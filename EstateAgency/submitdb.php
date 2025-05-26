<?php

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$link = mysqli_connect('localhost', 'root', '', 'sa');

$sender_email = $_SESSION['u_email'] ?? '';
$d_id = $_GET['d_id'] ?? '';

if (!$sender_email || !$d_id) {
    die('資料不完整');
}

// 找 tag
$sql_findtag = "SELECT tag ,u_email FROM demanded WHERE d_id='$d_id'";
$tag_result = mysqli_query($link, $sql_findtag);
$tag_row = mysqli_fetch_assoc($tag_result);

if (!$tag_row) {
    die('錯誤：找不到這個需求！');
}
$cop_b=$tag_row['u_email'];
$tag = $tag_row['tag'];

// 根據 tag 決定查哪張表// 先決定初始 table
switch ($tag) {
    case '合作':
        $table = 'club_coop';
        break;
    case 'spon':
        $table = 'org_donate';
        break;
    case '實習':
        $table = 'cor_intern';
        break;
    case '贊助':
        $table = 'cor_spons';
        break;
    default:
        die('錯誤：未知的標籤類型！');
}

// 第一次查 club_coop（或其他 table）
$content_sql    = "SELECT * FROM {$table} WHERE d_id='$d_id'";
$content_result = mysqli_query($link, $content_sql);

// 如果是「合作」標籤，且在 club_coop 沒查到任何資料，就再 fallback 去 corp_coop
if ($tag === '合作' && mysqli_num_rows($content_result) === 0) {
    $table          = 'corp_coop';
    $content_sql    = "SELECT * FROM {$table} WHERE d_id='$d_id'";
    $content_result = mysqli_query($link, $content_sql);
}

// 最終拿到一列資料或 null
$content_row = mysqli_fetch_assoc($content_result);
$receiver_email = $content_row['c_email'] ?? '';

if (!$receiver_email) {
    die('找不到合作對象');
}


// ✅ 使用 PHPMailer 發送 Email
$mail = new PHPMailer(true);

try {
    // SMTP 設定
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'chesteras452@gmail.com'; // 替換為你的 Gmail
    $mail->Password   = 'duos gncf cras tcdu';        // Gmail 應用程式密碼
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(false);
    // 發件人與收件人
    $mail->setFrom('chesteras458@gmail.com', 'CoLab 合作申請系統');
    $mail->addAddress($receiver_email);

    // 內容
    $mail->isHTML(false);
    $mail->Subject = '您收到一則新的合作申請';
    $mail->Body    = "您好，$sender_email 向您發出合作申請。\n請登入平台查看細節。";

    $mail->send();
    echo "✅ Email 發送成功！<br>";
} catch (Exception $e) {
    echo "❌ Email 發送失敗，錯誤訊息：{$mail->ErrorInfo}<br>";
}




$corp_sql = "INSERT INTO match_db
    (a_u_email,b_u_email,agree_a,agree_b,complete_a,complete_b,terminate_a,terminate_b,status,demanded_id)
  VALUES ('$sender_email','$cop_b', 1, 0, 0, 0, 0, 0, 'pending','$d_id')";
mysqli_query($link, $corp_sql);









echo "<a href='index.php'>返回首頁</a>";
