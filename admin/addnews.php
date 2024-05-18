<?php
session_start();
ob_start();
include('../includes/config.php');

if (isset($_POST['add'])) {
    $taikhoan = $_SESSION['taikhoan'];
    $tieude = $_POST["tieude"];
    $noidung = $_POST["noidung"];
    $NoiLuu = '../FAMILY mart/img';
    $TenFile = $_POST["fileanhdaidien"];
    $HinhDaiDien = $NoiLuu . "/" . $TenFile;
    $sql = "INSERT INTO `news`(`tieude`, `noidung`, `hinhanh`, `taikhoan`) VALUES ('$tieude','$noidung','$HinhDaiDien','$taikhoan')";
    $conn->query($sql);
    echo "<script>alert(\"Thêm bài viết thành công.\")
            window.location.href = '../admin/quanlytintuc.php';
            </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMILY MART</title>
    <link rel="shortcut icon" type="" href="img/icon.png" />
    <link rel="stylesheet" href="styleUser.css">
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
                            <li class="breadcrumb-item"><a href="index.php">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm bài viết</li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>

            <div class="row py-3">
                <div class="col-md-3"></div>
                <form class="col-md-6 userForm" method="post">
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tieude" name="tieude" placeholder="" required>
                            <label for="tieude">Tiêu đề bài viết:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-floating mb-3">
                            <textarea style="height: 200px;" type="text" class="form-control" id="noidung"
                                name="noidung" placeholder="" required></textarea>
                            <label for="noidung">Nội dung bài viết:</label>
                        </div>
                    </div>
                    <div class="py-1">
                        <div class="form-group">
                            <input type="file" class="form-control" name="fileanhdaidien" required>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col"><button type="submit" class="btn" name="add">Thêm</button></div>
                        <div class="col"><a href="index.php"><button type="button" class="btn">Quay lại</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>