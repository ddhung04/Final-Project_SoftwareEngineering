<?php
session_start();
ob_start();
include('../includes/config.php');

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
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
                    <div class="col-md-6 userForm">

                        <div class="py-1">
                            <label>Tên khách hàng:</label>
                            <?php echo $row["tennguoidung"]; ?>
                        </div>
                        <div class="py-1">
                            <label>Số điện thoại:</label>
                            <?php echo $row["sdt"] ?>
                        </div>

                        <div class="py-1">
                            <label>Địa chỉ:</label>
                            <?php echo $row["diachi"] ?>
                        </div>
                        <div class="py-1">
                            <label>Email:</label>
                            <?php echo $row["email"] ?>
                        </div>
                        <div class="py-1">
                            <label><a href="lsmuahang.php">Xem lịch sử đặt hàng</a></label>

                        </div>
                        <div class="row pt-3">
                            <div class="col"><a href="suathongtin.php"><button type="button" class="btn">Sửa thông tin</button></a></div>
                            <div class="col"><a href="doimatkhau.php"><button type="button" class="btn">Đổi mật khẩu</button></a></div>
                        </div>

                    </div>
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