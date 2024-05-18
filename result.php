<?php
include('includes/config.php');
session_start();
ob_start();
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');

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
    <?php include 'includes/header.php' ?>
    <!-- menu -->
    <?php include 'includes/navbar.php' ?>

    <!-- content -->
    <section class="myresult">
        <div class="container py-3">
            <div class="row pt-2">
                <div class="col">
                    <h4>Kết quả tìm kiếm</h4>
                </div>
                <hr class="hr">
            </div>
            <div class="row">
                <?php
                if (isset($_POST['keyword'])) {
                    $keyword = $_SESSION['keyword'] = $_POST['keyword'];
                } else {
                    $keyword = $_SESSION['keyword'];
                }
                $sql = "SELECT * FROM `product` WHERE `tensp` LIKE '%" . $keyword . "%' OR `loaisp` LIKE '%" . $keyword . "%' OR `masp` LIKE '%" . $keyword . "%'  ";
                $kq = $conn->query($sql);
                if ($kq->num_rows > 0) {
                    while ($row = $kq->fetch_assoc()) {
                        $gia = $row["gia"];
                        $id = $row["id"];
                        $info = $row["info"];
                ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="badge">Hot</div>
                        <div class="product-tumb">
                            <img src="<?= $hinhanh = $row["hinh anh"]; ?>" alt="">
                        </div>
                        <div class="product-details">
                            <span class="product-catagory"><?= $loaisp = $row["loaisp"] ?></span>
                            <h5><button type="button" class="btn btn-link" data-bs-toggle="modal"
                                    data-bs-target="#<?= $masp = $row["masp"] ?>"><?= $tensp = $row["tensp"] ?></button>
                            </h5>
                            <p><?= $ncc = $row["ncc"] ?> </p>
                            <div class="product-bottom-details">
                                <?php
                                        $sqlsale = "SELECT `giamgia`FROM `sale` WHERE `tensp`='$tensp' AND `ngayketthuc`='chưa kết thúc'";
                                        $sale = $conn->query($sqlsale);
                                        if ($sale->num_rows > 0) {
                                            while ($row = $sale->fetch_assoc()) {
                                        ?>
                                <div class="product-price">
                                    <small><?= $gia ?></small><br><?= $giacuoi = ($gia - $gia * $row["giamgia"] / 100) ?>₫
                                </div>
                                <?php }
                                        } else { ?>
                                <div class="product-price"><small></small><br><?= $giacuoi = $gia ?>₫</div>
                                <?php } ?>
                                <div class="product-links">
                                    <form method="post" action="xuly.php">
                                        <input type="hidden" name="link" value="index.php">
                                        <input type="hidden" name="taikhoan" value="<?= $tk ?>">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <input type="hidden" name="masp" value="<?= $masp ?>">
                                        <input type="hidden" name="tensp" value="<?= $tensp ?>">
                                        <input type="hidden" name="loaisp" value="<?= $loaisp ?>">
                                        <input type="hidden" name="gia" value="<?= $giacuoi ?>">
                                        <input type="hidden" name="info" value="<?= $info ?>">
                                        <input type="hidden" name="ncc" value="<?= $ncc ?>">
                                        <input type="hidden" name="hinhanh" value="<?= $hinhanh ?>">
                                        <div class="d-flex">
                                            <button class="btn btn-link" style="width: 20px;" type="submit"
                                                name="add"><i class="fa fa-heart"></i></button>
                                            <button class="btn btn-link" style="width: 20px;" type="submit"
                                                name="addcart"><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="<?= $row["masp"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin sản phẩm </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table style="width: 100%;">
                                    <th>
                                    <td>
                                        <h5>Tên sản phẩm: <?= $row["tensp"] ?></h5>
                                        <p>Loại sản phẩm: <?= $row["loaisp"] ?></p>
                                        <p>Giá: <?= $row["gia"] ?>₫</p>
                                        <p>Nhà cung cấp: <?= $row["ncc"] ?></p>
                                        <p>Thông tin sản phẩm: <?= $row["info"] ?></p>
                                        <h5>Đánh giá sản phẩm: </h5>

                                    </td>
                                    <td><img src="<?= $row["hinh anh"] ?>" alt=""></td>
                                    </th>
                                </table>
                                <hr class="hr">
                                <div class="container mb-3">
                                    <?php
                                            $tensp = $row["tensp"];
                                            $taikhoan = $_SESSION['taikhoan'];
                                            $sqldem = "SELECT * FROM `hoadonchitiet` WHERE `sanpham`= '$tensp' AND `taikhoan`= '$taikhoan'";
                                            if ($conn->query($sqldem)->num_rows > 0) {
                                            ?>
                                    <form method="post" action="xuly.php">
                                        <input type="hidden" name="link" value="allproduct.php">
                                        <label for="comment" class="form-label">
                                            <h5>Đánh giá của bạn: </h5>
                                        </label>
                                        <div class="col-md-3"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea class="form-control" id="comment" name="noidung"
                                                    rows="2"></textarea>
                                            </div>
                                            <input type="hidden" name="tensanpham" value="<?= $row["tensp"] ?>">
                                            <div class="col-md-1"><button type="submit" class="btn btn-primary"
                                                    name="send"><i class="fa-regular fa-comment"></i></button></div>
                                        </div>
                                    </form>
                                    <hr class="hr">
                                    <?php
                                            }
                                            ?>
                                    <div class="py3" style="height: 150px; overflow-y: auto;">
                                        <?php

                                                $sqlcomment = "SELECT * FROM `danhgiasanpham` WHERE `tensanpham`= '$tensp'";
                                                $ketqua = $conn->query($sqlcomment);
                                                if ($ketqua->num_rows > 0) {
                                                    while ($row = $ketqua->fetch_assoc()) { ?>
                                        <div class="py-2">
                                            <div class="card">
                                                <div class="card-header">
                                                    <?= $row['taikhoan'] ?>
                                                </div>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p><?= $row['noidung'] ?></p>
                                                        <footer class="blockquote-footer" style="font-size: small;">Thời
                                                            gian: <cite
                                                                title="Source Title"><?= $row['thoigian'] ?></cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }
                                                } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "Không có sản phẩm bạn cần tìm kiếm!";
                }
                ?>
            </div>

        </div>
    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>