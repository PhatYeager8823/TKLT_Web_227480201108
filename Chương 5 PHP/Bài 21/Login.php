<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"] ?? '';
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"] ?? '';

        $emailGia = "test123@gmail.com";
        $passwordGia = "12345";

        if ($email === $emailGia && $password === $passwordGia) {
            $_SESSION["isLogin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $username;

            echo "Thông tin đăng nhập hợp lệ!<br><br>";
            echo '<form action="mainpage.php" method="get">
                    <button type="submit">Trang chính</button>
                  </form>';
        } else {
            echo "Sai email hoặc mật khẩu";
        }
    }
?>