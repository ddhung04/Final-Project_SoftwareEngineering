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
                        <a class="nav-link active " aria-current="page" href="#">Tài khoản</a>
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
                <div class="tab-content" id="myTabContent">
                    <div class="py-3" style="height: 400px; overflow-y: auto;">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Tài khoản khách hàng</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"
                                    <?php if ($_SESSION["quantri"] < 2) echo "disabled"; ?>>Tài khoản nhân viên</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên tài khoản</th>
                                            <th scope="col">Tên người dùng</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" style="width: 5%;"></th>
                                            <th scope="col" style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqldanhsachtk = "SELECT * FROM `user` WHERE `ad`='0'";
                                            $ketquadanhsachtk = $conn->query($sqldanhsachtk);
                                            if ($ketquadanhsachtk->num_rows > 0) {
                                                while ($row = $ketquadanhsachtk->fetch_assoc()) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $row["taikhoan"] ?></th>
                                            <td><?= $row["tennguoidung"] ?></td>
                                            <td><?= $row["sdt"] ?></td>
                                            <td><?= $row["diachi"] ?></td>
                                            <td><?= $row["email"] ?></td>
                                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#<?= $row["taikhoan"] ?>"><i
                                                        class="fa-solid fa-user-xmark"></i></button></td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#add<?= $row["taikhoan"] ?>"
                                                    <?php if ($_SESSION["quantri"] < 2) echo "disabled"; ?>><i
                                                        class="fa-solid fa-user-plus"></i></button></td>
                                        </tr>
                                        <div class="modal fade" id="add<?= $row["taikhoan"] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt làm nhân
                                                            viên</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="../admin/xulyadmin.php">
                                                            <div class="mb-3">
                                                                <label for="taikhoan" class="col-form-label">Bạn muốn
                                                                    đặt tài khoản "<?= $row["taikhoan"] ?>" làm nhân
                                                                    viên?</label>
                                                                <input type="hidden" class="form-control" id="taikhoan"
                                                                    name="taikhoan" value="<?= $row["taikhoan"] ?>">
                                                                <input type="hidden" class="form-control"
                                                                    id="tennguoidung" name="tennguoidung"
                                                                    value="<?= $row["tennguoidung"] ?>">
                                                                <input type="hidden" class="form-control" id="matkhau"
                                                                    name="matkhau" value="<?= $row["matkhau"] ?>">
                                                                <input type="hidden" class="form-control" id="sdt"
                                                                    name="sdt" value="<?= $row["sdt"] ?>">
                                                                <input type="hidden" class="form-control" id="email"
                                                                    name="email" value="<?= $row["email"] ?>">
                                                                <input type="hidden" class="form-control" id="diachi"
                                                                    name="diachi" value="<?= $row["diachi"] ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="col"><button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Đóng</button></div>
                                                                <div class="col"><button type="submit"
                                                                        class="btn btn-primary"
                                                                        name="addadmin">Thêm</button></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="<?= $row["taikhoan"] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa tài
                                                            khoản</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="../admin/xulyadmin.php">
                                                            <div class="mb-3">
                                                                <label for="delete" class="col-form-label">Nhập lại tên
                                                                    tài khoản muốn xóa:</label>
                                                                <input type="text" class="form-control" id="delete"
                                                                    name="xoatk" placeholder="<?= $row["taikhoan"] ?>"
                                                                    required>
                                                                <p>LƯU Ý: Sau khi xóa tài khoản mọi thông tin về tài
                                                                    khoản sẽ biến mất và không thể khổi phục</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="col"><button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Đóng</button></div>
                                                                <div class="col"><button type="submit"
                                                                        class="btn btn-danger"
                                                                        name="delete">Xóa</button></div>
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
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên tài khoản</th>
                                            <th scope="col">Tên người dùng</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqldanhsachtk = "SELECT * FROM `admin`";
                                            $ketquadanhsachtk = $conn->query($sqldanhsachtk);
                                            if ($ketquadanhsachtk->num_rows > 0) {
                                                while ($row = $ketquadanhsachtk->fetch_assoc()) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $row["taikhoan"] ?></th>
                                            <td><?= $row["tennguoidung"] ?></td>
                                            <td><?= $row["sdt"] ?></td>
                                            <td><?= $row["diachi"] ?></td>
                                            <td><?= $row["email"] ?></td>
                                            <form method="POST" action="../admin/xulyadmin.php">
                                                <input type="hidden" name="taikhoan" value="<?= $row["taikhoan"] ?>">
                                                <td><button type="submit" class="btn btn-danger" name="xoanv"><i
                                                            class="fa-solid fa-user-minus"></i></button></td>
                                            </form>
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


            </div>
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php } ?>