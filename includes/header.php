<?php
if (isset($_POST['view'])) {
    $stt = $_POST['stt'];
    $taikhoan = $_POST['taikhoan'];
    $sqlview = "UPDATE `notice` SET `trangthai`='Đã đọc' WHERE `taikhoan`='$taikhoan' AND `stt`='$stt'";
    $conn->query($sqlview);
    header("Location: #");
}
?>


<section class="myheader">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-2 ">
                <a href="index.php"><img src="img/logo.jpg" class="img-fluid" alt="logo"></a>
            </div>
            <div class="col-md-5  ">
                <form class="d-flex " action="result.php" method="POST">
                    <input type="text" class="form-control" name="keyword" placeholder="Nhập tên sản phẩm muốn tìm kiếm"
                        required>
                    <button class="btn btn-primary" style="width: 20%;" type="submit" name="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="col-md-3 ">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <div class="fs-3 py-1"><i class="fa-solid fa-phone" style="color: #0d6efd;"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                SĐT Tư Vấn<br>
                                <strong class="text-danger">0969920568</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <div class="fs-3 py-1"><i class="fa-solid fa-user " style="color: #0d6efd;"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                Xin Chào!<br>
                                <?php
                                $kh = "";
                                if ($_SESSION["khachhang"] != null && $_SESSION["quantri"] == 0)
                                    $kh = "./user/profile.php";
                                elseif ($_SESSION["khachhang"] != null && $_SESSION["quantri"] >= 1)
                                    $kh = "./admin/index.php";
                                else
                                    $kh = "login.php";
                                ?>
                                <strong><a class="alink" href="<?= $kh ?>">
                                        <?php if ($_SESSION["khachhang"] != null)
                                            echo $_SESSION["khachhang"];
                                        else
                                            echo "Đăng Nhập";
                                        ?>
                                    </a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 ">
                <div class="row">
                    <div class="col">
                        <a href="favor.php" class="position-relative">
                            <span class="fs-2"><i class="fa-regular fa-heart"></i></span>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php
                                if ($_SESSION['khachhang'] == null) {
                                    echo 0;
                                } else {
                                    $tk = $_SESSION['taikhoan'];
                                    $sql = "SELECT COUNT(*) FROM spyeuthich where `taikhoan`='$tk'";
                                    $slsp = $conn->query($sql);
                                    $row = $slsp->fetch_assoc();
                                    $totalRows = $row['COUNT(*)'];
                                    echo $totalRows;
                                }
                                ?>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="cart.php" class="position-relative">
                            <span class="fs-2"><i class="fa-solid fa-basket-shopping"></i></span>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php
                                if ($_SESSION['cart'] == null) {
                                    echo 0;
                                } else {
                                    $i = 1;
                                    $slsp = 0;
                                    foreach ($_SESSION['cart'] as $sp) {
                                        $slsp = $i;
                                        $i++;
                                    }
                                    echo $slsp;
                                }

                                ?>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <a class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                            aria-controls="offcanvasScrolling">
                            <span class="fs-2"><i class="fa-regular fa-bell"></i></span>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php
                                if ($_SESSION['khachhang'] == null) {
                                    echo 0;
                                } else {
                                    $tk = $_SESSION['taikhoan'];
                                    $sql = "SELECT COUNT(*) FROM notice where `taikhoan`='$tk'AND trangthai=''";
                                    $slsp = $conn->query($sql);
                                    $row = $slsp->fetch_assoc();
                                    $totalRows = $row['COUNT(*)'];
                                    echo $totalRows;
                                }
                                ?>
                            </span>
                        </a>
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                            tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <?php
                                $tk = $_SESSION['taikhoan'];
                                $sql = "SELECT * FROM `notice` WHERE `taikhoan`='$tk'AND trangthai=''";
                                $ketqua = $conn->query($sql);
                                if ($ketqua->num_rows > 0) {
                                    while ($row = $ketqua->fetch_assoc()) {
                                ?>
                                <div class="pb-2">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title"><?= $row["thoigian"] ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"><?= $row["noidung"] ?></p>
                                            <form method="post">
                                                <input type="hidden" name="stt" value="<?= $row["stt"] ?>">
                                                <input type="hidden" name="taikhoan" value="<?= $tk ?>">
                                                <button class="btn btn-primary" type="submit" name="view">Đánh dấu là đã
                                                    đọc.</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                } else
                                    echo "<h4>Bạn không có thông báo nào</h4>" ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>