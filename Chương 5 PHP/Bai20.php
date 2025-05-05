<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $maso = $_POST['maso'] ?? '';

        $users = parse_ini_file("users.ini", true);
        $isAuthenticated = false;

        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password && $user['maso'] == $maso) {
                $isAuthenticated = true;
                break;
            }
        }

        if ($isAuthenticated) {
            setcookie("logged_in", "true", time() + 180);
            echo "<div class='notification success'>✅ Đăng nhập thành công! Cookie sẽ hết hạn sau 3 phút.</div>";
        } else {
            echo "<div class='notification error'>❌ Thông tin đăng nhập không chính xác!</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập thành viên</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 350px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
            font-size: 0.9em;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-container input[type="password"] {
            flex-grow: 1;
        }

        .password-container button {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            color: #777;
            font-size: 0.9em;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .notification {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }

        .notification.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .notification.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="tieu-de">
                <h3>Đăng nhập thành viên</h3>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                    <button type="button">Hiện</button>
                </div>
            </div>
            <div class="form-group">
                <label for="maso">Mã số:</label>
                <input type="text" id="maso" name="maso" placeholder="Nhập mã số">
            </div>
            <div class="button-container">
                <button type="submit">Đăng nhập</button>
                </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.querySelector('.password-container input[type="password"]');
            const togglePasswordButton = document.querySelector('.password-container button');

            if (togglePasswordButton && passwordInput) {
                togglePasswordButton.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.textContent = type === 'password' ? 'Hiện' : 'Ẩn';
                });
            }
        });
    </script>
</body>
</html>