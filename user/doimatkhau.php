<?php
session_start();
ob_start();
include('../includes/config.php');

    $taikhoan = $_SESSION['taikhoan'];
    $sqlpw = "SELECT `matkhau` FROM `user` WHERE `taikhoan`='$taikhoan'";
    $pw = $conn->query($sqlpw)->fetch_assoc();
    if (isset($_POST['change'])) {
        $oldpw = md5($_POST['oldpw']);
        $cfpw = md5($_POST['cfpw']);
        $newpw = md5($_POST['newpw']);
        $sql = "UPDATE `user` SET `matkhau`='$newpw' WHERE `taikhoan`='$taikhoan' ";
        if ($pw["matkhau"] == $oldpw) {
            if ($newpw == $cfpw) {
                $conn->query($sql);
                echo "<script>alert(\"Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại\"); 
                window.location.href = 'logout.php';
            </script>";
            } else {
                echo "<script>alert(\"Thay đổi mật khẩu không thành công do Xác nhận mật khẩu không chính xác\"); 
                window.location.href = '#.php';
            </script>";
            }
        } else {
            echo "<script>alert(\"Thay đổi mật khẩu không thành công do sai mật khẩu cũ\"); 
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
    <link rel="stylesheet" href="styleUser.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
    <?php include 'header.php' ?>
    <!-- menu -->
    <?php include 'navbar.php' ?>

    <!-- content -->
    <section class="userprofile my-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="profile.php">Thông tin tài khoản</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>

            <div class="row py-3">
                <div class="col-md-3"></div>
                <form class="col-md-6 userForm" method="post">
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="oldpw" name="oldpw" placeholder="" required>
                            <label for="oldpw">Nhập mật cũ:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="newpw" name="newpw" placeholder="" required>
                            <label for="newpw">Nhập mật khẩu mới:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="cfpw" name="cfpw" placeholder="" required>
                            <label for="cfpw">Nhập lại mật khẩu:</label>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col"><button type="submit" class="btn" name="change">Đổi mật khẩu</button></div>
                        <div class="col"><a href="profile.php"><button type="button" class="btn">Quay lại</button></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>