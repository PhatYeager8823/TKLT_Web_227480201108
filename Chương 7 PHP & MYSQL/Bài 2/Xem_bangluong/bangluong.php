<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhansu";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM luong";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bảng lương</title>
    <style>
        fieldset {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid black;
        }
        legend {
            font-weight: bold;
            font-size: 1.2em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 2px solid #444;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<fieldset>
    <legend>Danh sách bảng lương</legend>
    <table>
        <tr>
            <th>Mã lương</th>
            <th>Mã nhân viên</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Số giờ làm</th>
            <th>Lương cơ bản</th>
            <th>Hệ số</th>
        </tr>

        <?php
        if ($result->num_rows > 0):
            while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row["MaLuong"] ?></td>
                <td><?= $row["MaNhanVien"] ?></td>
                <td><?= $row["Thang"] ?></td>
                <td><?= $row["Nam"] ?></td>
                <td><?= $row["SoGioLam"] ?></td>
                <td><?= number_format($row["LuongCoBan"], 0, ',', '.') ?> đ</td>
                <td><?= $row["HeSo"] ?></td>
            </tr>
        <?php
            endwhile;
        else:
            echo "<tr><td colspan='7'>Không có dữ liệu lương.</td></tr>";
        endif;
        ?>
    </table>
</fieldset>

</body>
</html>

<?php
$conn->close();
?>
