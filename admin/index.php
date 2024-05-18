<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('../includes/config.php');
if (strlen($_SESSION['khachhang']) == !null && $_SESSION["quantri"] == 0) {
    echo "<script>alert(\"bạn không đủ quyền để tiếp tục. Quay về trang chủ.\"); 
    window.location.href = '../index.php';
    </script>";
} else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMILY MART</title>
    <link rel="shortcut icon" type="" href="../img/icon.png" />
    <link rel="stylesheet" href="styleadmin.css">
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
                            <li class="breadcrumb-item active" aria-current="page">Quản lý cửa hàng</li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>
            <div class="row py-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Thống kê</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlysanpham.php">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlytaikhoan.php">Tài khoản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlyhoadon.php">Hóa đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlytintuc.php">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlylienhe.php">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlynhacungcap.php">Nhà cung cấp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlygiamgia.php">Giảm giá</a>
                    </li>
                </ul>

                <div class="row py-2">
                    <div class="row">
                        <div class="col-4">
                            <div id="list-example" class="list-group">
                                <a class="list-group-item list-group-item-action" href="#list-item-1">Tổng doanh thu</a>
                                <a class="list-group-item list-group-item-action" href="#list-item-2">Sản phẩm bán
                                    chạy</a>
                                <a class="list-group-item list-group-item-action" href="#list-item-3">Thống kê doanh
                                    thu</a>
                                <a class="list-group-item list-group-item-action" href="#list-item-4">Khác</a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true"
                                class="scrollspy-example" tabindex="0">
                                <h4 id="list-item-1">Tổng doanh thu</h4>
                                <p>
                                <div class="col-md-6">
                                    <?php
                                        $sqlmhd = "SELECT SUM(`giatri`) AS doanhthu FROM `hoadon` WHERE `trangthai`= 'Đã nhận hàng'";
                                        $mhd = $conn->query($sqlmhd);
                                        if ($row = $mhd->fetch_assoc()) {
                                            $doanhthu = $row["doanhthu"];
                                        }
                                        ?>
                                    <button type="button" class="btn btn-outline-success">Tổng doanh
                                        thu:<?= $doanhthu ?> (VNĐ) </button>
                                </div>
                                </p>
                                <h4 id="list-item-2">Sản phẩm bán chạy</h4>
                                <p>
                                <div class="row">
                                    <div class="col">
                                        <h5>Sản phẩm bán chạy trong ngày</h5>
                                        <br><br>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Số lượng bán ra</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $Y = date('Y');
                                                    $M = date('m');
                                                    $sqltksp = "SELECT  `tensp`, `soluongban` FROM `spbanchay` WHERE YEAR(`thoigian`)='$Y' AND MONTH(`thoigian`)='$M'   ORDER BY `soluongban` DESC limit 5";
                                                    $list = $conn->query($sqltksp);
                                                    while ($row = $list->fetch_assoc()) {
                                                    ?>
                                                <tr>
                                                    <th scope="row"><?= $row["tensp"] ?></th>
                                                    <td><?= $row["soluongban"] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <h5>Tra cứu sản phẩm bán chạy trong</h5>
                                        <form class="py-3" method="post">
                                            <div class="row">
                                                <div class="col-md-5"><input type="date" name="thoigiantc"
                                                        id="thoigian"></div>
                                                <div class="col-md-2"> <button type="submit" name="tracuuspbanchay"
                                                        class="btn btn-primary"><i
                                                            class="fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Số lượng bán ra</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (isset($_POST['tracuuspbanchay'])) {
                                                        $thoigiantc = $_POST['thoigiantc'];
                                                        $sqltracuuspbanchay = "SELECT  `tensp`, `soluongban` FROM `spbanchay` WHERE `thoigian`='$thoigiantc'   ORDER BY `soluongban` DESC limit 5";
                                                        $tcsp = $conn->query($sqltracuuspbanchay);
                                                        while ($row = $tcsp->fetch_assoc()) { ?>
                                                <tr>
                                                    <th scope="row"><?= $row["tensp"] ?></th>
                                                    <td><?= $row["soluongban"] ?></td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>

                                </p>
                                <h4 id="list-item-3">Doanh thu tháng này</h4>
                                <p>
                                    <?php
                                        $thang = date('m');
                                        $sqlhoadonban = "SELECT SUM(`giatri`) AS doanhthuthang FROM `hoadon` WHERE `trangthai`='Đã nhận hàng' AND MONTH(`thoigian`)= '$thang';";
                                        $hoadonban = $conn->query($sqlhoadonban);
                                        if ($row = $hoadonban->fetch_assoc()) {
                                            $doanhthuthang = $row["doanhthuthang"];
                                        }
                                        ?>
                                    <button type="button" class="btn btn-outline-success">Tổng doanh thu tháng
                                        <?= $thang ?>:<?= $doanhthuthang ?> (VNĐ) </button>
                                <h4>Tra cứu doanh thu </h4>
                                <form class="py-3" method="post">
                                    <div class="row">
                                        <div class="col-md-3"><input type="date" name="thoigian" id="thoigian"></div>
                                        <div class="col-md-1"> <button type="submit" name="tracuu"
                                                class="btn btn-primary"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['tracuu'])) {
                                        $thoigiantc = $_POST['thoigian'];
                                        $sqltracuu = "SELECT SUM(`giatri`) AS doanhthutc FROM `hoadon` WHERE `trangthai`='Đã nhận hàng' AND `thoigian`= '$thoigiantc'";
                                        $dttc = $conn->query($sqltracuu);
                                        $row = $dttc->fetch_assoc();
                                        $doanhthutracuu = $row["doanhthutc"]; ?>
                                <button type="button" class="btn btn-outline-warning">Doanh thu ngày
                                    <?= $thoigiantc ?>:<?= $doanhthutracuu ?> (VNĐ) </button>
                                <?php
                                    }
                                    ?>


                                </p>
                                <h4 id="list-item-4">Khác</h4>
                                <p>
                                <div class="row py-2">
                                    <div class="col-md-4">
                                        <?php
                                            $sqllh = "SELECT * FROM `lienhe` WHERE `trangthai`= 'Đã tiếp nhận'";
                                            $sllh = $conn->query($sqllh)->num_rows; ?>
                                        <button type="button" class="btn btn-outline-info">Liên hệ mới:<?= $sllh ?>
                                        </button>
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php } ?>