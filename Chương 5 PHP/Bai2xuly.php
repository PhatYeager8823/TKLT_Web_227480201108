<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST["hoten"] ?? '';
    $ngaysinh = $_POST["ngaysinh"] ?? '';
    $lop = $_POST["lop"] ?? '';
    $diem = $_POST["diem"] ?? '';

    echo "Họ và tên: $hoten<br>";
    echo "Ngày sinh: $ngaysinh<br>";
    echo "Lớp: $lop<br>";
    echo "Điểm: $diem";
}
?>