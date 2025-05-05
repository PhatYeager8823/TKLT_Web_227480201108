<?php
$ketqua = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s1 = $_POST["sothu1"] ?? 0;
    $s2 = $_POST["sothu2"] ?? 0;
    $pheptoan = $_POST["pheptoan"] ?? '';

    switch ($pheptoan) {
        case "Cộng":
            $ketqua = $s1 + $s2;
            break;
        case "Trừ":
            $ketqua = $s1 - $s2;
            break;
        case "Nhân":
            $ketqua = $s1 * $s2;
            break;
        case "Chia":
            $ketqua = $s2 != 0 ? $s1 / $s2 : "Không thể chia cho 0";
            break;
        case "Mod":
            $ketqua = $s2 != 0 ? $s1 % $s2 : "Không thể chia cho 0";
            break;
        default:
            $ketqua = "Không xác định phép toán";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bai3.css">
    <title>Bài 3</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>TÍNH TOÁN SỐ HỌC</h1>
            <hr>
            <div class="input">
                <label for="">Số thứ 1: <input type="number" name="sothu1" value="<?= htmlspecialchars($s1) ?>"></label>
                <label for="">Số thứ 2: <input type="number" name="sothu2" value="<?= htmlspecialchars($s2) ?>"></label>
                <label for="">Kết quả: <input type="text" name="ketqua" value="<?= $ketqua ?>" readonly></label>
            </div>
            <div class="button">
                <input type="submit" name="pheptoan" value="Cộng" class="cong">
                <input type="submit" name="pheptoan" value="Trừ" class="tru">
                <input type="submit" name="pheptoan" value="Nhân" class="nhan">
                <input type="submit" name="pheptoan" value="Chia" class="chia">
                <input type="submit" name="pheptoan" value="Mod" class="mod">
            </div>
        </form>
    </div>
</body>
</html>