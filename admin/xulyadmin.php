<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('../includes/config.php');


if (isset($_POST['updateSL'])) {
    $update = $_POST['update'];
    $tensp = $_POST['tensp'];
    $sql = "UPDATE `product` SET `soluong`='$update' WHERE `tensp`='$tensp'";
    $conn->query($sql);
    echo "<script>alert(\"Cập nhật số lượng thành công,\"); 
        window.location.href = '../admin/quanlysanpham.php';
        </script>";
}
if (isset($_POST['delete'])) {
    $xoatk = $_POST['xoatk'];
    $sqlxoa = "DELETE FROM `user` WHERE `taikhoan` ='$xoatk'";
    $conn->query($sqlxoa);
    echo "<script>alert(\"Xóa thông tin thành công,\"); 
        window.location.href = '../admin/quanlytaikhoan.php';
        </script>";
}
if (isset($_POST['deletenews'])) {
    $mabaiviet = $_POST['idn'];
    $sqlxoa = "DELETE FROM `news` WHERE `mabaiviet` ='$mabaiviet'";
    $conn->query($sqlxoa);
    echo "<script>alert(\"Xóa thông tin thành công,\"); 
        window.location.href = '../admin/quanlytintuc.php';
        </script>";
}
if (isset($_POST['confirm'])) {
    $mahoadon = $_POST['mahoadon'];
    $trangthai = $_POST['trangthai'];
    $sqltt = "UPDATE `hoadon` SET `trangthai`='$trangthai' WHERE `mahoadon`='$mahoadon'";
    $conn->query($sqltt);
    if ($trangthai == "Đã nhận hàng") {
        $taikhoan = $_SESSION['taikhoan'];
        $thoigian = date('Y-m-d');
        $sqlnotice = "INSERT INTO `notice`(`taikhoan`, `noidung`, `thoigian`) VALUES ('$taikhoan','Đơn hàng $mahoadon đã được giao thành công.','$thoigian')";
        $conn->query($sqlnotice);
    } elseif ($trangthai == "Hủy") {
        $taikhoan = $_SESSION['taikhoan'];
        $thoigian = date('Y-m-d');
        $sqlnotice = "INSERT INTO `notice`(`taikhoan`, `noidung`, `thoigian`) VALUES ('$taikhoan','Đơn hàng $mahoadon đã bị hủy.','$thoigian')";
        $conn->query($sqlnotice);

        $sqlsphoan = "SELECT `sanpham`,`soluong`,`thoigianban` FROM `hoadonchitiet` WHERE `mahoadon`= $mahoadon";
        $sphoan = $conn->query($sqlsphoan);
        while ($row = $sphoan->fetch_assoc()) {
            $slhoan = $row["soluong"];
            $tensp = $row["sanpham"];
            $thoigianban = $row["thoigianban"];
            $sqlslsp = "SELECT `soluong` FROM `product` WHERE `tensp`='$tensp' ";
            $slsp = $conn->query($sqlslsp);
            while ($rowsl = $slsp->fetch_assoc()) {
                $slmoi = $rowsl["soluong"] + $slhoan;
                $sqlupdate = "UPDATE `product` SET `soluong`='$slmoi' WHERE `tensp`='$tensp'";
                $conn->query($sqlupdate);
            }
            $sqlslban = "SELECT `soluongban` FROM `spbanchay` WHERE `tensp` = '$tensp' AND `thoigian`= '$thoigianban'";
            $slban = $conn->query($sqlslban);
            $row = $slban->fetch_assoc();
            $sltong = $row["soluongban"] - $slhoan;
            $sqlupdatespbc = "UPDATE `spbanchay` SET `soluongban`='$sltong' WHERE `tensp`='$tensp' AND `thoigian`='$thoigian'";
            $conn->query($sqlupdatespbc);
        }
    }
    echo "<script>alert(\"Cập nhật thông tin đơn hàng thành công.\"); 
    window.location.href = '../admin/quanlyhoadon.php';
    </script>";
}
if (isset($_POST['contact'])) {
    $stt = $_POST['stt'];
    $trangthai = $_POST['trangthai'];
    $sqltt = "UPDATE `lienhe` SET `trangthai`='$trangthai' WHERE `stt`='$stt'";
    $conn->query($sqltt);
    echo "<script>alert(\"Cập nhật trạng thái thành công.\"); 
    window.location.href = '../admin/quanlylienhe.php';
    </script>";
}
if (isset($_POST['addadmin'])) {
    $taikhoan = $_POST['taikhoan'];
    $tennguoidung = $_POST['tennguoidung'];
    $matkhau = $_POST['matkhau'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $sqladd = "INSERT INTO `admin`(`tennguoidung`, `taikhoan`, `matkhau`, `sdt`, `diachi`, `email`) VALUES ('$tennguoidung','$taikhoan','$matkhau','$sdt','$diachi','$email')";
    $conn->query($sqladd);
    $sqlad = "UPDATE `user` SET `ad`='1' WHERE `taikhoan`='$taikhoan'";
    $conn->query($sqlad);
    $thoigian = date('Y-m-d');
    $sqlnotice = "INSERT INTO `notice`(`taikhoan`, `noidung`, `thoigian`) VALUES ('$taikhoan','Bạn đã trở thành nhân viên.','$thoigian')";
    $conn->query($sqlnotice);
    echo "<script>alert(\"Đã thêm người dùng thành nhân viên.\");
    window.location.href = '../admin/quanlytaikhoan.php';
    </script>";
}
if (isset($_POST['xoanv'])) {
    $taikhoan = $_POST['taikhoan'];
    $sqlxoa = "DELETE FROM `admin` WHERE `taikhoan`='$taikhoan'";
    $conn->query($sqlxoa);
    $sqlad = "UPDATE `user` SET `ad`='0' WHERE `taikhoan`='$taikhoan'";
    $conn->query($sqlad);
    $thoigian = date('Y-m-d');
    $sqlnotice = "INSERT INTO `notice`(`taikhoan`, `noidung`, `thoigian`) VALUES ('$taikhoan','Bạn không còn là nhân viên của cửa hàng.','$thoigian')";
    $conn->query($sqlnotice);
    echo "<script>alert(\"Đã loại người dùng khỏi danh sách nhân viên.\");
    window.location.href = '../admin/quanlytaikhoan.php';
    </script>";
}
if (isset($_POST['salesp'])) {
    $tensp = $_POST['tensp'];
    $sqlchecktt = "SELECT `tensp` FROM `sale` WHERE `tensp`='$tensp' AND `ngayketthuc`='0000-00-00'";
    if ($conn->query($sqlchecktt)->num_rows > 0) {
        echo "<script>alert(\"Vui lòng kết thúc sự kiện giảm giá trước đó của sản phẩm này.\"); 
        window.location.href = '../admin/quanlygiamgia.php';
                </script>";
    } else {
        $giamgia = $_POST['giamgia'];
        $thoigian = date('Y-m-d');
        $sqlsale = "INSERT INTO `sale`(`tensp`, `giamgia`, `ngaybatdau`, `ngayketthuc`) VALUES ('$tensp','$giamgia','$thoigian','Chưa kết thúc')";
        $conn->query($sqlsale);
        echo "<script>alert(\"Đã giảm giá sản phẩm này.\");
    window.location.href = '../admin/quanlygiamgia.php';
    </script>";
    }
}
if (isset($_POST['closesale'])) {
    $stt = $_POST['stt'];
    $thoigian = date('Y-m-d');
    $sqlclosesale = "UPDATE `sale` SET `ngayketthuc`='$thoigian' WHERE `stt`='$stt'";
    $conn->query($sqlclosesale);
    echo "<script>alert(\"Đợt giảm giá đã được kết thúc.\");
    window.location.href = '../admin/quanlygiamgia.php';
    </script>";
}