<!DOCTYPE html>
<html>
<head>
    <title>Tách chuỗi</title>
</head>
<body>
    <h1>Nhập chuỗi để tách</h1>
    <form method="post">
        <label for="chuoi_s">Chuỗi s:</label>
        <input type="text" id="chuoi_s" name="chuoi_s"><br><br>
        <input type="submit" value="Tách chuỗi">
    </form>

    <?php
        if (isset($_POST['chuoi_s'])) {
            $s = $_POST['chuoi_s'];
            $a = explode(" ", $s);

            echo "<h2>Kết quả tách:</h2>";
            echo "<ul>";
            foreach ($a as $key => $value) {
                echo "<li>a[" . ($key + 1) . "] = \"" . $value . "\"</li>";
            }
            echo "</ul>";
        }
    ?>
</body>
</html>