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
    <section class=" recruit">
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h4>Tuyển dụng.</h4>
                </div>
                <hr class="hr">
            </div>
        </div>
        <div class="container pb-3">
            <div>
                <h4>FAMILY MART TUYỂN DỤNG NHÂN VIÊN BÁN HÀNG FULLTIME TOÀN HÀ NỘI & HCM</h4>
                <h4>**</h4>
                <img src="img/tuyendung.webp" alt="">
                <br><br>
                <h5>Mô tả công việc:</h5>
                <ul>
                    <li>Tính tiền quản lý thu chi trong ca làm việc</li>
                    <li>Tiếp nhận hàng, trưng bày hàng hóa đúng quy tắc</li>
                    <li>Vệ sinh sạch sẽ siêu thị, quầy thu ngân</li>
                    <li>Chủ động hỗ trợ, phục vụ khách hàng</li>
                    <li>Tư vấn giải đáp thắc mắc,yêu cầu của khách hàng khi tham quan mua sắm</li>
                </ul>
                <br>
                <h5>Yêu cầu ứng viên:</h5>
                <ul>
                    <li>Nam/Nữ</li>
                    <li>Tốt nghiệp THPT trở lên. kỹ năng giao tiếp tốt</li>
                    <li>Có khả năng làm việc <strong> xoay ca (không làm chết ca)</strong>:</li>
                    <ol>Ca sáng (6:00 - 14:00)</ol>
                    <ol>Ca chiều (13:30:00 - 22:00)</ol>
                    <li>Chăm chỉ, trung thực, khỏe mạnh, nhanh nhẹn, hòa đồng</li>
                </ul>
                <br>
                <h5>Quyền lợi nhân viên:</h5>
                <ul>
                    <li><strong> Lương cứng thử việc 4.8 triệu + Thưởng</strong></li>
                    <li><strong>Lương chính thức: 5,4tr (đã bao gồm bảo hiểm) + Các phúc lợi + Các khoản thưởng KPIs</strong></li>
                    <li>1 tuần nghỉ 1 ngày báo quản lí</li>
                    <li>Được đóng đầy đủ 03 loại bảo hiểm BHXH, BHYT, BHTN và gói bảo hiểm sức khỏe Bảo Việt chế độ cao</li>
                    <li>Có cơ hội thăng tiến lên Cửa hàng Phó trong vòng 06 tháng, cửa hàng trưởng sau 4 tháng tiếp</li>
                </ul>
                <p>Loại hình công việc: Toàn Thời gian</p>
                <p>Lương: 6.000.000₫ - 9.000.000₫ một tháng

                </p>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>
</body>

</html>
