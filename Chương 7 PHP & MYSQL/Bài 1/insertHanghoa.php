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
    $mahh = $_POST["mahh"] ?? '';
    $mansx = $_POST["mansx"] ?? '';
    $tenhh = $_POST["tenhh"] ?? '';
    $namsx = $_POST["namsx"] ?? '';
    $gia = $_POST["gia"] ?? '';

    $check_mahh = "SELECT * FROM HANGHOA WHERE mahang = '$mahh'";
    $check_mansx = "SELECT * FROM NHASANXUAT WHERE mansx = '$mansx'";
    $res1 = $conn->query($check_mahh);
    $res2 = $conn->query($check_mansx);

    if ($res1->num_rows > 0) {
        echo "<script>alert('Mã hàng hóa đã tồn tại! Vui lòng nhập mã khác.'); history.back();</script>";
    } else if ($res2->num_rows == 0) {
        echo "<script>alert('Mã nhà sản xuất không tồn tại! Vui lòng nhập mã khác.'); history.back();</script>";
    } else {
        $insert_hh = "INSERT INTO HANGHOA (mahang, tenhang, mansx, namsx, gia)
                      VALUES ('$mahh', '$tenhh', '$mansx', '$namsx', '$gia')";
        if ($conn->query($insert_hh) === TRUE) {
            echo "<script>alert('Thêm hàng hóa thành công'); window.location.href='insertHanghoa.html';</script>";
        } else {
            echo "<script>alert('Lỗi khi thêm hàng hóa: " . $conn->error . "'); history.back();</script>";
        }
    }
}

$conn->close();
?>
