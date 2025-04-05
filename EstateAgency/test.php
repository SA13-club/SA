<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公告頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        body {
            background: url('home-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: #fff !important;
        }

        .announcement {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            padding: 30px;
            max-width: 800px;
        }

        .announcement h1 {
            font-size: 2rem;
            margin-bottom: 15px;
            color: black;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
        }

        .announcement p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 10px 0;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg d-flex justify-content-center">
        <div class="container">
            <a class="navbar-brand" href="/homework/main.php">產業實習平台</a>
            <div class="d-flex">
                <?php
                if ($_SESSION['name']) {
                    echo "<span class='navbar-text text-white me-3'>您好，", $_SESSION['name'], $_SESSION['level'], "</span>";
                    echo "<a href='logout.php' class='btn btn-outline-danger me-2'>登出</a>";
                    echo "<a href='link.php' class='btn btn-outline-primary'>管理</a>";
                } else {
                    echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href='login/login.html'\">登入</button>";
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="announcement">
        <?php
        $id = $_GET["id"];
        $link = mysqli_connect('localhost', 'root', '12345678', 'sa');
        $sql = "SELECT * FROM demanded WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<h1>{$row[1]}</h1>";
            echo "<p>{$row[2]}</p>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>