<?php
    $servername = "localhost";   
    $username = "root";          
    $password = "";              
    $dbname = "ql_banhang";  

    $conn = new mysqli($servername, username, password, dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    echo "Kết nối thành công!";
?>