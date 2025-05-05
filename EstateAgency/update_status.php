<?php
session_start();
$me = $_SESSION['u_email'] ?? '';
if (!$me) {
    echo json_encode(['status' => false, 'msg' => '未登入']);
    exit;
}

$conn = new mysqli("localhost", "root", "", "sa");
if ($conn->connect_error) {
    echo json_encode(['status' => false, 'msg' => '資料庫連線失敗']);
    exit;
}

$d_id = $_POST['d_id'] ?? '';
$step = $_POST['step'] ?? '';

if (!$d_id || !$step) {
    echo json_encode(['status' => false, 'msg' => '缺少參數']);
    exit;
}

// 先查出這筆合作資料
$stmt = $conn->prepare("SELECT * FROM match_db WHERE d_id = ?");
$stmt->bind_param("i", $d_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    echo json_encode(['status' => false, 'msg' => '找不到合作資料']);
    exit;
}

$isA = $me === $row['a_u_email'];
$isB = $me === $row['b_u_email'];

if (!$isA && !$isB) {
    echo json_encode(['status' => false, 'msg' => '你不是這筆合作的其中一方']);
    exit;
}

$who = $isA ? 'a' : 'b';

// 處理按鈕行為
if (in_array($step, ['agree', 'complete'])) {
    $field = "{$step}_{$who}";
    $sql = "UPDATE match_db SET $field = 1 WHERE d_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $d_id);
    $stmt->execute();
    $stmt->close();

    // 自動檢查是否雙方都完成同意同步 → 進入下一階段
    if ($step === 'agree' && $row['agree_a'] && $row['agree_b']) {
        $conn->query("UPDATE match_db SET status = 'negotiating' WHERE d_id = $d_id");
    } elseif ($step === 'complete' && $row['complete_a'] && $row['complete_b']) {
        // 注意：不會立即完成合作，等 terminate 動作
    }

    echo json_encode(['status' => true, 'msg' => '更新成功']);
    exit;
}

if ($step === 'terminate') {
    $terminate_field = "terminate_{$who}";
    $conn->query("UPDATE match_db SET $terminate_field = 1 WHERE d_id = $d_id");

    // 再次取得最新資料檢查是否可以完成合作
    $res = $conn->query("SELECT * FROM match_db WHERE d_id = $d_id");
    $new = $res->fetch_assoc();

    if (
        $new['agree_a'] == 1 && $new['agree_b'] == 1 &&
        $new['complete_a'] == 1 && $new['complete_b'] == 1 &&
        ($new['terminate_a'] == 1 || $new['terminate_b'] == 1)
    ) {
        $conn->query("UPDATE match_db SET status = 'completed' WHERE d_id = $d_id");
    }

    echo json_encode(['status' => true, 'msg' => '終結合作已處理']);
    exit;
}

echo json_encode(['status' => false, 'msg' => '未知操作']);
