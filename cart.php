<?php
session_start();
ob_start();
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('includes/config.php');

if (isset($_POST['updateSL'])) {
    $id = $_POST['id'];
    $slmoi = $_POST['update'];
    $i = 0;
    foreach ($_SESSION['cart'] as $sp) {
        if ($sp[0] == $id) {
            array_splice($_SESSION['cart'][$i], 5, 1, $slmoi);
            echo "<script>alert(\"Cập nhật số lượng thành công\");
                                window.location.href = '#.php';
                                </script>";
            break;
        }
        $i++;
    }
}
if (isset($_POST['add'])) {
    $thoigian  = $_POST["thoigian"];
    $sqlmhd = "SELECT `stt` FROM `hoadon`";
    $slhd = $conn->query($sqlmhd)->num_rows;
    $madauhoadon = date('Y') . date('m') .  "0000";
    $mahd = $madauhoadon + $slhd;
    $taikhoan = $_SESSION['taikhoan'];
    $tennn = $_POST["tennguoinhan"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $giatri  = $_POST["giatri"];
    $trangthai  = "Đang vận chuyển";
    $sql = "INSERT INTO `hoadon`(`mahoadon`,`taikhoan`, `nguoinhan`, `diachinhanhang`, `sdt`, `giatri`, `thoigian`, `trangthai`)
         VALUES ('$mahd','$taikhoan','$tennn','$diachi','$sdt','$giatri','$thoigian','$trangthai')";
    $conn->query($sql);
    foreach ($_SESSION['cart'] as $sp) {
        $sqlchitiethoadon = "INSERT INTO `hoadonchitiet`(`mahoadon`, `taikhoan`, `sanpham`, `soluong`, `giatien`, `thoigianban`) VALUES ('$mahd','$taikhoan','$sp[1]','$sp[5]','$sp[3]','$thoigian')";
        $conn->query($sqlchitiethoadon);
        $sqlsp = "SELECT * FROM `product` WHERE `tensp`= '$sp[1]';";
        $soluong = $conn->query($sqlsp);
        if ($soluong->num_rows > 0) {
            while ($row = $soluong->fetch_assoc()) {
                $soluongmoi = $row["soluong"] - $sp[5];
                $sqlsl = "UPDATE `product` SET `soluong`='$soluongmoi' WHERE `tensp`='$sp[1]'";
                $conn->query($sqlsl);
            }
        }
    }
    $thoigian = date('Y-m-d');
    $sqlnotice = "INSERT INTO `notice`(`taikhoan`, `noidung`, `thoigian`) VALUES ('$taikhoan','Bạn đã đặt thành công đơn hàng có giá trị $giatri(VNĐ).','$thoigian')";
    $conn->query($sqlnotice);

    foreach ($_SESSION['cart'] as $sp) {
        $sqlcheck = "SELECT * FROM `spbanchay` WHERE `tensp` = '$sp[1]' AND `thoigian`= '$thoigian'";
        if ($conn->query($sqlcheck)->num_rows > 0) {
            $sqlslban = "SELECT `soluongban` FROM `spbanchay` WHERE `tensp` = '$sp[1]' AND `thoigian`= '$thoigian'";
            $slban = $conn->query($sqlslban);
            $row = $slban->fetch_assoc();
            $sltong = $row["soluongban"] + $sp[5];
            $sqlupdatespbc = "UPDATE `spbanchay` SET `soluongban`='$sltong' WHERE `tensp`='$sp[1]' AND `thoigian`='$thoigian'";
            $conn->query($sqlupdatespbc);
        } else {
            $sqlspbanchay = "INSERT INTO `spbanchay`(`tensp`, `soluongban`, `thoigian`) VALUES ('$sp[1]','$sp[5]','$thoigian')";
            $conn->query($sqlspbanchay);
        }
    }
    echo "<script>alert(\"Tạo hóa đơn thành công. Vui lòng chờ nhân viên cửa hàng liên lạc\") 
            window.location.href = 'index.php';
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
    <section class="mycart">
        <div class=" container pt-3">
            <div class="col">
                <h4>Giỏ hàng của: <?= $_SESSION['khachhang'] ?></h4>
            </div>
            <hr class="hr">
        </div>
        <div class="container py-3" style="height: 400px; overflow-y: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Loại sản phẩm</th>
                        <th scope="col">Nhà cung cấp</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền (VNĐ)</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (count($_SESSION['cart']) < 1) {
                        echo "<script>alert(\"bạn chưa có món đồ nào trong giỏ hàng\"); 
                            </script>";;
                    } else {
                        if (isset($_SESSION['cart'])) {
                            $tongtien = 0;
                            $i = 1;
                            foreach ($_SESSION['cart'] as $sp) {
                                $thanhtien = $sp[3] * $sp[5];
                                $tongtien += $thanhtien;
                    ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $sp[1]; ?></td>
                        <td><?= $sp[2]; ?></td>
                        <td><?= $sp[4]; ?></td>
                        <td><?= $sp[3]; ?></td>
                        <td><?= $sp[5]; ?> <button type="button" class="btn btn btn-link" style="width: 20px;"
                                data-bs-toggle="modal" data-bs-target="#a<?= $sp[0]; ?>"><i
                                    class="fa-regular fa-pen-to-square"></i></button> </td>
                        <div class="modal fade" id="a<?= $sp[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật số lượng</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" name="id"
                                                    value="<?= $sp[0] ?>">
                                                <label for="update" class="col-form-label">Số lượng hiện
                                                    tại:<?= $sp[5] ?>- số lượng còn lại:
                                                    <?php
                                                                $sql = "SELECT * FROM `product` WHERE `tensp`= '$sp[1]';";
                                                                $soluong = $conn->query($sql);
                                                                if ($soluong->num_rows > 0) {
                                                                    while ($row = $soluong->fetch_assoc()) {
                                                                        echo  $sl = $row["soluong"];
                                                                    }
                                                                }
                                                                ?></label>
                                                <input type="number" class="form-control" id="update" name="update"
                                                    placeholder="nhập số lượng mới" min="1" max="<?= $sl ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col"><button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button></div>
                                                <div class="col"><button type="submit" class="btn btn-success"
                                                        name="updateSL">Update</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td> <?= $thanhtien ?> </td>
                        <td style="width: 5%;">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#go<?= $sp[0]; ?>">Gỡ</button>
                            <div class="modal fade" id="go<?= $sp[0]; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Gỡ sản phẩm khỏi giỏ
                                                hàng</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form action="delcart.php?id=<?= ($i - 1) ?>" method="POST">
                                                <div class="mb-3">
                                                    <p>LƯU Ý: Bạn sẽ bỏ sản phẩm này ra khỏi giỏ hàng</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col"><button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button></div>
                                                    <div class="col"><button type="submit" class="btn btn-danger"
                                                            name="xoa">Gỡ</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    <?php
                                $i++;
                            }
                        }

                        ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Tổng tiền: <?= $tongtien ?> (VNĐ)
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
            ?>
            </table>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#boxthanhtoan">
                        Thanh toán
                    </button>
                    <div class="modal fade" id="boxthanhtoan" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hóa đơn</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $tk = $_SESSION['taikhoan'];
                                        $sql = "SELECT * FROM `user` WHERE `taikhoan`= '$tk';";
                                        $user = $conn->query($sql);
                                        if ($user->num_rows > 0) {
                                            while ($row = $user->fetch_assoc()) {
                                        ?>
                                        <div class="col-md-3"></div>
                                        <div class="py-1">
                                            <input type="hidden" class="form-control" id="spc" name="spc"
                                                value="<?= $sp ?>">
                                            <div class="py-1">
                                                <label>
                                                    <h5>Nhập thông tin người nhận:</h5>
                                                </label>
                                                <div class="py-1">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="tennn"
                                                            name="tennguoinhan" placeholder=""
                                                            value="<?php echo $row["tennguoidung"]; ?>" required>
                                                        <label for="tennn">Tên người nhận:</label>
                                                    </div>
                                                </div>
                                                <div class="py-1">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="sdt" name="sdt"
                                                            placeholder="" value="<?php echo $row["sdt"]; ?>" required>
                                                        <label for="sdt">Số điện thoại người nhận:</label>
                                                    </div>
                                                </div>
                                                <div class="py-1">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="diachi"
                                                            name="diachi" placeholder=""
                                                            value="<?php echo $row["diachi"]; ?>" required>
                                                        <label for="loaisp">Địa chỉ nhận hàng:</label>
                                                    </div>
                                                </div>
                                                <div class="py-1">

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="col-py-1">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="giatri" name="giatri" placeholder=""
                                                                            value="<?= $tongtien ?>">
                                                                        <label for="giatri">Giá trị:</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-py-1">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="thoigian" name="thoigian" placeholder=""
                                                                            value="<?= date('Y-m-d'); ?>">
                                                                        <label for="thoigian">Ngày tạo hóa đơn:</label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <?php
                                                }
                                            }
                                                    ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col"> <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button>
                                                    </div>
                                                    <div class="col"> <button type="submit" name="add"
                                                            class="btn btn-primary">Thanh toán</button>
                                                    </div>
                                                </div>
                                </form>
                            </div>
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