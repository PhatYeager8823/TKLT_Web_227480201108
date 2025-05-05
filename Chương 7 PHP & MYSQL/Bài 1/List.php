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
    $hh = "SELECT * FROM HANGHOA";
    $res1 = $conn->query($hh);

    $kh = "SELECT * FROM KHACHHANG";
    $res2 = $conn->query($kh);

    $nsx = "SELECT * FROM NHASANXUAT";
    $res3 = $conn->query($nsx);

    $hd = "SELECT * FROM HOADON";
    $res4 = $conn->query($hd);

    switch ($_POST["list"]) {
        case "Hàng hóa":
            if ($res1->num_rows > 0) {
                echo "<h2 style='text-align: center;'>DANH SÁCH HÀNG HÓA</h2>";
                echo "<table border='1' cellpadding='10' cellspacing='0' style='margin: auto; text-align: center;'>";
                echo "<tr>
                        <th>Mã hàng hóa</th>
                        <th>Tên hàng hóa</th>
                        <th>Mã nhà sản xuất</th>
                        <th>Năm sản xuất</th>
                        <th>Giá</th>
                      </tr>";

                $tongHH = 0;
                $countNSX = [];

                while($row = $res1->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['mahang']}</td>
                            <td>{$row['tenhang']}</td>
                            <td>{$row['mansx']}</td>
                            <td>{$row['namsx']}</td>
                            <td>{$row['gia']}</td>
                          </tr>";
                    $tongHH++;
                    $countNSX[$row['mansx']] = ($countNSX[$row['mansx']] ?? 0) + 1;
                }
                echo "</table>";

                echo "<p style='text-align: center; margin-top: 10px;'><strong>Danh sách gồm có {$tongHH} mặt hàng</strong>, trong đó:</p>";
                
                // Gọi tên NSX từ bảng NHASANXUAT
                $tenNSX = [];
                $resultNSX = $conn->query("SELECT * FROM NHASANXUAT");
                while ($row = $resultNSX->fetch_assoc()) {
                    $tenNSX[$row['mansx']] = $row['tennsx'];
                }

                echo "<ul style='text-align: center; list-style: none; padding: 0;'>";
                foreach ($countNSX as $mansx => $count) {
                    $name = $tenNSX[$mansx] ?? $mansx;
                    echo "<li>Nhà sản xuất <strong>{$name}</strong> có: <strong>{$count}</strong></li>";
                }
                echo "</ul>";
            } else {
                echo "<p style='text-align: center;'>Không có hàng hóa nào trong cơ sở dữ liệu.</p>";
            } 
            break;

        case "Khách hàng":
            if ($res2->num_rows > 0) {
                echo "<h2 style='text-align: center;'>DANH SÁCH KHÁCH HÀNG</h2>";
                echo "<table border='1' cellpadding='10' cellspacing='0' style='margin: auto; text-align: center;'>";
                echo "<tr>
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Năm sinh</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                      </tr>";

                $tongKH = 0;
                $diaChiDem = [];
                      
                while($row = $res2->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['makh']}</td>
                            <td>{$row['tenkh']}</td>
                            <td>{$row['namsinh']}</td>
                            <td>{$row['dienthoai']}</td>
                            <td>{$row['diachi']}</td>
                          </tr>";
                    $tongKH++;
                    $diaChiDem[$row['diachi']] = ($diaChiDem[$row['diachi']] ?? 0) + 1;
                          
                }
                echo "</table>";

                echo "<p style='text-align: center; margin-top: 10px;'><strong>Danh sách có {$tongKH} khách hàng</strong>, phân bố theo địa chỉ như sau:</p>";
                echo "<ul style='text-align: center; list-style: none; padding: 0;'>";
                foreach ($diaChiDem as $diachi => $count) {
                    echo "<li><strong>{$diachi}</strong>: {$count} khách</li>";
                }
                echo "</ul>";                

            } else {
                echo "<p style='text-align: center;'>Không có khách hàng nào trong cơ sở dữ liệu.</p>";
            }  
            break;

        case "Nhà sản xuất":
            if ($res3->num_rows > 0) {
                echo "<h2 style='text-align: center;'>DANH SÁCH NHÀ SẢN XUẤT</h2>";
                echo "<table border='1' cellpadding='10' cellspacing='0' style='margin: auto; text-align: center;'>";
                echo "<tr>
                        <th>Mã nhà sản xuất</th>
                        <th>Tên nhà sản xuất</th>
                        <th>Quốc gia</th>
                      </tr>";

                $tongNSX = 0;
                $dsQuocGia = [];

                while($row = $res3->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['mansx']}</td>
                            <td>{$row['tennsx']}</td>
                            <td>{$row['quocgia']}</td>
                          </tr>";
                    $tongNSX++;
                    $dsQuocGia[$row['quocgia']] = true;
                }
                echo "</table>";

                $soQuocGia = count($dsQuocGia);
                echo "<p style='text-align: center; margin-top: 10px;'><strong>Danh sách gồm {$tongNSX} nhà sản xuất</strong> đến từ <strong>{$soQuocGia} quốc gia khác nhau</strong>.</p>";
            } else {
                echo "<p style='text-align: center;'>Không có nhà sản xuất nào trong cơ sở dữ liệu.</p>";
            }
            break; 

        case "Hóa đơn":
            if ($res4->num_rows > 0) {
                echo "<h2 style='text-align: center;'>DANH SÁCH HÓA ĐƠN</h2>";
                echo "<table border='1' cellpadding='10' cellspacing='0' style='margin: auto; text-align: center;'>";
                echo "<tr>
                        <th>Mã hóa đơn</th>
                        <th>Mã khách hàng</th>
                        <th>Mã hàng hóa</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                      </tr>";

                $tongHD = 0;
                $tongTien = 0;

                while($row = $res4->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['mahd']}</td>
                            <td>{$row['makh']}</td>
                            <td>{$row['mahang']}</td>
                            <td>{$row['soluong']}</td>
                            <td>{$row['thanhtien']}</td>
                          </tr>";
                    $tongHD++;
                    $tongTien += $row['thanhtien'];
                }
                echo "</table>";

                $tongTienFormat = number_format($tongTien, 0, ',', '.');
                echo "<p style='text-align: center; margin-top: 10px;'><strong>Danh sách gồm {$tongHD} hóa đơn.</strong> Tổng doanh thu là: <strong>{$tongTienFormat} VNĐ</strong>.</p>";
            } else {
                echo "<p style='text-align: center;'>Không có hóa đơn nào trong cơ sở dữ liệu.</p>";
            } 
            break;

        default:
            echo "Không có giá trị hợp lệ!";  
    }
}

$conn->close();
?>
