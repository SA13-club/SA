<meta http-equiv="refresh" content="3; url=newdona.php">

<?php
$d_id = $_GET['id'];
$link = mysqli_connect('localhost', 'root', '', 'sa');
mysqli_set_charset($link, "utf8mb4");
$sql = "DELETE FROM demanded WHERE d_id='$d_id'";
if (mysqli_query($link, $sql)) {
    echo "<h1 align='center'>刪除完成！</h1>";
}
?>