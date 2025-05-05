<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm bảng lương</title>
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
    <h1>QUẢN LÝ LƯƠNG NHÂN VIÊN</h1>
    <form id="salaryForm" action="xuly_them_bangluong.php" method="post">
        <fieldset>
            <legend>Thông tin bảng lương</legend>
            <div class="column">
                <div class="column-1">
                    <div class="form-group">
                        <label for="manv">Mã nhân viên</label>
                        <input type="number" id="manv" name="manv" required>
                    </div>

                    <div class="form-group">
                        <label for="thang">Tháng</label>
                        <input type="number" id="thang" name="thang" min="1" max="12" required>
                    </div>

                    <div class="form-group">
                        <label for="nam">Năm</label>
                        <input type="number" id="nam" name="nam" required>
                    </div>
                </div>

                <div class="column-2">
                    <div class="form-group">
                        <label for="sogiolam">Số giờ làm</label>
                        <input type="number" id="sogiolam" name="sogiolam" required>
                    </div>

                    <div class="form-group">
                        <label for="luongcb">Lương cơ bản</label>
                        <input type="number" id="luongcb" name="luongcb" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="heso">Hệ số</label>
                        <input type="number" id="heso" name="heso" step="0.01" required>
                    </div>
                </div>
            </div>
            <div class="button">
                <button type="button" onclick="submitForm('xuly_them_bangluong.php')">Thêm</button>
                <button type="button" onclick="window.location.href='them_bangluong.php'">Thoát</button>
            </div> 
        </fieldset>
    </form>

    <fieldset>
        <legend>Danh sách bảng lương</legend>
        <table class="customer-list">
            <thead>
                <tr>
                    <th>Mã lương</th>
                    <th>Mã nhân viên</th>
                    <th>Tháng</th>
                    <th>Năm</th>
                    <th>Số giờ làm</th>
                    <th>Lương cơ bản</th>
                    <th>Hệ số</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = new mysqli("localhost", "root", "", "quanlynhansu");
                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM luong";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["MaLuong"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["MaNhanVien"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Thang"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["Nam"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["SoGioLam"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["LuongCoBan"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["HeSo"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Không có dữ liệu lương.</td></tr>";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
    </fieldset>
  </div>

  <script>
    function submitForm(actionUrl) {
      const form = document.getElementById('salaryForm');
      form.action = actionUrl;
      if (form.reportValidity()) {
        form.submit();
      }
    }
  </script>
</body>
</html>
