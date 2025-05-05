<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlynhansu";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $account = $_POST["account"];
        $password = $_POST["password"];

    }

    $sql = "select * from tai_khoan where TenDangNhap='$account' and MatKhau='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = $account;
        header("Location: quanlynhansu.php");
    } else {
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu'); window.history.back();</script>";
    }
    $conn->close();
?>