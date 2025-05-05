<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhansu";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manv = $_POST["manv"] ?? '';
    $hoten = $_POST["hoten"] ?? '';
    $dv = $_POST["dv"] ?? '';
    $gioitinh = $_POST["gioitinh"] ?? '';
    $ns = $_POST["ns"] ?? '';
    $sdt = $_POST["sdt"] ?? '';
    $diachi = $_POST["diachi"] ?? '';

    // Kiểm tra mã nhân viên đã tồn tại chưa
    $check_sql = "SELECT * FROM nhan_vien WHERE MaNhanVien = '$manv'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Mã nhân viên đã tồn tại! Vui lòng nhập mã khác.'); history.back();</script>";
    } else {
        $get_madv_sql = "SELECT MaDonVi FROM don_vi WHERE TenDonVi = '$dv' LIMIT 1";
        $dv_result = $conn->query($get_madv_sql);

        if ($dv_result->num_rows > 0) {
            $row = $dv_result->fetch_assoc();
            $madv = $row['MaDonVi'];

            // Thêm nhân viên với mã đơn vị lấy được
            $insert_nv = "INSERT INTO nhan_vien (MaNhanVien, HoTen, NgaySinh, GioiTinh, DiaChi, Sdt, MaDonVi)
                          VALUES ('$manv', '$hoten', '$ns', '$gioitinh', '$diachi', '$sdt', '$madv')";

            if ($conn->query($insert_nv) === TRUE) {
                echo "<script>alert('Thêm nhân viên thành công'); window.location.href='them_hoso.php';</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm nhân viên: " . $conn->error . "'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Tên đơn vị không tồn tại! Vui lòng chọn lại.'); history.back();</script>";
        }
    }
}

$conn->close();
?>
