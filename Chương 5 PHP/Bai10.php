<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 10</title>
    <style>
        form {
            display: flex;
            /* flex-direction: column; */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            height: auto;
            padding: 20px;
            background-color: aqua;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            border: none;
        }

        label {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            width: 100px;
            background-color: pink;
            border-radius: 10px;
            border: none;
            margin-bottom: 10px;
        }

        .a, .b, .c, .d, .e {
            font-weight: bold; 
            font-size: 20px; 
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
        <label for="songuyen">Nhập vào số nguyên của bạn: <input type="number" id="so_nguyen" name="so_nguyen"></label>
        <button type="submit">Gửi</button>
        <?php
            if (isset($_POST['so_nguyen'])) {
                $soNguyen = $_POST['so_nguyen'];
                $mangSo = [];
                for ($i = 0; $i <= $soNguyen; $i++) {
                    $mangSo[] = $i;
                }

                echo "<div class='a'>";
                    echo "Mảng là: " . implode(", ", $mangSo);
                echo "</div>";

                echo "<div class='b'>";
                    $soChan = 0;
                    for ($i = 0; $i <= $soNguyen; $i++) {
                        if ($i % 2 == 0) {
                            $soChan++;
                        }
                    }
                    echo "Tổng số chẵn là: {$soChan}";
                echo "</div>";

                echo "<div class='c'>";
                    $sumLe = 0;
                    for ($i = 0; $i <= $soNguyen; $i++) {
                        if ($i % 2 != 0) {
                            $sumLe += $i;
                        }
                    }
                    echo "Tổng các số lẻ trong mảng là: {$sumLe}";
                echo "</div>";

                echo "<div class='d'>";
                    $lonNhat = max($mangSo);
                    $nhoNhat = min($mangSo);
                    echo "Giá trị lớn nhất là: {$lonNhat}<br>";
                    echo "Giá trị nhỏ nhất là: {$nhoNhat}";
                echo "</div>";

                echo "<div class='e'>";
                    echo "Mảng đảo ngược là: " . implode(", ", array_reverse($mangSo));
                echo "</div>";
            } else {
                echo "Vui lòng nhập một số nguyên và nhấn Gửi";
            }
        ?>
        </div>
    </form>
</body>
</html>