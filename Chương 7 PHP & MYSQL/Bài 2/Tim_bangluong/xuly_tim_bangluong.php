<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhansu";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

echo "<style>
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

    .no-result {
        color: red;
        font-style: italic;
        margin-top: 20px;
        text-align: center;
    }

    .error {
        color: orange;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }
</style>";

if (isset($_GET['manv'])) {
    $manv = mysqli_real_escape_string($conn, $_GET['manv']);

    $sql = "SELECT * FROM luong WHERE MaNhanVien = '$manv'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='salary-table'>";
        echo "<thead><tr><th>Mã Lương</th><th>Mã Nhân Viên</th><th>Tháng</th><th>Năm</th><th>Số Giờ Làm</th><th>Lương Cơ Bản</th><th>Hệ Số</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["MaLuong"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["MaNhanVien"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Thang"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Nam"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["SoGioLam"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["LuongCoBan"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["HeSo"]) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='no-result'>Không tìm thấy thông tin bảng lương cho mã nhân viên: " . htmlspecialchars($manv) . "</p>";
    }

    mysqli_free_result($result);
} else {
    echo "<p class='error'>Vui lòng nhập mã nhân viên để tìm kiếm.</p>";
}

mysqli_close($conn);
?>