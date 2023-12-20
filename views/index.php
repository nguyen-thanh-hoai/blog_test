<?php
require '../models/blog.php';
$blog = new Blog();
if (isset($_GET['timkiem'])) {
    $total =  $blog->getTotalBlogByKeyWord($_GET['timkiem']);
} else if (isset($_GET['danhmuc'])) {
    $total = $blog->getTotalBlogByDanhMuc($_GET['danhmuc']);
} else {
    $total =  $blog->getTotalBlog();
}
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 2;
$danhmuc = $blog->getDanhMuc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Blog-Test</title>

    <!-- Swipe CSS -->
    <link type="text/css" href="../css/swipe.css" rel="stylesheet">
</head>

<body style="font-family: Arial, sans-serif;">
    <div class="row">
        <div class="col-md-2 col-2 mt-5">
            <h3>Danh mục</h3>
            <ul>
                <?php
                foreach ($danhmuc as $valueDanhMuc) {
                ?>
                    <li class="nav-item">
                        <a href="index.php?danhmuc=<?php echo $valueDanhMuc['danhmuc'] ?>" class="nav-link">
                            <?php echo $valueDanhMuc['danhmuc'] ?> (<?php echo $blog->getTotalBlogByDanhMuc($valueDanhMuc['danhmuc']) ?>)
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-md-10 col-10 align-items-center">
            <div class="container">
                    <nav id="navbar-main" aria-label="Primary navigation" class="navbar headroom ">
                        <div class="container position-relative">
                            <a class="navbar-brand mr-lg-4" href="index.php">
                                <img class="navbar-brand-light" src="../image/logo.png" alt="Logo dark">
                            </a>
                            <div class="navbar-collapse collapse mr-lg-4" id="navbar_global">
                                <div class="navbar-collapse-header">
                                    <div class="row">
                                        <div class="col-6 collapse-brand">
                                            <a href="index.php">
                                                <img src="../assets/images/logo-dark.png" alt="Logo dark">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center ">
                                <a href="../views/register.php" class="btn btn-outline-soft d-none d-md-inline mr-md-3 animate-up-2" style="background-color: #000;">ĐĂNG KÍ</a>
                                <a href="../views/login.php" class="btn btn-md btn-tertiary text-white d-none d-md-inline animate-up-2" >ĐĂNG NHẬP<i ></i></a>
                            </div>
                        </div>
                    </nav>
            </div>
            <div class="container">
                <form action="index.php" method="get">
                    <div class="row row-grid align-items-center mb-5 mt-3">
                        <div class="col-10 col-lg-10 ">
                            <input type="text" value="<?php $timkiem = isset($_GET['timkiem']) ? $_GET['timkiem'] : '' ?>" name="timkiem" class="form-control" id="timkiem" maxlength="100" required placeholder="Tìm kiếm">
                        </div>
                        <div class="col-2 col-lg-2 ">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_GET['timkiem'])) {
                $allBlog = $blog->getBlogByKeyWordPage($_GET['timkiem'], $page, $perPage);
            } else if (isset($_GET['danhmuc'])) {
                $allBlog = $blog->getBlogByDanhMucPage($_GET['danhmuc'], $page, $perPage);
            } else {
                $allBlog = $blog->getBlogByPage($page, $perPage);
            }
            foreach ($allBlog as $value) {
            ?>
                <div class="container">
                    <div class="row row-grid align-items-center justify-content-center mb-lg-7">
                        <div class=" col-lg-5 col-md-5 col-5 mr-lg-auto">
                            <img style="width:50%;height:50%;" src="../image/<?php echo $value['hinh'] ?>" class="w-100 " alt="">
                        </div>
                        <div class="col-12 col-lg-7 col-md-7 order-lg-2">
                            <h2 class="mb-4"><?php echo $value['tieude'] ?></h2>
                            <p class="font-a" ><?php echo $value['noidung'] ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            $total_pages = ceil($total / $perPage);
            ?>

        </div>
    </div>
    <nav aria-label="...">
        <ul class="pagination pagination-sm justify-content-center">
            <?php
            if (isset($_GET['timkiem'])) {
                $timkiem = $_GET['timkiem'];
                if ($total_pages > 1) {
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item'><a class='page-link' href='index.php?timkiem=$timkiem&page=$i'>$i</a></li>";
                    }
                }
            } else if (isset($_GET['danhmuc'])) {
                $danhmuc = $_GET['danhmuc'];
                if ($total_pages > 1) {
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item'><a class='page-link' href='index.php?danhmuc=$danhmuc&page=$i'>$i</a></li>";
                    }
                }
            } else {
                if ($total_pages > 1) {
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                    }
                }
            }
            ?>
        </ul>
    </nav>
</body>

</html>