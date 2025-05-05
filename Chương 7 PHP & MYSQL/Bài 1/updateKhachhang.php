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
    $tenkh = $_POST["tenkh"] ?? '';
    $ns = $_POST["ns"] ?? '';
    $sdt = $_POST["sdt"] ?? '';
    $dc = $_POST["dc"] ?? '';

    $check_makh = "SELECT * FROM KHACHHANG WHERE makh = '$makh'";
    $res = $conn->query($check_makh);

    if ($res->num_rows == 0) {
        echo "<script>alert('Mã khách hàng không tồn tại! Vui lòng nhập mã khác.'); history.back();</script>";
    } else {
        $update_kh = "update KHACHHANG 
                    set makh = '$makh', tenkh = '$tenkh', namsinh = '$ns', dienthoai = '$sdt', diachi = '$dc'
                    where makh = '$makh'";
        if ($conn->query($update_kh) === TRUE) {
            echo "<script>alert('Cập nhật khách hàng thành công'); window.location.href='updateKhachhang.html';</script>";
        } else {
            echo "<script>alert('Lỗi khi cập nhật khách hàng: " . $conn->error . "'); history.back();</script>";
        }
    }
}

$conn->close();
?>
