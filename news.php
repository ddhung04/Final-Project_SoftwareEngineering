<?php
session_start();
ob_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['id'])) {
    $_SESSION["tieude"] = $_POST["tieude"];
    echo "<script>
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
                    <h4>Danh mục tin tức</h4>
                </div>
                <hr class="hr">
            </div>
            <div class="row">
                <?php
                $sqldanhsach = "SELECT * FROM `news`";
                $kq = $conn->query($sqldanhsach);
                if ($kq->num_rows > 0) {
                    while ($row = $kq->fetch_assoc()) {
                ?>
                        <div class="col-12 py-3">
                            <article class="blog-card">
                                <div class="blog-card__background">
                                    <div class="card__background--wrapper">
                                        <div class="card__background--main" style="background-image: url('<?= $row["hinhanh"] ?>');">
                                            <div class="card__background--layer"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-card__head">
                                    <span class="date__box">
                                        <span class="date__day"><?= date('d')?></span>
                                        <span class="date__month"><?= date('m')?></span>
                                    </span>
                                </div>
                                <div class="blog-card__info">
                                    <h5><?= $row["tieude"] ?></h5>
                                    <p>
                                        <a href="#" class="icon-link mr-3"><i class="fa-solid fa-square-pen"></i> <?= $row["taikhoan"] ?></a>
                                        <?php
                                        $mabaiviet = $row["mabaiviet"];
                                        $sqldem = "SELECT * FROM `comment` WHERE `mabaiviet`= '$mabaiviet'";
                                        $dem = $conn->query($sqldem)->num_rows; ?>
                                        <a href="#" class="icon-link"><i class="fa-regular fa-comment"></i> <?= $dem ?></a>
                                    </p>
                                    <div class="col-md-2">
                                        <form method="post">
                                            <input type="hidden" name="tieude" value="<?= $row["tieude"] ?>">
                                            <button class="btn btn-link" type="submit" name="id"><i class=" fa fa-long-arrow-right"></i>Tìm hiểu thêm</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </div>
                <?php
                    }
                } ?>

            </div>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>


    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>