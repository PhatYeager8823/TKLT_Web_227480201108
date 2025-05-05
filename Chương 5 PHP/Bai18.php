<!DOCTYPE html>
<html>
<head>
    <title>Tìm chuỗi dài nhất</title>
</head>
<body>
    <h1>Tìm chuỗi dài nhất trong chuỗi</h1>
    <form method="post">
        <label for="chuoi_s">Chuỗi s:</label>
        <input type="text" id="chuoi_s" name="chuoi_s" style="width: 300px;"><br><br>
        <input type="submit" value="Tìm chuỗi dài nhất">
    </form>

    <?php
        if (isset($_POST['chuoi_s'])) {
            $s = $_POST['chuoi_s'];
            $words = explode(" ", $s);
            $longestWord = "";

            foreach ($words as $word) {
                if (strlen($word) > strlen($longestWord)) {
                    $longestWord = $word;
                }
            }

            if ($longestWord !== "") {
                echo "<h2>Chuỗi dài nhất là:</h2>";
                echo "<p>\"" . $longestWord . "\" có " . strlen($longestWord) . " ký tự.</p>";
            } else {
                echo "<p>Không có từ nào trong chuỗi.</p>";
            }
        }
    ?>
</body>
</html>