<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="3; url=propertiesdemo.php"> -->
    <title>CoLaB</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $title = $_POST['title'];
    $content = $_POST['content'];
    $tag = $_POST['tag'];
    $target = $_POST['target'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $permission= $_SESSION['u_permission'];
    
    $sql = "INSERT INTO demanded (title, content, tag, target, name, u_email, phone, date, u_permission)
  VALUES ('$title', '$content', '$tag', '$target', '$name', '$email', '$phone', '$date','$permission')";
    if (mysqli_query($conn, $sql)) {
        echo "<h1 align='center'>新增完成</h1>";
        header("Location: propertiesdemo.php");
    }
    ?>
</body>

</html>