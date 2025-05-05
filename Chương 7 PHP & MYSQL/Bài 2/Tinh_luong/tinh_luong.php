<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính lương toàn trường</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1200px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .salary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .salary-table th, .salary-table td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        .salary-table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .salary-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .salary-table tbody tr:hover {
            background-color: #e0f7fa;
        }

        .total-salary {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bảng lương toàn trường</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanlynhansu";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        $sql = "SELECT nv.MaNhanVien, nv.HoTen, l.LuongCoBan, l.HeSo
                FROM nhan_vien nv
                INNER JOIN luong l ON nv.MaNhanVien = l.MaNhanVien";
            
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table class='salary-table'>";
            echo "<thead><tr><th>Mã NV</th><th>Tên Nhân Viên</th><th>Lương Cơ Bản</th><th>Hệ Số</th><th>Lương</th></tr></thead>";
            echo "<tbody>";

            $tong_luong = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $ma_nv = htmlspecialchars($row["MaNhanVien"]);
                $ten_nv = htmlspecialchars($row["HoTen"]);
                $luong_cb = htmlspecialchars($row["LuongCoBan"]);
                $he_so = htmlspecialchars($row["HeSo"]);

                // Công thức tính lương (ví dụ đơn giản: Lương = Lương Cơ Bản * Hệ Số)
                $luong = $luong_cb * $he_so;
                $tong_luong += $luong;

                echo "<tr>";
                echo "<td>" . $ma_nv . "</td>";
                echo "<td>" . $ten_nv . "</td>";
                echo "<td>" . number_format($luong_cb) . "</td>";
                echo "<td>" . $he_so . "</td>";
                echo "<td>" . number_format($luong) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "<p class='total-salary'>Tổng lương toàn trường: " . number_format($tong_luong) . "</p>";

        } else {
            echo "<p>Không có dữ liệu nhân viên hoặc bảng lương.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>