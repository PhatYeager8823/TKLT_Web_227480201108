<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlynhansu";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if (isset($_POST['manv']) && isset($_POST['thang']) && isset($_POST['nam']) && isset($_POST['sogiolam']) && isset($_POST['luongcb']) && isset($_POST['heso'])) {
    $manv = mysqli_real_escape_string($conn, $_POST['manv']);
    $thang = mysqli_real_escape_string($conn, $_POST['thang']);
    $nam = mysqli_real_escape_string($conn, $_POST['nam']);
    $soGio = mysqli_real_escape_string($conn, $_POST['sogiolam']);
    $luongcb = mysqli_real_escape_string($conn, $_POST['luongcb']);
    $heso = mysqli_real_escape_string($conn, $_POST['heso']);

    $sql = "INSERT INTO luong (MaNhanVien, Thang, Nam, SoGioLam, LuongCoBan, HeSo)
            VALUES ('$manv', $thang, $nam, $soGio, $luongcb, $heso)";

    if (mysqli_query($conn, $sql)) {
        echo "Thêm bảng lương thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Lỗi: Vui lòng điền đầy đủ thông tin.";
}

mysqli_close($conn);
?>