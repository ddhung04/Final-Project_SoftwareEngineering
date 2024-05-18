<?php
session_start();
ob_start();
error_reporting(0);
include('includes/config.php');

    if (isset($_POST['sent'])) {
        $tennd = $_POST['ten'];
        $email = $_POST["email"];
        $noidung = $_POST["noidung"];
        $trangthai ="đã tiếp nhận";
        $sql = "INSERT INTO `lienhe`(`tennguoidung`, `email`, `noidung`, `trangthai`) VALUES ('$tennd','$email','$noidung','$trangthai')";
        $conn->query($sql);
        echo "<script>alert(\"Hệ thống đã ghi nhận phản hồi của bạn. Nhân viên của chúng tôi sẽ liên lạc lại với bạn qua email trong Thời gian ngắn nhất. Chân thành cảm ơn.\");
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
            <div class="row">
                <div class="col">
                    <h4>LIÊN HỆ</h4>
                </div>
                <hr class="hr">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="row py-3">
                            <div class="row">
                                <label>
                                    <h5><i class="fa-solid fa-location-dot"></i> Cầu Giấy, Hà Nội</h5>
                                </label>
                            </div><br>
                            <div class="row">
                                <label>
                                    <h5><i class="fa-solid fa-phone"></i> 0969920568 || <i
                                            class="fa-solid fa-envelope"></i></i> familymart@gmail.com</h5>
                                </label>
                            </div><br>
                            <form class="col-md-6 pt-3" method="post">
                                <div class="py-1">
                                    <div class="form-floating mb-3">
                                        <input style="width: 450px;" type="text" class="form-control" id="ten"
                                            name="ten" placeholder="" required>
                                        <label for="tieude">Tên của bạn:</label>
                                    </div>
                                </div>
                                <div class="py-1">
                                    <div class="form-floating mb-3">
                                        <input style="width: 450px;" type="text" class="form-control" id="email"
                                            name="email" placeholder="" required>
                                        <label for="tieude">Email:</label>
                                    </div>
                                </div>
                                <div class="py-1">
                                    <div class="form-floating mb-3">
                                        <textarea style="height: 200px;width: 450px" type="text" class="form-control"
                                            id="noidung" name="noidung" placeholder="" required></textarea>
                                        <label for="noidung">Nội dung liên hệ:</label>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col"><button type="submit" class="btn btn-danger"
                                            name="sent">Gửi</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <iframe style="width: 100%;"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14891.964152667175!2d105.77032909999998!3d21.073020149999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1695965116890!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>