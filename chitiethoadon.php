<?php
session_start();
ob_start();
error_reporting(0);
include('includes/config.php');

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
    <?php include 'includes/header.php' ?>
    <!-- menu -->
    <?php include 'includes/navbar.php' ?>

    <!-- content -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col py-2">
                    <h3>Hóa đơn chi tiết. Mã hóa đơn:<?= $_GET["mhd"] ?> </h3>
                </div>
                <hr class="hr">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá tiền (VNĐ)</th>
                        <th scope="col">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mhd = $_GET["mhd"];
                    $link = $_GET["link"];
                    $sqldanhsachsp = "SELECT * FROM `hoadonchitiet` WHERE `mahoadon`= '$mhd';";
                    $ketquadanhsachsp = $conn->query($sqldanhsachsp);
                    if ($ketquadanhsachsp->num_rows > 0) {
                        while ($row = $ketquadanhsachsp->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row["sanpham"] ?></td>
                                <td><?= $row["giatien"] ?></td>
                                <td><?= $row["soluong"] ?></td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 py-3">
                    <a type="button" href="javascript:history.back()" class="btn btn-outline-danger">Quay lại</a>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>