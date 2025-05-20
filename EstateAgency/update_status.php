<?php
session_start();
$me = $_SESSION['u_email'] ?? '';
if (!$me) {
    echo json_encode(['status'=>false,'msg'=>'未登入']); exit;
}
$conn = new mysqli("localhost","root","","sa");
if ($conn->connect_error) {
    echo json_encode(['status'=>false,'msg'=>'DB 連線失敗']); exit;
}

$d_id = intval($_POST['d_id'] ?? 0);
$step = $_POST['step'] ?? '';
if (!$d_id || !$step) {
    echo json_encode(['status'=>false,'msg'=>'缺少參數']); exit;
}

// 先取出這筆合作
$stmt = $conn->prepare("SELECT * FROM match_db WHERE d_id = ?");
$stmt->bind_param("i",$d_id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
$stmt->close();
if (!$row) {
    echo json_encode(['status'=>false,'msg'=>'找不到合作資料']); exit;
}

// 檢查身分
$isA = $me === $row['a_u_email'];
$isB = $me === $row['b_u_email'];
if (!$isA && !$isB) {
    echo json_encode(['status'=>false,'msg'=>'你不是此合作的任一方']); exit;
}
$who = $isA ? 'a' : 'b';

// 處理「同意」或「完成」
if (in_array($step, ['agree','complete'])) {
    // 更新單方 agree_x 或 complete_x
    $field = "{$step}_{$who}";
    $upd = $conn->prepare("UPDATE match_db SET `$field` = 1 WHERE d_id = ?");
    $upd->bind_param("i",$d_id);
    $upd->execute();
    $upd->close();

    // 重新撈最新欄位
    $fresh = $conn->prepare("
        SELECT agree_a, agree_b, complete_a, complete_b 
          FROM match_db 
         WHERE d_id = ?
    ");
    $fresh->bind_param("i",$d_id);
    $fresh->execute();
    $f = $fresh->get_result()->fetch_assoc();
    $fresh->close();

    // 雙方都同意 → 進入洽談中
    if ($step === 'agree' && $f['agree_a'] && $f['agree_b']) {
        $conn->query("UPDATE match_db SET status = 'negotiating' WHERE d_id = $d_id");
    }
    // 雙方都完成 → 直接標記 completed
    if ($step === 'complete' && $f['complete_a'] && $f['complete_b']) {
        $conn->query("UPDATE match_db SET status = 'completed' WHERE d_id = $d_id");
    }

    echo json_encode(['status'=>true,'msg'=>'更新成功']); exit;
}

// 處理「終結」
if ($step === 'terminate') {
    $term = $conn->prepare("UPDATE match_db SET terminate_{$who} = 1 WHERE d_id = ?");
    $term->bind_param("i",$d_id);
    $term->execute();
    $term->close();

    // 再次檢查所有旗標
    $chk = $conn->query("SELECT agree_a,agree_b,complete_a,complete_b,terminate_a,terminate_b FROM match_db WHERE d_id = $d_id");
    $n = $chk->fetch_assoc();
    if (
       $n['agree_a'] && $n['agree_b'] &&
       $n['complete_a'] && $n['complete_b'] &&
       ($n['terminate_a'] || $n['terminate_b'])
    ) {
        $conn->query("UPDATE match_db SET status = 'completed' WHERE d_id = $d_id");
    }

    echo json_encode(['status'=>true,'msg'=>'終結合作已處理']); exit;
}

echo json_encode(['status'=>false,'msg'=>'未知操作']);
