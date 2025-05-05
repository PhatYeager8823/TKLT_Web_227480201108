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
    $makh = $_POST["makh"] ?? '';

    $check_makh = "SELECT * FROM KHACHHANG WHERE makh = '$makh'";
    $res = $conn->query($check_makh);

    if ($res->num_rows == 0) {
        echo "<script>alert('Mã khách hàng không tồn tại!'); history.back();</script>";
    } else {
        $delete_kh = "DELETE FROM KHACHHANG WHERE makh = '$makh'";
        if ($conn->query($delete_kh) === TRUE) {
            echo "<script>alert('Xóa khách hàng thành công'); window.location.href='deleteKhachhang.html';</script>";
        } else {
            echo "<script>alert('Lỗi khi xóa khách hàng: " . $conn->error . "'); history.back();</script>";
        }
    }
}

$conn->close();
?>
