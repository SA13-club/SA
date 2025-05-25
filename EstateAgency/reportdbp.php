<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sa";

$conn = new mysqli($servername, $username, $password, $dbname);
$d_id = $_POST['d_id'];
$sql = "UPDATE demanded SET d_ban = IFNULL(d_ban, 0) + 1 WHERE d_id = '$d_id'";
if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}
exit();
