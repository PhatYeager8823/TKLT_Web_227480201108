<?php
$targetDir = "Tailieu/"; 
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); 
$uploadOk = 1; 
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); 

if(isset($_POST["submit"])) {
    if (file_exists($targetFile)) {
        echo "<div style='color: red;'>Lỗi: File đã tồn tại.</div>";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 5 * 1024 * 1024) {
        echo "<div style='color: red;'>Lỗi: Kích thước file quá lớn (tối đa 5MB).</div>";
        $uploadOk = 0;
    }

    $allowedFormats = array("jpg", "png", "jpeg", "gif", "pdf", "doc", "docx");
    if(!in_array($imageFileType, $allowedFormats)) {
        echo "<div style='color: red;'>Lỗi: Chỉ cho phép các định dạng: " . implode(", ", $allowedFormats) . ".</div>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<div style='color: red;'>Lỗi: File chưa được upload.</div>";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "<div style='color: green;'>File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được upload thành công vào thư mục Tailieu.</div>";
        } else {
            echo "<div style='color: red;'>Lỗi: Đã xảy ra lỗi khi upload file.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kết quả Upload File</h2>
        <?php
            if(isset($uploadOk)) {
                if ($uploadOk == 1 && isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["error"] == 0) {
                    echo "<p class='success'>File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được upload thành công vào thư mục Tailieu.</p>";
                } elseif (isset($error_message)) {
                    echo "<p class='error'>" . $error_message . "</p>";
                } elseif (isset($_FILES["fileToUpload"]["error"]) && $_FILES["fileToUpload"]["error"] != 0) {
                    echo "<p class='error'>Đã xảy ra lỗi khi upload file. Mã lỗi: " . $_FILES["fileToUpload"]["error"] . "</p>";
                } elseif ($uploadOk == 0 && !isset($_FILES["fileToUpload"]["error"])) {
                    echo "<p class='error'>File chưa được upload do các lỗi trước đó.</p>";
                }
            }
        ?>
        <a href="upload_form.html">Quay lại trang upload</a>
    </div>
</body>
</html>