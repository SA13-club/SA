<?php
session_start();
header('Content-Type: application/json');
$conn = new mysqli("localhost","root","","sa");
if ($conn->connect_error) {
  echo json_encode(['status'=>false]);
  exit;
}

$me   = $_SESSION['u_email'] ?? '';
$did  = intval($_POST['d_id'] ?? 0);
$step = $_POST['step'] ?? '';
if (!$me || !$did || !in_array($step,['agree','complete','terminate'])) {
  echo json_encode(['status'=>false]);
  exit;
}

// 1. 撈出
$stmt = $conn->prepare("
  SELECT a_u_email,b_u_email,agree_a,agree_b,complete_a,complete_b,terminate_a,terminate_b,status
  FROM match_db WHERE d_id=?");
$stmt->bind_param("i",$did);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
$stmt->close();
if (!$row) { echo json_encode(['status'=>false]); exit; }

// 2. 判誰按了
$isA = ($me === $row['a_u_email']);
$field = match($step) {
  'agree'     => $isA?'agree_a':'agree_b',
  'complete'  => $isA?'complete_a':'complete_b',
  'terminate' => $isA?'terminate_a':'terminate_b',
};

// 3. 更新
if (!$row[$field]) {
  $u = $conn->prepare("UPDATE match_db SET {$field}=1 WHERE d_id=?");
  $u->bind_param("i",$did);
  $u->execute();
  $u->close();
}

// 4. 重新撈，檢查雙方
$chk = $conn->query("
  SELECT agree_a,agree_b,complete_a,complete_b,terminate_a,terminate_b,status
  FROM match_db WHERE d_id={$did}")
  ->fetch_assoc();

// 5. 推進階段
$new = $row['status'];
if ($new==='pending'     && $chk['agree_a']     && $chk['agree_b'])     $new='negotiating';
if ($new==='negotiating' && $chk['complete_a']  && $chk['complete_b'])  $new='completed';
if ($new==='completed'   && $chk['terminate_a'] && $chk['terminate_b']) $new='terminated';

if ($new !== $row['status']) {
  $u2 = $conn->prepare("UPDATE match_db SET status=? WHERE d_id=?");
  $u2->bind_param("si",$new,$did);
  $u2->execute();
  $u2->close();
}

echo json_encode(['status'=>$new]);
$conn->close();
?>
