<?php
session_start();
ob_start();
include('includes/config.php');
if ($_SESSION['taikhoan'] == "") {
    echo "<script>alert(\"bạn cần đăng nhập để sử dụng chức năng này\"); 
        window.location.href = 'index.php';
        </script>";
} else {

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
    <section class="mycontact ">
        <div class="container py-3">
            <div class="row pt-2">
                <div class="col">
                    <h4>Sản phẩm yêu thích</h4>
                </div>
                <hr class="hr">
            </div>
            <div class="row">
                <?php
                    $tk = $_SESSION['taikhoan'];
                    $sqlsp = "SELECT * FROM `spyeuthich` WHERE `taikhoan`='$tk'";
                    $spyeuthich = $conn->query($sqlsp);
                    if ($spyeuthich->num_rows > 0) {
                        while ($row = $spyeuthich->fetch_assoc()) {
                    ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="badge">Hot</div>
                        <div class="product-tumb">
                            <img src="<?= $row["hinhanh"]; ?>" alt="">
                        </div>
                        <div class="product-details">
                            <span class="product-catagory"><?= $row["loaisp"] ?></span>
                            <h5><button type="button" class="btn btn-link" data-bs-toggle="modal"
                                    data-bs-target="#<?= $row["masp"] ?>"><?= $row["tensp"] ?></button></h5>
                            <p><?= $row["ncc"] ?> </p>
                            <div class="product-bottom-details">
                                <div class="product-price"><small></small><?= $row["gia"] ?>₫</div>
                                <div class="product-links">
                                    <form method="post" action="xuly.php">
                                        <input type="hidden" name="link" value="favor.php">
                                        <input type="hidden" name="taikhoan" value="<?= $tk ?>">
                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                        <input type="hidden" name="masp" value="<?= $row["masp"] ?>">
                                        <input type="hidden" name="tensp" value="<?= $row["tensp"] ?>">
                                        <input type="hidden" name="loaisp" value="<?= $row["loaisp"] ?>">
                                        <input type="hidden" name="gia" value="<?= $row["gia"] ?>">
                                        <input type="hidden" name="info" value="<?= $row["info"] ?>">
                                        <input type="hidden" name="ncc" value="<?= $row["ncc"] ?>">
                                        <input type="hidden" name="hinhanh" value="<?= $row["hinhanh"] ?>">
                                        <div class="d-flex">
                                            <button class="btn btn-link" style="width: 20px;" type="submit"
                                                name="delete"><i class="fa-solid fa-heart-crack"></i></button>
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
                                    <td><img src="<?= $row["hinhanh"] ?>" alt=""></td>
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
                                    <form method="post" style="<?= $ht ?>">
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
                    }
                    ?>
            </div>

        </div>

    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>
<?php } ?>