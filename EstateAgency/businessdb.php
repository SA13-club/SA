<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="3; url=index.php">
  <title>CoLaB</title>
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sa";

  $conn = new mysqli($servername, $username, $password, $dbname);

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

  $u_email = $_POST['u_email'];
  $u_password = $_POST['u_password'];
  $u_permission = $_POST['u_permission'];
  $u_content = $_POST['u_content'];
 
$sql1 = "INSERT INTO user_account (u_email, u_password, u_permission, u_content)
VALUES ('$u_email', '$u_password', '$u_permission', '$u_content')";

if (mysqli_query($conn, $sql1)) {
    $sql2 = "INSERT INTO corporation_registrations (
      u_email, c_name, c_type, c_industry, c_address, c_email, c_phone,
      e_name, e_type, e_email, e_phone, u_content
    ) VALUES (
      '$u_email', '$c_name', '$c_type', '$c_industry', '$c_address', '$c_email', '$c_phone',
      '$e_name', '$e_type', '$e_email', '$e_phone', '$u_content'
    )";

    if (mysqli_query($conn, $sql2)) {
        echo "<h1 align='center'>新增完成</h1>";
    } else {
        echo "<h1 align='center'>新增公司資料失敗</h1>";
    }
} else {
    echo "<h1 align='center'>新增帳戶資料失敗</h1>";
}

  ?>
</body>

</html>