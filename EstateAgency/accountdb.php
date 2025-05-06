<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 擷取共通欄位
$u_email = $_POST['u_email'];
$u_password = $_POST['u_password'];
$u_content = $_POST['u_content'];

// 更新 User_Account 表格
$updateUser = $conn->prepare("UPDATE User_Account SET u_password = ?, u_content = ? WHERE u_email = ?");
$updateUser->bind_param("sss", $u_password, $u_content, $u_email);
$updateUser->execute();

// 根據權限判斷更新哪一張表
// （你可能從 session 或隱藏欄位帶入 $u_permission）
$u_permission = $_SESSION['u_permission'] ?? ''; // 確保你在登入時設了這個 session

if ($u_permission === '企業') {
    // 擷取企業欄位
    $c_name = $_POST['c_name'];
    $c_type = $_POST['c_type'];
    $c_industry = $_POST['c_industry'];
    $c_address = $_POST['c_address'];
    $c_email = $_POST['c_email'];
    $c_phone = $_POST['c_phone'];
    $e_name = $_POST['e_name'];
    $e_type = $_POST['e_type'];
    $e_email = $_POST['e_email'];
    $e_phone = $_POST['e_phone'];

    $stmt = $conn->prepare("UPDATE Corporation_Registrations 
                            SET c_name = ?, c_type = ?, c_industry = ?, c_address = ?, 
                                c_email = ?, c_phone = ?, e_name = ?, e_type = ?, 
                                e_email = ?, e_phone = ?, u_content = ?
                            WHERE u_email = ?");
    $stmt->bind_param("ssssssssssss", $c_name, $c_type, $c_industry, $c_address, $c_email, $c_phone, $e_name, $e_type, $e_email, $e_phone, $u_content, $u_email);
    $stmt->execute();

} elseif ($u_permission === '組織團體') {
    // 擷取組織欄位
    $o_name = $_POST['o_name'];
    $o_type = $_POST['o_type'];
    $s_name = $_POST['s_name'];
    $s_type = $_POST['s_type'];
    $s_email = $_POST['s_email'];
    $s_phone = $_POST['s_phone'];

    $stmt = $conn->prepare("UPDATE Organization_Registrations 
                            SET o_name = ?, o_type = ?, s_name = ?, s_type = ?, 
                                s_email = ?, s_phone = ?, u_content = ?
                            WHERE u_email = ?");
    $stmt->bind_param("ssssssss", $o_name, $o_type, $s_name, $s_type, $s_email, $s_phone, $u_content, $u_email);
    $stmt->execute();
}

$stmt->close();
$updateUser->close();
$conn->close();

// 回到上一頁或導向成功頁面
header("Location: account.php?success=1");
exit;
?>
