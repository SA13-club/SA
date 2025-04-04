<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=index.php">
    <title>Document</title>
</head>
<body>
    <p align=center>
        <?php
          session_start();
          $u_email = $_POST['u_email'];
          $u_password = $_POST['u_password'];
          $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
          $sql = "select * from corporation_account where u_email='$u_email' and u_password ='$u_password'";
          $rs = mysqli_query($link, $sql);
          if ($record = mysqli_fetch_assoc($rs))
          {
            $_SESSION['u_email'] = $record['u_email'];
            $_SESSION['c_name'] = $record['c_name'];
            $_SESSION['u_content'] = $record['u_content'];
            header('location:index.php?method=message&message=登入成功');
          }
          else
          {
            header('location:index.php?method=message&message=登入失敗');
          }
        ?>
    </p>
</body>
</html>