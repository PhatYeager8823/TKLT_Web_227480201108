<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlynhansu";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "select * from nhan_vien";
    $res = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        fieldset {
            border: 2px solid black;
            padding: 20px;
            width: 950px; 
            background-color: white; 
            margin-bottom: 20px; 
            display: flex;
            align-items: center;
        }

        legend {
            font-weight: bold;
            font-size: 20px;
            padding: 0 10px;
        }

        .nhanvien-list {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        }

        .nhanvien-list th, .nhanvien-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .nhanvien-list th {
            background-color: #f0f0f0;
        }

        .nhanvien-list tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .nhanvien-list tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Danh sách cán bộ</legend>
        <table class="nhanvien-list">
            <thead>
                <tr>
                    <th>Mã nhân viên</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Mã đơn vị</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (mysqli_num_rows($res) > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["MaNhanVien"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["HoTen"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["NgaySinh"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["GioiTinh"]) . "</td>";                            
                            echo "<td>" . htmlspecialchars($row["DiaChi"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Sdt"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["MaDonVi"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Không có cán bộ nào.</td></tr>";
                    }
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </fieldset>

</body>
</html>