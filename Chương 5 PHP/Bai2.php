<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bai2.css">
    <title>Bài 2</title>
</head>
<body>
    <div class="container">
        <form action="Bai2xuly.php" method="post">
            <label for="">Họ và tên: <input type="text" name="hoten"></label>
            <label for="">Ngày sinh: <input type="date" name="ngaysinh"></label>
            <label for="">Lớp: <input type="text" name="lop"></label>
            <label for="">Điểm: <input type="number" name="diem" step="0.1"></label>
            <input type="submit" value="Gửi" class="button">
        </form>
    </div>
    
</body>
</html>