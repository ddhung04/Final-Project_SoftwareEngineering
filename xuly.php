<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('includes/config.php');
if ($_SESSION['taikhoan'] == null) {
    echo "<script>
    alert(\"Bạn phải đăng nhập để sử dụng chức năng này\");
    window.location.href = 'index.php';
</script>";
} else {
    if (isset($_POST['add'])) {
        $link = $_POST['link'];
        $id = $_POST['id'];
        $taikhoan = $_POST["taikhoan"];
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $loaisp = $_POST["loaisp"];
        $gia = $_POST["gia"];
        $info = $_POST["info"];
        $ncc = $_POST["ncc"];
        $hinhanh = $_POST["hinhanh"];
        $sqlcheck = "SELECT * FROM `spyeuthich` WHERE `masp`='$masp' AND `taikhoan`= '$taikhoan'";
        $ketqua=$conn->query($sqlcheck);
        if ($ketqua->num_rows > 0) {
            echo "<script>
            alert(\"Sản phẩm đã có trong danh sách yêu thích\");
            window.location.href = '$link';
        </script>";
        } else {
            $sql = "INSERT INTO `spyeuthich`(`id`, `taikhoan`, `masp`, `tensp`, `loaisp`, `gia`, `info`, `ncc`, `hinhanh`) VALUES ('$id','$taikhoan','$masp','$tensp','$loaisp','$gia','$info','$ncc','$hinhanh')";
            $conn->query($sql);
            echo "<script>
    alert(\"Thêm vào danh sách yêu thích thành công\");
    window.location.href = '$link';
</script>";
        }
    }
    if (isset($_POST['addcart'])) {
        $link = $_POST['link'];
        $id = $_POST['id'];
        $tensp = $_POST['tensp'];
        $loaisp = $_POST['loaisp'];
        $gia = $_POST['gia'];
        $ncc = $_POST['ncc'];
        $soluong = '1';
        $cart = array($id, $tensp, $loaisp, $gia, $ncc, $soluong);
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
        array_push($_SESSION['cart'], $cart);
        echo "<script>
        alert(\"Thêm vào giỏ hàng thành công\");
        window.location.href = '$link';
    </script>";
    }
    if (isset($_POST['send'])) {
        $link = $_POST['link'];
        $taikhoan = $_SESSION['taikhoan'];
        $noidung = $_POST["noidung"];
        $tensanpham = $_POST["tensanpham"];
        $thoigian = date('Y-m-d');
        $sql = "INSERT INTO `danhgiasanpham`(`tensanpham`, `taikhoan`, `noidung`, `thoigian`) VALUES ('$tensanpham','$taikhoan','$noidung','$thoigian')";
        $conn->query($sql);
        echo "<script>
    alert(\"Đã thêm bình luận.\")
            window.location.href = '$link';
</script>";
    }
    if (isset($_POST['delete'])) {
        $link = $_POST['link'];
        $taikhoan = $_POST["taikhoan"];
        $masp = $_POST["masp"];
        $sql = "DELETE FROM `spyeuthich` WHERE `taikhoan`='$taikhoan' AND `masp`='$masp'";
        $conn->query($sql);
        echo "<script>alert(\"Bỏ khỏi danh sách yêu thích thành công\");
    window.location.href = '$link';
    </script>";
    }
}