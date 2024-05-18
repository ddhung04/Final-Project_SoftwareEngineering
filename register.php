<?php
include 'includes/config.php';
session_start();
ob_start();
error_reporting(0);
if (isset($_POST['btn-reg'])) {
    $taikhoan = $_POST['taikhoan'];
    $sqlchecktk = "SELECT `taikhoan` FROM `user` WHERE `taikhoan`='$taikhoan'";
    if ($conn->query($sqlchecktk)->num_rows > 0) {
        echo "<script>alert(\"Tên tài khoản đã tồn tại. Vui lòng điền tên tài khoản khác\"); 
        window.location.href = '#.php';
                </script>";
    } else {
        if (strlen($_POST['matkhau']) > 5) {
            $matkhau = md5($_POST['matkhau']);
            $cfpw = md5($_POST['cfpw']);
            $tennguoidung = $_POST['tennguoidung'];
            $sdt = $_POST['sdt'];
            if (strlen($sdt) == 10 && strpos($sdt, 0) === 0) {
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $ad = 0;

                $sql = "INSERT INTO `user` (`tennguoidung`, `taikhoan`, `matkhau`, `sdt`, `diachi`, `email`,`ad`) VALUES ('$tennguoidung', '$taikhoan', '$matkhau', '$sdt', '$diachi', '$email','$ad');";
                if ($matkhau == $cfpw) {
                    $conn->query($sql);
                    echo "<script>alert(\"Đăng ký thành công\"); 
            window.location.href = '#.php';
                    </script>";
                } else {
                    echo "<script>alert(\"Đăng ký không thành công do nhập lại mật khẩu không chính xác\"); 
                    window.location.href = '#.php';
                </script>";
                }
            } else {
                echo "<script>alert(\"Số điện thoại phải có 10 ký tự và bắt đầu bằng số '0'\"); 
    window.location.href = '#.php';
</script>";
            }
        } else
            echo "<script>alert(\"Mật khẩu phải có ít nhất 6 ký tự\"); 
window.location.href = '#.php';
</script>";
    }
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
                    <h1>ĐĂNG KÝ</h1>
                    <p>Điền thông tin để đăng ký tài khoản khách hàng mới</p>
                    <hr>

                    <label for="tennguoidung"><b>Tên người dùng</b></label>
                    <input type="text2" placeholder="Nhập tên tài khoản" name="tennguoidung" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>

                    <label for="taikhoan"><b>Tên tài khoản</b></label>
                    <input type="text2" placeholder="Nhập email" name="taikhoan" required>

                    <label for="matkhau"><b>Mật khẩu</b></label>
                    <input type="password" minlength="6" id="password"
                        placeholder="Nhập mật khẩu(mật khẩu phải có ít nhất 6 ký tự)" name="matkhau" required>

                    <label for="cfpw"><b>Nhập lại mật khẩu</b></label>
                    <input type="password" minlength="6" id="cfpassword" placeholder="Nhập lại mật khẩu" name="cfpw"
                        required>

                    <label for="sdt"><b>Số điện thoại</b></label>
                    <input type="text2" id="sdt" minlength="10" maxlength="10"
                        placeholder="Nhập số điện thoại (số điện thoại phải bắt đầu bằng số '0' và có 10 ký tự )"
                        name="sdt" required>

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text2" placeholder="nhập địa chỉ" name="diachi" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text2" placeholder="nhập email" name="email" required>

                    <p>Bằng cách tạo một tài khoản, bạn đồng ý với <a href="#" style="color:dodgerblue">Điều khoản & Bảo
                            mật</a>.</p>

                    <div class="clearfix">
                        <a href="login.php"><button type="button" class="cancelbtn">Quay LẠI</button></a>
                        <button type="submit" class="signupbtn" name="btn-reg">ĐĂNG KÝ</button>
                    </div>
                </div>
            </form>
            <script>
            var password = document.getElementById('password').value;
            var cfpassword = document.getElementById('cfpassword').value;
            var sdt = document.getElementById('sdt').value;
            if (strlen(password) < 6) {
                alert('mật khẩu phải có ít nhất 6 ký tự.');
            }
            </script>
        </div>

    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>