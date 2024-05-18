<?php
    session_start();
    ob_start();
    error_reporting(0);
    include('includes/config.php');

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
    <section class="myques">
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h4>Câu hỏi thường gặp.</h4>
                </div>
                <hr class="hr">
            </div>



            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            FAMILY Mart có xác nhận đơn hàng với tôi không? </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            - Với khách hàng đặt mua hàng thành công đầu tiên, để đẩy nhanh tiến độ xử lý và giao hàng
                            đến quý khách, các đơn hàng sẽ được Xác nhận qua email. </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Làm thế nào để tôi đặt nhiều sản phẩm vào cùng 1 đơn hàng? </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Qúy khách có thể đặt các sản phẩm khác nhau trong 1 giỏ hàng thành 1 đơn hàng, các sản phẩm
                            trong giỏ hàng sẽ được đóng thành 1 kiện hàng (nếu các sản phẩm có cùng kho xử lý/nhà bán
                            hàng)
                            và giao đến địa chỉ quý khách đã đăng ký.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Tôi có thể thanh toán khi nhận hàng không? </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            FAMILY Mart hỗ trợ giao hàng và thanh toán tận nơi cho các đơn hàng có tổng trị giá từ
                            20.000.000đ trở xuống trên toàn quốc. Quý khách có thể tham khảo thêm các phương thức thanh
                            toán
                            khác
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            FAMILY Mart bán những sản phẩm gì? </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Đến nay website thương mại điện tử FAMILY Mart cung cấp các sản phẩm thuộc ngành hàng như
                            sau: Điện Thoại, Thời Trang, Nội Thất, Đồ Chơi, Văn Phòng Phẩm, Làm Đẹp, Sức Khỏe, Laptop,
                            Máy
                            Chơi Game, Điện Gia Dụng...
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Làm thế nào để tôi nhận biết sản phẩm còn hay hết hàng? </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Quý khách có thể nhận biết sản phẩm còn hàng hay hết hàng tại Poco Mart bằng cách truy cập
                            vào thông tin chi tiết của sản phẩm và kiểm tra trạng thái sau: Nút mua hàng hiển thị
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>