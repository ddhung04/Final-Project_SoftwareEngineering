<?php
		session_start();
        ob_start();
        error_reporting(0);
        include 'includes/config.php';
        if($_SESSION['khachhang']!=''){
            $_SESSION['khachhang']='';
        }
        if( isset($_POST['login'])){
            $taikhoan = $_POST['taikhoan'];
			$matkhau = md5($_POST['matkhau']);
			$sql = "SELECT * FROM `user` WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
			$ketqua = $conn->query($sql);
			if($ketqua->num_rows > 0){
				while($row = $ketqua->fetch_assoc())
				{
					$_SESSION["khachhang"] = $row["tennguoidung"];
					$_SESSION["taikhoan"] = $row["taikhoan"];
                    $_SESSION["quantri"] = $row["ad"];
                    $_SESSION["link"] = "";
				}
				echo "<script>alert(\"Đăng nhập thành công\"); 
					window.location.href = 'index.php';
				</script>";
			}
			else{
				echo "<script>alert(\"Sai mật khẩu hoặc tên đăng nhập\"); 
					window.location.href = 'login.php';
				</script>";
			}
			$conn->close();
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMILY MART</title>
    <link rel="shortcut icon" type="" href="img/icon.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

    body {
        font-family: 'Open Sans', sans-serif;
        font-size: 14px;
    }

    * {
        padding: 0;
        margin: 0;
    }
    </style>
</head>

<body>
    <!-- header -->
    <?php include 'includes/header.php' ?>
    <!-- menu -->
    <?php include 'includes/navbar.php' ?>

    <!-- content -->
    <section class="mylogin ">
        <div class="container h-5- w-50">
            <form method="post">
                <div class="imgcontainer">
                    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Tài khoản</b></label>
                    <input type="text2" placeholder="Nhập tài khoản" name="taikhoan" required>

                    <label for="psw"><b>Mật khẩu</b></label>
                    <input type="password" placeholder="Nhập mật khẩu" name="matkhau" required>

                    <button type="submit" name="login">Đăng nhập</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Nhớ mật khẩu
                        <div class="row"><span class="psw"><a href="register.php">Tạo tài khoản mới</a></span></div>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn">Quay lại</button>
                    <span class="psw"><a href="forgotpw.php">Quên mật khẩu?</a></span>
                </div>
            </form>
        </div>

    </section>

    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>