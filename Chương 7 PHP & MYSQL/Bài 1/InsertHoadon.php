<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_banhang";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahd = $_POST["mahd"] ?? '';
    $makh = $_POST["makh"] ?? '';
    $mahh = $_POST["mahh"] ?? '';
    $sl = $_POST["sl"] ?? '';
    $tt = $_POST["tt"] ?? '';

    $check_makh = "SELECT * FROM KHACHHANG WHERE makh = '$makh'";
    $check_mahh = "SELECT * FROM HANGHOA WHERE mahang = '$mahh'";
    $res1 = $conn->query($check_makh);
    $res2 = $conn->query($check_mahh);

    if ($res1->num_rows == 0 || $res2->num_rows == 0) {
        echo "<script>alert('Mã khách hàng hoặc mã hàng hóa không tồn tại! Vui lòng nhập mã khác.'); history.back();</script>";
    } else {
        $insert_hd = "INSERT INTO HOADON (mahd, makh, mahang, soluong, thanhtien)
                      VALUES ('$mahd', '$makh', '$mahh', '$sl', '$tt')";
        if ($conn->query($insert_hd) === TRUE) {
            echo "<script>alert('Thêm hóa đơn thành công'); window.location.href='insertHoadon.html';</script>";
        } else {
            echo "<script>alert('Lỗi khi thêm hóa đơn: " . $conn->error . "'); history.back();</script>";
        }
    }
}

$conn->close();
?>
