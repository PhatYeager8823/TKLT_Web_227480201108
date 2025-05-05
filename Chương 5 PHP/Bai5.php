<?php
function timUSCLN($a, $b) {
    while ($b != 0) {
        $r = $a % $b;
        $a = $b;
        $b = $r;
    }
    return abs($a); 
}

function timBSCNN($a, $b) {
    $uscln = timUSCLN($a, $b);
    return abs($a * $b) / $uscln;
}

$ketqua = '';
$s1 = $_POST["sothu1"] ?? '';
$s2 = $_POST["sothu2"] ?? '';
$pheptoan = $_POST["pheptoan"] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (is_numeric($s1) && is_numeric($s2)) {
        switch ($pheptoan) {
            case "USCLN":
                $ketqua = timUSCLN($s1, $s2);
                break;
            case "BSCNN":
                $ketqua = timBSCNN($s1, $s2);
                break;
            default:
                $ketqua = "Không xác định phép toán";
        }
    } else {
        $ketqua = "Vui lòng nhập 2 số hợp lệ!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bai5.css">
    <title>Bài 5</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>TÍNH USCLN VÀ BSCNN</h1>
            <hr>
            <div class="input">
                <label for="">Số thứ 1: <input type="number" name="sothu1" value="<?= htmlspecialchars($s1) ?>"></label>
                <label for="">Số thứ 2: <input type="number" name="sothu2" value="<?= htmlspecialchars($s2) ?>"></label>
                <label for="">Kết quả: <input type="text" name="ketqua" value="<?= $ketqua ?>" readonly></label>
            </div>
            <div class="button">
                <input type="submit" name="pheptoan" value="USCLN" class="uscln">
                <input type="submit" name="pheptoan" value="BSCNN" class="bscnn">
            </div>
        </form>
    </div>
</body>
</html>