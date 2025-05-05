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

    $check_hd = "SELECT hd.mahd, hd.makh, kh.tenkh, hd.mahang, hd.soluong, hd.thanhtien
                 FROM HOADON hd
                 JOIN KHACHHANG kh ON kh.makh = hd.makh
                 WHERE hd.makh = '$makh'";
    $res = $conn->query($check_hd);

    if ($res->num_rows > 0) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr>
                <th>Mã HĐ</th>
                <th>Mã KH</th>
                <th>Tên KH</th>
                <th>Mã hàng</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>";
        while($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['mahd']}</td>
                    <td>{$row['makh']}</td>
                    <td>{$row['tenkh']}</td>
                    <td>{$row['mahang']}</td>
                    <td>{$row['soluong']}</td>
                    <td>{$row['thanhtien']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có hóa đơn nào cho khách hàng có mã '$makh'.";
    }   
}

$conn->close();
?>
