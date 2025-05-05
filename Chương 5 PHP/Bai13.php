<?php
    function soLonNhat ($mang) {
        return max($mang);
    }

    function soNhoNhat ($mang) {
        return min($mang);
    }

    // function soChinhPhuong ($n) {
    //     $cb2 = sqrt(n);
    //     return cb2 * cb2 == n;
    // }

    // fuction isEven ($n) {
    //     return n % 2 == 0;
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 13</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="mang">Nhập danh sách các số nguyên vào mảng (cách nhau bởi dấu ",") <input type="text" id="mang" name="mang" value="<?php echo isset($_POST['mang']) ? htmlspecialchars($_POST['mang']) : ''; ?>"></label>
            <select name="menu" id="menu">
                <option value="1">Tìm số lớn nhất trong danh sách</option>
                <option value="2">Tìm số nhỏ nhất trong danh sách</option>
                <option value="3">Tìm các số chính phương trong danh sách</option>
                <option value="4">In ra màn hình các số chẵn trong danh sách</option>
                <option value="5">In ra màn hình các số lẻ trong danh sách</option>
                <option value="6">Sắp xếp các phần tử trong danh sách theo thứ tự tăng dần</option>
            </select>
            <button type="submit">Thực hiện</button>

            <?php
                if (isset($_POST['mang']) && isset($_POST['menu'])) {
                    $mangTinh = explode(",", $_POST['mang']);
                    $luaChon = $_POST['menu'];

                    $mangSoNguyen = array_map('intval', array_map('trim', $mangTinh));
                    echo "<h2>Kết quả là:</h2>";
                    switch ($luaChon) {
                        case 1:
                            echo "Số lớn nhất trong mảng là: " . soLonNhat($mangSoNguyen);
                            break;
                        case 2:
                            echo "Số nhỏ nhất trong mảng là: " . soNhoNhat($mangSoNguyen);
                            break;
                        case 3:
                            $soChinhPhuong = array_filter($mangSoNguyen, function($n) {
                                $sqrt_n = sqrt($n);
                                return $sqrt_n == floor($sqrt_n);
                            });
                            
                            if (!empty($soChinhPhuong)) {
                                echo "Các số chính phương trong mảng: " . implode(", ", $soChinhPhuong);
                            } else {
                                echo "Không có số chính phương trong mảng.";
                            }
                            // foreach ($mangSoNguyen as $number) {
                            //     if (soChinhPhuong($number)) {
                            //         echo $number;
                            //     }
                            // }
                            break;
                        case 4: 
                            $soChan = array_filter($mangSoNguyen, function($n) {
                                return $n % 2 == 0;
                            });
                            if (!empty($soChan)) {
                                echo "Các số chẵn trong mảng là: " . implode(",", array_values($soChan));
                            } else {
                                echo "Không có số chẵn trong mảng";
                            }
                            break;
                        case 5:
                            $soLe = array_filter($mangSoNguyen, function($n) {
                                return $n % 2 != 0;
                            });
                            if (!empty($soLe)) {
                                echo "Các số lẻ trong mảng là: " . implode(",", array_values($soLe));
                            } else {
                                echo "Không có số lẻ trong mảng";
                            }
                            break;
                        case 6:
                            sort($mangSoNguyen);
                            echo "Danh sách theo thứ tự tăng dần: " . implode(", ", $mangSoNguyen);
                            break;
                        default: 
                            echo "Vui lòng chọn một thao tác.";
                            break;
                    }
                } else {
                    echo "Vui lòng nhập mảng số";
                }
            ?>
        </div>
    </form>
</body>
</html>