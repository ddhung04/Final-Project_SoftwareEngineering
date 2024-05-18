<?php
include 'includes/config.php';
session_start();
ob_start();
error_reporting(0);
if (isset($_POST['btn-reg'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = md5($_POST['matkhau']);
    $cfpw = md5($_POST['cfpw']);
    $email = $_POST['email'];
    $sql = "SELECT * FROM `user` WHERE taikhoan = '$taikhoan' AND email = '$email'";
    $ketqua = $conn->query($sql);
    if ($ketqua->num_rows > 0) {
        $sqlqmk = "UPDATE `user` SET `matkhau`='$matkhau' WHERE taikhoan = '$taikhoan' AND email = '$email'";
        if ($matkhau == $cfpw) {
            $conn->query($sqlqmk);
            echo "<script>alert(\"Lấy lại mật khẩu thành công\"); 
                        window.location.href = 'index.php';
                    </script>";
        } else {
            echo "<script>alert(\"Xác nhận mật khẩu không trùng khớp. vui lòng nhập lại.\"); 
            </script>";
        }
    } else {
        echo "<script>alert(\"Sai email hoặc tên đăng nhập\"); 
				</script>";
    }
    $sql = "INSERT INTO `user` (`tennguoidung`, `taikhoan`, `matkhau`, `sdt`, `diachi`, `email`,`ad`) VALUES ('$tennguoidung', '$taikhoan', '$matkhau', '$sdt', '$diachi', '$email','$ad');";
    if ($matkhau == $cfpw) {
        $conn->query($sql);
        echo "<script>alert(\"Đăng ký thành công\"); 
					window.location.href = 'index.php';
				</script>";
    } else {
        echo "<script>alert(\"Đăng ký không thành công do nhập lại mật khẩu không chính xác\"); 
                window.location.href = '#.php';
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
    <section class="mysignup ">
        <div class="container h-5- w-50">
            <form method="post">
                <div class="container">
                    <h1>QUÊN MẬT KHẨU</h1>
                    <p>Điền thông tin để lấy lại tài khoản của bạn</p>
                    <hr>
                    <label for="taikhoan"><b>Tên tài khoản</b></label>
                    <input type="text2" placeholder="Nhập tên tài khoản của bạn" name="taikhoan" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text2" placeholder="Nhập email của tài khoản" name="email" required>

                    <label for="matkhau"><b>Mật khẩu</b></label>
                    <input type="password" placeholder="Nhập mật khẩu mới" name="matkhau" required>

                    <label for="cfpw"><b>Nhập lại mật khẩu</b></label>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="cfpw" required>
                    <div class="clearfix">
                        <a href="login.php"><button type="button" class="cancelbtn">Quay LẠI</button></a>
                        <button type="submit" class="signupbtn" name="btn-reg">LẤY LẠI MẬT KHẨU</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>