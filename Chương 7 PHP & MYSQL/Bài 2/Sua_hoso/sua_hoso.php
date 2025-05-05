<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background-color: pink;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
      margin: 20px 0;
      text-align: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    fieldset {
        border: 2px solid black;
        padding: 20px;
        width: 950px; 
        background-color: white; 
        margin-bottom: 20px; 
    }

    legend {
        font-weight: bold;
        padding: 0 10px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      border: none;
      width: auto;
      background-color: transparent;
      padding: 0;
    }

    .column {
        display: flex;
        justify-content: space-between;
    }

    p {
      font-weight: bold;
      text-align: center;
    }

    .column-1, .column-2 {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .form-group label {
      width: 150px;
      text-align: left;
      font-weight: bold;
    }

    .form-group input,
    .form-group select {
      flex: 1;
      padding: 5px;
      width: 250px;
    }

    .button {
      text-align: center;
      margin-top: 25px;
      display: flex;
      justify-content: space-evenly;
    }

    .button button {
      margin: 0 10px;
      padding: 8px 14px;
      border: none;
      border-radius: 5px;
      background-color: aqua;
      font-weight: bold;
      cursor: pointer;
    }

    .button button:hover {
      background-color: rgb(0, 208, 255);
    }

    .customer-list {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .customer-list th, .customer-list td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .customer-list th {
        background-color: #f0f0f0;
    }

    .customer-list tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .customer-list tbody tr:hover {
        background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>QUẢN LÝ CÁN BỘ</h1>
    <form id="customerForm" action="insert_data.php" method="post">
        <fieldset>
            <legend>Thông tin khách hàng</legend>
            <div class="column">
                <div class="column-1">
                    <div class="form-group">
                        <label for="manv">Mã cán bộ</label>
                        <input type="text" id="manv" name="manv" required>
                    </div>

                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" id="hoten" name="hoten" required>
                    </div>

                    <div class="form-group">
                        <label for="dv">Đơn vị</label>
                        <select id="dv" name="dv">
                            <option>Khoa KT & CN</option>
                            <option>Khoa Sư phạm</option>
                            <option>Khoa NN & TS</option>
                            <option>Khoa Kinh tế và Luật</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" id="diachi" name="diachi" required>
                    </div>
                </div>

                <div class="column-2">
                    <div class="form-group">
                        <label for="gioitinh">Giới tính</label>
                        <select id="gioitinh" name="gioitinh">
                            <option>Nam</option>
                            <option>Nữ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ns">Ngày sinh</label>
                        <input type="text" id="ns" name="ns" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" id="sdt" name="sdt" required>
                    </div>

                </div>
            </div>
            <div class="button">
                <button type="button" onclick="submitForm('xuly_them_hoso.php')">Thêm</button>
                <button type="button" onclick="window.location.href='them_hoso.php'">Thoát</button>
            </div> 
        </fieldset>
    </form>

    <fieldset>
        <legend>Danh sách cán bộ</legend>
        <table class="customer-list">
            <thead>
                <tr>
                    <th>Mã cán bộ</th>
                    <th>Mã đơn vị</th>
                    <th>Họ tên</th>
                    <th>Đơn vị</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "quanlynhansu";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }
                    
                    $sql = "select * 
                            from nhan_vien nv
                            join don_vi dv on nv.MaDonVi = dv.MaDonVi";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["MaNhanVien"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["MaDonVi"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["HoTen"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["TenDonVi"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["GioiTinh"]) . "</td>";                            
                            echo "<td>" . htmlspecialchars($row["NgaySinh"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Sdt"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["DiaChi"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Không có khách hàng nào.</td></tr>";
                    }
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </fieldset>
  </div>

  <script>
    const rows = document.querySelectorAll('.customer-list tbody tr');

    rows.forEach(row => {
      row.addEventListener('click', () => {
        const cells = row.querySelectorAll('td');

        document.getElementById('manv').value = cells[0].innerText;
        document.getElementById('hoten').value = cells[2].innerText;
        document.getElementById('dv').value = cells[3].innerText;
        document.getElementById('diachi').value = cells[7].innerText;
        document.getElementById('gioitinh').value = cells[4].innerText;
        document.getElementById('ns').value = cells[5].innerText;
        document.getElementById('sdt').value = cells[6].innerText;
      });
    });

    function submitForm(actionUrl) {
      const form = document.getElementById('customerForm');
      form.action = actionUrl;
      
      if (form.reportValidity()) {
        form.submit();
      }
    }
  </script>
</body>
</html>
