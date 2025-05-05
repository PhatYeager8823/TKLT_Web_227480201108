<!DOCTYPE html>
<html>
<head>
    <title>Hiển thị Cấu trúc Bảng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Bảng Số và Bình Phương</h2>

    <table>
        <thead>
            <tr>
                <th>n</th>
                <th>n<sup>2</sup></th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i <= 50; $i++) {
                    $square = $i * $i;
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $square . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>