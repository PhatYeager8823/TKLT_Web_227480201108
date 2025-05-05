<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 12</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            font-size: 0;
        }

        .chessCell {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: none;
        }

        h2 {
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
        <button type="submit" name="ve_ban_co">VẼ</button>
        <h2>Bàn cờ</h2>
        <?php
            if(isset($_POST['ve_ban_co'])) {
                for ($i = 1; $i <= 8; $i++) {
                    for ($j = 1; $j <= 8; $j++) {
                        if ($i % 2 == 0) {
                            if ($j % 2 == 0) {
                                echo "<span class='chessCell' style='background-color: black;'></span>";
                            } else {
                                echo "<span class='chessCell' style='background-color: pink;'></span>";
                            }
                            
                        } else if ($i % 2 != 0) {
                            if ($j % 2 != 0) {
                                echo "<span class='chessCell' style='background-color: black;'></span>";
                            } else {
                                echo "<span class='chessCell' style='background-color: pink;'></span>";
                            }
                        }
                    }
                    echo "<br>";
                }
            }
        ?>
        </div>
    </form>
</body>
</html>