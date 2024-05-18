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
                        <a class="nav-link " href="index.php">Thống kê</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlysanpham.php">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlytaikhoan.php">Tài khoản</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Hóa đơn</a>
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
                <div class="py-3">
                    <div class="row">
                        <div class="col">
                            <?php
                                $sqldg = "SELECT * FROM `hoadon` WHERE `trangthai`= 'Đã nhận hàng'";
                                $sldg = $conn->query($sqldg)->num_rows; ?>
                            <button type="button" class="btn btn-outline-success">Đơn hàng đã giao:<?= $sldg ?>
                            </button>
                        </div>
                        <div class="col">
                            <?php
                                $sqlvc = "SELECT * FROM `hoadon` WHERE `trangthai`= 'Đang vận chuyển'";
                                $slvc = $conn->query($sqlvc)->num_rows; ?>
                            <button type="button" class="btn btn-outline-warning">Đơn hàng đang vận chuyển:<?= $slvc ?>
                            </button>
                        </div>
                        <div class="col">
                            <?php
                                $sqlbh = "SELECT * FROM `hoadon` WHERE `trangthai`= 'Hủy'";
                                $slbh = $conn->query($sqlbh)->num_rows; ?>
                            <button type="button" class="btn btn-outline-danger">Đơn hàng bị hủy:<?= $slbh ?> </button>
                        </div>
                    </div>
                    <div class="py-4" style="height: 400px; overflow-y: auto;">
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
                                    <th scope="col" style="width: 10%;">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $sqldanhsachhd = "SELECT * FROM `hoadon`";
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
                                    <td><a
                                            href="../chitiethoadon.php?mhd=<?= $row["mahoadon"]?>"><?= $row["giatri"] ?></a>
                                    </td>
                                    <td><?= $row["thoigian"] ?></td>
                                    <?php
                                                if ($row["trangthai"] == "Đã nhận hàng") {
                                                ?>
                                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#a<?= $row["stt"] ?>"><?= $row["trangthai"] ?></button></td>
                                    <?php
                                                } elseif ($row["trangthai"] == "Đang vận chuyển") {
                                                ?>
                                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#a<?= $row["stt"] ?>"><?= $row["trangthai"] ?></button></td>
                                    <?php
                                                } else {
                                                ?>
                                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#a<?= $row["stt"] ?>"><?= $row["trangthai"] ?></button></td>
                                    <?php
                                                }
                                                ?>
                                </tr>
                                <div class="modal fade" id="a<?= $row["stt"] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật thông tin
                                                    đơn hàng</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../admin/xulyadmin.php">
                                                    <input type="hidden" name="mahoadon"
                                                        value="<?= $row["mahoadon"] ?>">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="trangthai"
                                                            id="flexRadio2" value="Đang vận chuyển">
                                                        <label class="form-check-label" for="flexRadio2">
                                                            Đang vận chuyển
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="trangthai"
                                                            id="flexRadio3" value="Đã nhận hàng">
                                                        <label class="form-check-label" for="flexRadio3">
                                                            Đã nhận hàng
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="trangthai"
                                                            id="flexRadio3" value="Hủy">
                                                        <label class="form-check-label" for="flexRadio3">
                                                            Hủy đơn hàng
                                                        </label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col"><button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button></div>
                                                        <div class="col"><button type="submit" class="btn btn-primary"
                                                                name="confirm">Xác nhận</button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                    } ?>
                            </tbody>
                        </table>

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