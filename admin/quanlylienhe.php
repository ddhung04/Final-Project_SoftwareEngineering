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
                        <a class="nav-link active" aria-current="page" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlynhacungcap.php">Nhà cung cấp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="quanlygiamgia.php">Giảm giá</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="py-3" style="height: 400px; overflow-y: auto;">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 5%;">STT</th>
                                    <th scope="col" style="width: 20%;">Tên người dùng</th>
                                    <th scope="col" style="width: 20%;">Email</th>
                                    <th scope="col" style="width: 50%;">Nội dung</th>
                                    <th scope="col" style="width: 5%;">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sqllh = "SELECT * FROM `lienhe`";
                                    $kq = $conn->query($sqllh);
                                    $i = 1;
                                    if ($kq->num_rows > 0) {
                                        while ($row = $kq->fetch_assoc()) {
                                            $stt = $i;
                                            $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $stt ?></th>
                                    <td><?= $row["tennguoidung"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td><?= $row["noidung"] ?></td>
                                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#b<?= $row["stt"] ?>"><?= $row["trangthai"] ?></button></td>
                                </tr>
                                <div class="modal fade" id="b<?= $row["stt"] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật trạng thái
                                                    xử lý liên hệ</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../admin/xulyadmin.php">
                                                    <input type="hidden" name="stt" value="<?= $row["stt"] ?>">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="trangthai"
                                                            id="flexRadio1" value="Đã tiếp nhận" checked>
                                                        <label class="form-check-label" for="flexRadio1">
                                                            Đã tiếp nhận
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="trangthai"
                                                            id="flexRadio2" value="Đang xử lý">
                                                        <label class="form-check-label" for="flexRadio2">
                                                            Đang xử lý
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="trangthai"
                                                            id="flexRadio3" value="Đã xử lý">
                                                        <label class="form-check-label" for="flexRadio3">
                                                            Đã xử lý
                                                        </label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col"><button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button></div>
                                                        <div class="col"><button type="submit" class="btn btn-primary"
                                                                name="contact">Xác nhận</button></div>
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