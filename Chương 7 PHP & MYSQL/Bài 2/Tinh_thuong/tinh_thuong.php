<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính thưởng cho nhân viên (Tạm thời)</title>
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
            border-radius: 12px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
            width: 95%; 
            max-width: 1200px;
        }

        h2 {
            text-align: center;
            color: #2c3e50; 
            margin-bottom: 30px; 
        }

        .bonus-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08); 
            border-radius: 8px;
            overflow: hidden; 
            border: 1px solid #ddd; 
        }

        .bonus-table th, .bonus-table td {
            border: 1px solid #e0e0e0; 
            padding: 12px 18px; 
            text-align: left;
        }

        .bonus-table th {
            background-color: #27ae60; 
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px; 
        }

        .bonus-table tbody tr:nth-child(even) {
            background-color: #f5f5f5; 
        }

        .bonus-table tbody tr:hover {
            background-color: #d4edda; 
            transition: background-color 0.3s ease;
        }

        .total-bonus {
            margin-top: 30px;
            text-align: right;
            font-weight: bold;
            color: #e67e22; 
            font-size: 1.1em; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tính thưởng cho nhân viên (Tạm thời)</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanlynhansu";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        $sql = "SELECT nv.MaNhanVien, nv.HoTen, l.HeSo, l.LuongCoBan
                FROM nhan_vien nv
                INNER JOIN luong l ON nv.MaNhanVien = l.MaNhanVien";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table class='bonus-table'>";
            echo "<thead><tr><th>Mã NV</th><th>Tên Nhân Viên</th><th>Hệ Số Lương</th><th>Lương Cơ Bản</th><th>Mức Thưởng (Dựa trên HS)</th></tr></thead>";
            echo "<tbody>";

            $tong_thuong = 0;
            $ty_le_thuong = 0.1; // Ví dụ: Thưởng bằng 10% lương cơ bản nhân hệ số

            while ($row = mysqli_fetch_assoc($result)) {
                $ma_nv = htmlspecialchars($row["MaNhanVien"]);
                $ten_nv = htmlspecialchars($row["HoTen"]);
                $he_so_luong = htmlspecialchars($row["HeSo"]);
                $luong_cb = htmlspecialchars($row["LuongCoBan"]);

                $muc_thuong = $luong_cb * $he_so_luong * $ty_le_thuong;
                $tong_thuong += $muc_thuong;

                echo "<tr>";
                echo "<td>" . $ma_nv . "</td>";
                echo "<td>" . $ten_nv . "</td>";
                echo "<td>" . $he_so_luong . "</td>";
                echo "<td>" . number_format($luong_cb) . "</td>";
                echo "<td>" . number_format($muc_thuong) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "<p class='total-bonus'>Tổng tiền thưởng (tính tạm thời): " . number_format($tong_thuong) . "</p>";

        } else {
            echo "<p>Không có dữ liệu nhân viên hoặc bảng lương.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>