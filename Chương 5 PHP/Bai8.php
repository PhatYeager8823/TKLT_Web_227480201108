<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8</title>
    <style>
        form {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            height: 100vh;
        }

        select {
            width: 100px;
            height: 30px;
        }
    </style>
</head>
<body>
    <form action="">
        <select name="" id="">
        <?php
            $namHienTai = date("Y");
            for ($i = 1990; $i <= $namHienTai; $i++) {
                echo "<option>{$i}</option>";
            }
        ?>
        </select>
    </form>
</body>
</html>