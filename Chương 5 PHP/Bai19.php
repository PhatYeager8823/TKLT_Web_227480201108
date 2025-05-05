<?php
date_default_timezone_set('Asia/Ho_Chi_Minh'); 

if (isset($_COOKIE['last_visit'])) {
    $lastVisit = $_COOKIE['last_visit'];
    echo "Lần truy cập trước của bạn là: <strong>$lastVisit</strong><br>";
} else {
    echo "Đây là lần đầu bạn truy cập trang này.<br>";
}

$currentVisit = date("H:i:s d/m/Y");
setcookie("last_visit", $currentVisit, time() + 600); 

echo "Thời gian truy cập hiện tại được lưu là: <strong>$currentVisit</strong>";
?>
