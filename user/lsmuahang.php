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
                            <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>

            <div class="row py-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Người nhận</th>
                            <th scope="col">Sdt</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Giá trị (VNĐ)</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col" style="width: 5%;">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tk = $_SESSION['taikhoan'];
                        $i = 1;
                        $sqldanhsachhd = "SELECT * FROM `hoadon` WHERE `taikhoan`='$tk'";
                        $ketquadanhsachhd = $conn->query($sqldanhsachhd);
                        if ($ketquadanhsachhd->num_rows > 0) {
                            while ($row = $ketquadanhsachhd->fetch_assoc()) {
                                $stt = $i;
                                $i++;
                        ?>
                        <tr>
                            <th scope="row"><?= $stt ?></th>
                            <td><?= $row["mahoadon"] ?></td>
                            <td><?= $row["taikhoan"] ?></td>
                            <td><?= $row["nguoinhan"] ?></td>
                            <td><?= $row["sdt"] ?></td>
                            <td><?= $row["diachinhanhang"] ?></td>
                            <td><a href="../chitiethoadon.php?mhd=<?= $row["mahoadon"] ?>"><?= $row["giatri"] ?></a>
                            </td>
                            <td><?= $row["thoigian"] ?></td>
                            <td><button type="button" class="btn btn-outline-danger"><?= $row["trangthai"] ?></button>
                            </td>
                        </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>