<?php 
	$servername = "localhost";
	$username = "root";
	$password = "12345678";
	$dbname = "familymart";
	// Tạo kết nối
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Kiểm tra kết nối
	if($conn -> connect_error){
		 die("Không thể kết nối tới Database: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");

?>