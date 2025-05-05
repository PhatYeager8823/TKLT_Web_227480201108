<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten = $_POST["ten"] ?? '';
        $sdt = $_POST["sdt"] ?? '';

        setcookie("ten_khach", $ten, time() + 600);
        setcookie("sdt_khach", $sdt, time() + 600);

        header("Location: Bai22.php");
        exit();
    }

    $tenCo = $_COOKIE["ten_khach"] ?? '';
    $sdtCo = $_COOKIE["sdt_khach"] ?? '';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập khách hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 300px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        input {
            margin: 10px 0;
            padding: 8px;
            width: 90%;
        }
        button {
            padding: 8px 20px;
            background-color: teal;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .thongtin {
            margin-top: 20px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Đăng nhập khách hàng</h3>
        <form method="post" action="">
            <input type="text" name="ten" placeholder="Tên khách hàng" required><br>
            <input type="text" name="sdt" placeholder="Số điện thoại" required><br>
            <button type="submit">Đăng nhập</button>
        </form>

        <?php if ($tenCo && $sdtCo): ?>
            <div class="thongtin">
                <p>👤 Xin chào <strong><?php echo htmlspecialchars($tenCo); ?></strong></p>
                <p>📞 Số điện thoại: <strong><?php echo htmlspecialchars($sdtCo); ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>