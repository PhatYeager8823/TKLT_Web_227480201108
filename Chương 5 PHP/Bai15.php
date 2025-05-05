<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 15</title>
</head>
<body>
    <form action="" method="post">
        <label for="s">s: <input type="text" id="s" name="s"></label>
        <label for="ch">ch: <input type="text" id="ch" name="ch"></label>
        <button type="submit">Thực hiện</button>

        <?php
            if (isset($_POST["s"]) && isset($_POST["ch"])) {
                $s = $_POST["s"];
                $ch = $_POST["ch"];
                $soLan = substr_count($s, $ch);

                echo "Số lần xuất hiện của " . $ch . " trong " . $s . " là " . $soLan . " lần";
            }
        ?>
    </form>
</body>
</html>