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
                        <a class="nav-link  " aria-current="page" href="#">Giảm giá</a>
                    </li>

                </ul>
                <div class="py-3">
                    <form method="post" action="../admin/xulyadmin.php">
                        <div class="row">
                            <div class="col">
                                <select class="form-select" name="tensp" aria-label="Default select example">
                                    <option selected>Tên sản phẩm</option>
                                    <?php
                                        $sqldspl = "SELECT `tensp`FROM `product`";
                                        $dssp = $conn->query($sqldspl);
                                        while ($row = $dssp->fetch_assoc()) {
                                        ?>
                                    <option value="<?= $row["tensp"] ?>"><?= $row["tensp"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">% Giảm giá</span>
                                    <input type="text" class="form-control" name="giamgia"
                                        aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary" name="salesp">Tạo sự kiện</button>
                            </div>
                        </div>
                    </form>
                    <div style="height: 400px; overflow-y: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%;">STT</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giảm giá(%)</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sqlsale = "SELECT * FROM `sale`";
                                    $kq = $conn->query($sqlsale);
                                    $i = 1;
                                    if ($kq->num_rows > 0) {
                                        while ($row = $kq->fetch_assoc()) {
                                            $stt = $i;
                                            $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $stt ?></th>
                                    <td><?= $row["tensp"] ?></td>
                                    <td><?= $row["giamgia"] ?></td>
                                    <td><?= $row["ngaybatdau"] ?></td>
                                    <td><?= $row["ngayketthuc"] ?></td>
                                    <?php
                                                if ($row["ngayketthuc"] == "0000-00-00") {
                                                ?>
                                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#sale<?= $row["stt"] ?>">Kết thúc</button></td>
                                    <?php } ?>

                                </tr>
                                <div class="modal fade" id="sale<?= $row["stt"] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ngưng giảm giá</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../admin/xulyadmin.php">
                                                    <div class="mb-3">
                                                        <h5>Xác nhận dừng đợt giảm giá này?</h5>
                                                        <input type="hidden" name="stt" value="<?= $stt ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col"><button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Quay lại</button></div>
                                                        <div class="col"><button type="submit" class="btn btn-success"
                                                                name="closesale">Dừng</button></div>
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
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php } ?>