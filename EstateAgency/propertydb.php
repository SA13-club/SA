<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url=properties.html">
    <title>Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
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
    
    $sql = "INSERT INTO demanded (title, content, tag, target, name, email, phone, date)
  VALUES ('$title', '$content', '$tag', '$target', '$name', '$email', '$phone', '$date')";
    if (mysqli_query($conn, $sql)) {
        echo "<h1 align='center'>新增完成</h1>";
    }
    ?>
</body>

</html>