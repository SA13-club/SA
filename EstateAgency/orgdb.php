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

  $o_name = $_POST['o_name'];
  $o_type = $_POST['o_type'];
  $s_name = $_POST['s_name'];
  $s_type = $_POST['s_type'];
  $s_email = $_POST['s_email'];
  $s_phone = $_POST['s_phone'];

  $u_email = $_POST['u_email'];
  $u_password = $_POST['u_password'];
  $u_permission = $_POST['u_permission'];
  $u_content = $_POST['u_content'];

  $sql2="INSERT INTO user_account (u_email, u_password, u_permission, u_content) VALUES('$u_email', '$u_password', '$u_permission', '$u_content')";
  mysqli_query($conn, $sql2);
  $sql = "INSERT INTO organization_registrations ( u_email,o_name, o_type, s_name, s_type, s_email, s_phone,u_content)
  VALUES ('$u_email','$o_name', '$o_type', '$s_name', '$s_type', '$s_email', '$s_phone', '$u_content')";
  if (mysqli_query($conn, $sql)) {
    echo "<h1 align='center'>新增完成</h1>";
  }
  
  ?>
</body>

</html>                                     