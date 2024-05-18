<?php
session_start();
ob_start();
include('../includes/config.php');

if (isset($_POST['update'])) {
    $tennguoidung = $_POST['tennguoidung'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $sql = "UPDATE `user` SET `tennguoidung`='$tennguoidung',`sdt`='$sdt',`diachi`='$diachi',`email`='$email' WHERE `taikhoan`='$_SESSION[taikhoan]'";
    $conn->query($sql);
    echo "<script>alert(\"Cập nhật thông tin thành công, vui lòng đăng nhập lại để xem thông tin đã chỉnh Sửa\"); 
                window.location.href = '../user/logout.php';
            </script>";
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
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh Sửa thông tin</li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>

            <div class="row py-3">
                <?php
                $kh = $_SESSION['khachhang'];
                $sql = "SELECT `tennguoidung`,`sdt`,`diachi`,`email` FROM `user` WHERE `tennguoidung`= '$kh';";
                $ketqua = $conn->query($sql);
                while ($row = $ketqua->fetch_assoc()) {
                ?>
                <div class="col-md-3"></div>
                <form class="col-md-6 userForm" method="post">
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tennd" name="tennguoidung" placeholder=""
                                value="<?php echo $row["tennguoidung"]; ?>">
                            <label for="tennd">Tên người dùng:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="sdt" name="sdt" placeholder=""
                                value="<?php echo $row["sdt"]; ?>">
                            <label for="sdt">Số điện thoại:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder=""
                                value="<?php echo $row["diachi"]; ?>">
                            <label for="diachi">Địa chỉ:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder=""
                                value="<?php echo $row["email"]; ?>">
                            <label for="email">Email:</label>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col"><button type="submit" class="btn" name="update">Sửa thông tin</button></div>
                        <div class="col"><a href="profile.php"><button type="button" class="btn">Quay lại</button></a>
                        </div>
                    </div>

                </form>
                <?php
                }

                ?>
            </div>
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>