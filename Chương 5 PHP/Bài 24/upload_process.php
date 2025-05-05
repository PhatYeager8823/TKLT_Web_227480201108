<?php
$targetDir = "BoSuuTap/"; 
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true); 
}

$uploadOk = 1;
$uploadedFiles = [];
$errorMessages = [];

if(isset($_POST["submit"]) && isset($_FILES["filesToUpload"])) {
    $totalFiles = count($_FILES["filesToUpload"]["name"]);

    for($i = 0; $i < $totalFiles; $i++) {
        $fileName = basename($_FILES["filesToUpload"]["name"][$i]);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra nếu file là ảnh
        $check = getimagesize($_FILES["filesToUpload"]["tmp_name"][$i]);
        if($check === false) {
            $errorMessages[] = "File " . htmlspecialchars($fileName) . " không phải là ảnh.";
            $uploadOk = 0;
            continue; 
        }

        if (file_exists($targetFile)) {
            $errorMessages[] = "Lỗi: File " . htmlspecialchars($fileName) . " đã tồn tại.";
            $uploadOk = 0;
            continue;
        }

        if ($_FILES["filesToUpload"]["size"][$i] > 2 * 1024 * 1024) {
            $errorMessages[] = "Lỗi: File " . htmlspecialchars($fileName) . " quá lớn (tối đa 2MB).";
            $uploadOk = 0;
            continue;
        }

        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if(!in_array($imageFileType, $allowedFormats)) {
            $errorMessages[] = "Lỗi: Định dạng file " . htmlspecialchars($fileName) . " không được cho phép (chỉ JPG, JPEG, PNG, GIF).";
            $uploadOk = 0;
            continue;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $targetFile)) {
                $uploadedFiles[] = htmlspecialchars($fileName);
            } else {
                $errorMessages[] = "Lỗi: Không thể upload file " . htmlspecialchars($fileName) . ".";
            }
        }
        $uploadOk = 1; 
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
            width: 500px;
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
        .error-list {
            color: red;
            margin-top: 10px;
            text-align: left;
        }
        .success-list {
            color: green;
            margin-top: 10px;
            text-align: left;
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
        <h2>Kết quả Upload File Ảnh</h2>
        <?php if (!empty($errorMessages)): ?>
            <div class="error-list">
                <p><b>Các lỗi đã xảy ra:</b></p>
                <ul>
                    <?php foreach ($errorMessages as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($uploadedFiles)): ?>
            <div class="success-list">
                <p><b>Các file ảnh đã được upload thành công:</b></p>
                <ul>
                    <?php foreach ($uploadedFiles as $file): ?>
                        <li><?php echo $file; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <a href="upload_form.html">Quay lại trang upload</a>
    </div>
</body>
</html>