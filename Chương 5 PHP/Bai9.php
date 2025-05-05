<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 9 - Bảng Cửu Chương</title>
    <style>
        form {
            display: flex;
            flex-direction: column; /* Sắp xếp các phần tử con theo cột */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .row1-5, .row6-10 {
            display: flex;
        }

        .row1-5 {
            margin-bottom: 30px;
        }

        .row {
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <form action="">
        <div class="row1-5">
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo "<div class='row'>";
                    for ($j = 1; $j <= 5; $j++) {
                        echo "{$i} x {$j} = " . ($i * $j) ."<br>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
        <div class="row6-10">
            <?php
                for ($i = 6; $i <= 10; $i++) {
                    echo "<div class='row'>";
                    for ($j = 1; $j <= 5; $j++) {
                        echo "{$i} x {$j} = " . ($i * $j) ."<br>";
                    }
                    echo "</div>";
                }
            ?>
        </div>
    </form>
</body>
</html>