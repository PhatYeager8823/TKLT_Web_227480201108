<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhansu";

// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manv = $_POST["manv"] ?? '';

    if (empty($manv)) {
        echo "<script>alert('Vui lòng nhập mã nhân viên.'); history.back();</script>";
        exit();
    }

    $conn->query("DELETE FROM luong WHERE MaNhanVien = '$manv'");

    $sql = "DELETE FROM nhan_vien WHERE MaNhanVien = '$manv'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa hồ sơ thành công'); window.location.href='xoa_hoso.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa: " . $conn->error . "'); history.back();</script>";
    }
}

$conn->close();
?>
