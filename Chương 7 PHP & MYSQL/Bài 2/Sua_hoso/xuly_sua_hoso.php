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
    $dv = $_POST["dv"] ?? '';  
    $hoten = $_POST["hoten"] ?? '';
    $gioitinh = $_POST["gioitinh"] ?? '';
    $ns = $_POST["ns"] ?? '';
    $sdt = $_POST["sdt"] ?? '';
    $diachi = $_POST["diachi"] ?? '';

    if (!empty($dv)) {
        $sql = "SELECT MaDonVi FROM don_vi WHERE TenDonVi = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dv);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $madv = $row['MaDonVi'];
        } else {
            echo "<script>alert('Tên đơn vị không tồn tại.'); history.back();</script>";
            exit();
        }
        $stmt->close();
    } else {
        echo "<script>alert('Vui lòng nhập tên đơn vị.'); history.back();</script>";
        exit();
    }

    $update_sql = "UPDATE nhan_vien 
                   SET HoTen = ?, NgaySinh = ?, GioiTinh = ?, DiaChi = ?, Sdt = ?, MaDonVi = ?
                   WHERE MaNhanVien = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssssi", $hoten, $ns, $gioitinh, $diachi, $sdt, $madv, $manv);

    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật hồ sơ thành công'); window.location.href='sua_hoso.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật: " . $stmt->error . "'); history.back();</script>";
    }

    $stmt->close();
}

$conn->close();
?>
