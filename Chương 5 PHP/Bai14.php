<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 15</title>
</head>
<body>
    <form action="" method="post">
        <h2>Ma trận</h2>
        <label for="soHang">Nhập vào số hàng của ma trận: <input type="number" id="soHang" name="soHang" value="<?php echo isset($_POST['soHang']) ? htmlspecialchars($_POST['soHang']) : ''; ?>"></label>
        <label for="soCot">Nhập vào số cột của ma trận: <input type="number" id="soCot" name="soCot" value="<?php echo isset($_POST['soCot']) ? htmlspecialchars($_POST['soCot']) : ''; ?>"></label>
        <select name="menu" id="menu">
            <option value="1">Tìm số lớn nhất trong ma trận</option>
            <option value="2">Tìm số nhỏ nhất trong ma trận</option>
            <option value="3">Tính tổng các số trong ma trận</option>
            <option value="4">In ra màn hình các phần tử trong ma trận theo dạng toán học</option>
        </select>

        <button type="submit">Nhập giá trị ma trận</button>

        <?php
            if (isset($_POST["soHang"]) && isset($_POST["soCot"]) && isset($_POST["menu"])) {
                $hang = $_POST["soHang"];
                $cot = $_POST["soCot"];

                // echo "<h3>Nhập giá trị cho ma trận:</h3>";
                echo "<table>";
                for ($i = 0; $i < $hang; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $cot; $j++) {
                        echo "<td>";
                        echo "H[" . $i . "][" . $j . "]: <input type='number' name='maTran[" . $i . "][" . $j . "]'>";
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table><br>";
                echo "<button type='submit' name='thuHien'>Thực hiện</button>";
            }

            if (isset($_POST["thuHien"]) && isset($_POST["maTran"])) {
                $maTran = $_POST["maTran"];
                $luaChon = $_POST["menu"];
        
                switch ($luaChon) {
                    case 1:
                        $max = null;
                        foreach ($maTran as $row) {
                            foreach ($row as $value) {
                                if ($max === null || $value > $max) {
                                    $max = $value;
                                }
                            }
                        }
                        echo "Số lớn nhất trong ma trận là: " . htmlspecialchars($max);
                        break;
                    case 2:
                        $min = null;
                        foreach ($maTran as $row) {
                            foreach ($row as $value) {
                                if ($min === null || $value < $min) {
                                    $min = $value;
                                }
                            }
                        }
                        echo "Số nhỏ nhất trong ma trận là: " . htmlspecialchars($min);
                        break;
                    case 3:
                        $tong = 0;
                        foreach ($maTran as $row) {
                            foreach ($row as $value) {
                                $tong += $value;
                            }
                        }
                        echo "Tổng các số trong ma trận là: " . htmlspecialchars($tong);
                        break;
                    case 4:
                        echo "Ma trận theo dạng toán học:<br>";
                        foreach ($maTran as $row) {
                            echo "[ ";
                            echo implode(", ", array_map('htmlspecialchars', $row));
                            echo " ]<br>";
                        }
                        break;
                    default:
                        echo "Vui lòng chọn một thao tác.";
                        break;
                }
            }
        ?>
    </form>
</body>
</html>