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
                        <a class="nav-link active" aria-current="page" href="#">Nhà cung cấp</a>
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
                                    <th scope="col">Nhà cung cấp</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Thông tin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sqllh = "SELECT * FROM `nhacungcap`";
                                    $kq = $conn->query($sqllh);
                                    $i = 1;
                                    if ($kq->num_rows > 0) {
                                        while ($row = $kq->fetch_assoc()) {
                                            $stt = $i;
                                            $i++;
                                    ?>
                                <tr>
                                    <th scope="row"><?= $stt ?></th>
                                    <td><?= $row["ncc"] ?></td>
                                    <td><?= $row["diachi"] ?></td>
                                    <td><?= $row["sdt"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td><?= $row["thongtin"] ?></td>
                                </tr>
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