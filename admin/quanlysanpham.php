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
                        <a class="nav-link active " aria-current="page" href="#">Sản phẩm</a>
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
                <div class="py-3">
                    <div class="d-flex">
                        <a class="btn btn-primary" href="addproduct.php" role="button">Thêm sản phẩm</a>
                        <div class="col-md-6"></div>
                        <form class="d-flex col-md-4 " action="editproduct.php" method="POST">
                            <input type="text" class="form-control" name="edit"
                                placeholder="Nhập tên sản phẩm muốn chỉnh Sửa" required>
                            <button class="btn btn-primary" style="width: 20%;" type="submit" name="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="py-3" style="height: 400px; overflow-y: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Mã sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Loại sản phẩm</th>
                                    <th scope="col">Giá(vnd)</th>
                                    <th scope="col">Thông tin</th>
                                    <th scope="col">Nhà cung cấp</th>
                                    <th scope="col">Số lượng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sqldanhsachsp = "SELECT * FROM `product`;";
                                    $ketquadanhsachsp = $conn->query($sqldanhsachsp);
                                    if ($ketquadanhsachsp->num_rows > 0) {
                                        while ($row = $ketquadanhsachsp->fetch_assoc()) {
                                    ?>
                                <tr>
                                    <th scope="row" style="width: 10%;"><?= $row["masp"] ?></th>
                                    <td><?= $row["tensp"] ?></td>
                                    <td style="width: 15%;"><?= $row["loaisp"] ?></td>
                                    <td style="width: 10%;"><?= $row["gia"] ?></td>
                                    <td><?= $row["info"] ?></td>
                                    <td><?= $row["ncc"] ?></td>
                                    <td style="width: 7%;"> <?= $row["soluong"] ?></td>
                                    <td style="width: 4%;"><button type="button" class="btn btn-success"
                                            data-bs-toggle="modal" data-bs-target="#<?= $row["masp"] ?>">+</button></td>
                                </tr>
                                <div class="modal fade" id="<?= $row["masp"] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">cập nhật số lượng
                                                </h1>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../admin/xulyadmin.php">
                                                    <div class="mb-3">
                                                        <input type="hidden" class="form-control" name="tensp"
                                                            value="<?= $row["tensp"] ?>">
                                                        <label for="update" class="col-form-label">Số lượng hiện
                                                            tại:<?= $row["soluong"] ?></label>
                                                        <input type="number" class="form-control" id="update"
                                                            name="update" placeholder="nhập số lượng mới">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col"><button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button></div>
                                                        <div class="col"><button type="submit" class="btn btn-success"
                                                                name="updateSL">Update</button></div>
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