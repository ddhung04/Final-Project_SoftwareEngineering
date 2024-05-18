<section class="mymenu bg-primary ">
    <div class="container">
        <div class="row">
            <div class="col-md ">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand d-none" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-white" aria-current="page" href="index.php">Trang
                                        Chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Danh Mục
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $sqldmsp = "SELECT * FROM `phanloai`";
                                        $dmsp = $conn->query($sqldmsp);
                                        if ($dmsp->num_rows > 0) {
                                            while ($row = $dmsp->fetch_assoc()) {
                                        ?>
                                        <li><a class="dropdown-item "
                                                href="../product.php?id=<?= $row["loaisp"] ?>"><?= $row["loaisp"] ?></a>
                                        </li>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Sản Phẩm
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item " href="myAnLien.html">Mỳ ăn liền</a></li>
                                        <li><a class="dropdown-item" href="snack.html">Snack</a></li>
                                        <li><a class="dropdown-item" href="anVatNK.html">Đồ ăn vặt nhập khẩu</a>
                                        </li>
                                        <li><a class="dropdown-item" href="banhKeo.html">Bánh kẹo</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="giaVi.html">Gia vị thực phẩm</a></li>
                                        <li><a class="dropdown-item" href="gao.html">Gạo</a></li>
                                        <li><a class="dropdown-item" href="tptuoi.html">Thực phẩm tươi</a></li>
                                        <li><a class="dropdown-item" href="tpDongHop.html">Thực phẩm đóng hộp</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Mỹ phẩm</a></li>
                                        <li><a class="dropdown-item" href="#">Giày dép</a></li>
                                        <li><a class="dropdown-item" href="#">Phụ kiện thời trang</a></li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Phụ kiện điện thoại</a></li>
                                        <li><a class="dropdown-item" href="#">Phụ kiện oto, xe máy</a></li>
                                        <li><a class="dropdown-item" href="#">Đồ nội thất</a></li>


                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-white" href="../news.php" aria-disabled="true">Tin
                                        tức</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-white" href="../ques.php" aria-disabled="true">Câu hỏi
                                        thường
                                        gặp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-white" href="../recruit.php" aria-disabled="true">Tuyển
                                        dụng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-white" href="../contact.php" aria-disabled="true">Liên
                                        hệ</a>
                                </li>
                            </ul>
                            <div class="col-md-1">
                                <a class="alink" href="logout.php"><button class="btn btn-danger" type="submit"><i
                                            class="fa-solid fa-right-from-bracket"></i></button></a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
    </div>
</section>