<?php
session_start();
ob_start();
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('includes/config.php');

$tieude = $_SESSION["tieude"];
if (isset($_POST['send'])) {
    $taikhoan = $_SESSION['taikhoan'];
    $noidung = $_POST["noidung"];
    $thoigian = date('Y-m-d');
    $mabaiviet = $_POST["mabaiviet"];
    $sql = "INSERT INTO `comment`(`mabaiviet`, `taikhoan`, `noidung`, `thoigian`) VALUES ('$mabaiviet','$taikhoan','$noidung','$thoigian')";
    $conn->query($sql);
    echo "<script>alert(\"Đã thêm bình luận.\")
            window.location.href = 'article.php';
            </script>";
}
if (isset($_POST['delete'])) {
    $taikhoan = $_POST['taikhoan'];
    $stt = $_POST['stt'];
    $mabaiviet = $_POST['mabaiviet'];
    $sqlxoa = "DELETE FROM `comment` WHERE `taikhoan`='$taikhoan' AND `stt`='$stt' AND `mabaiviet`='$mabaiviet'";
    $conn->query($sqlxoa);
    echo "<script>alert(\"Xóa thông tin thành công,\"); 
            window.location.href = 'article.php';
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <section class="mynews">
        <div class="container py-2">
            <div class="row pt-2">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="news.php">Tin tức</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $tieude ?></li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>
            <?php
            $sqldanhsach = "SELECT * FROM `news` WHERE `tieude`='$tieude'";
            $kq = $conn->query($sqldanhsach);
            while ($row = $kq->fetch_assoc()) {
                $mabaiviet = $row['mabaiviet'];
            ?>
                <h2><?= $row['tieude'] ?></h2>
                <img src="<?= $row['hinhanh'] ?>">
                <br><br>
                <p><?= $row['noidung'] ?></p>
            <?php
            }
            ?>
        </div>
        <hr class="hr">
        <div class="container mb-3">
            <?php
            if (isset($_SESSION["quantri"])) {
            ?>
                <form method="post">
                    <label for="comment" class="form-label">
                        <h5>Bình luận: </h5>
                    </label>
                    <div class="col-md-3"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <textarea class="form-control" id="comment" name="noidung" rows="2"></textarea>
                        </div>
                        <input type="hidden" name="mabaiviet" value="<?= $mabaiviet ?>">
                        <div class="col-md-1"><button type="submit" class="btn btn-primary" name="send"><i class="fa-regular fa-comment"></i></button></div>
                    </div>
                </form>
                <hr class="hr">
            <?php } ?>
            <div class="py3" style="height: 350px; overflow-y: auto;">
                <?php
                $sqlcomment = "SELECT * FROM `comment` WHERE `mabaiviet`= '$mabaiviet'";
                $ketqua = $conn->query($sqlcomment);
                if ($ketqua->num_rows > 0) {
                    while ($row = $ketqua->fetch_assoc()) { ?>
                        <div class="py-2">
                            <div class="card">
                                <div class="card-header">
                                    <?= $row['taikhoan'] ?>
                                    <?php if ($_SESSION["quantri"] > 0) {
                                    ?>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cmt<?= $row["stt"] ?>" style="width: 5%;">gỡ</button>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p><?= $row['noidung'] ?></p>
                                        <footer class="blockquote-footer" style="font-size: small;">Thời gian: <cite title="Source Title"><?= $row['thoigian'] ?></cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="cmt<?= $row["stt"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gỡ comment</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="taikhoan" value="<?= $row["taikhoan"] ?>">
                                                <input type="hidden" class="form-control" name="stt" value="<?= $row["stt"] ?>">
                                                <input type="hidden" class="form-control" name="mabaiviet" value="<?= $row["mabaiviet"] ?>">
                                                <p>LƯU Ý: Sau khi xóa mọi thông tin sẽ biến mất và không thể khổi phục</p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></div>
                                                <div class="col"><button type="submit" class="btn btn-danger" name="delete">Gỡ</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>