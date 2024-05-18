<?php
session_start();
ob_start();
if (isset($_SESSION['cart'])) {
    if (isset($_GET['id'])) {
        array_splice($_SESSION['cart'],$_GET['id'],1);
    } else {
        unset($_SESSION['cart']);
    }
}
if (count($_SESSION['cart']) > 0) {
    header('location: cart.php');
} else echo "<script>alert(\"Giỏ hàng của bạn đã trống. Quay về trang chủ.\"); 
    window.location.href = 'index.php';
    </script>";