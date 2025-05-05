<?php
    session_start();

    if (!isset($_SESSION["isLogin"])) {
        echo "Bạn chưa đăng nhập. <a href='login.html'>Quay lại đăng nhập</a>";
        exit();
    }

    $email = $_SESSION["email"];
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Trang chính</h1>
        <p>Người dùng đã đăng nhập với tên <strong><?php echo $username?></strong> và Email <strong><?php echo $email?></strong></p>
    </div>
</body>
</html>