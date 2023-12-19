<?php
require 'blog.php';
session_start();
$blog = new Blog();
if(isset($_GET['timkiem'])) {
    $total =  $blog->getTotalBlogByKeyWord($_GET['timkiem']);
    $check = 1;
}
else if(isset($_GET['danhmuc'])){
    $total = $blog->getTotalBlogByDanhMuc($_GET['danhmuc']);
    $check = 2;
}
else{
    $total =  $blog->getTotalBlog();
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 2;
$danhmuc = $blog->getDanhMuc();
?>
<!-- Primary Meta Tags -->
<title>Swipe - Mobile App One Page Bootstrap 5 Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Swipe - Mobile App One Page Bootstrap 5 Template">
<meta name="author" content="Themesberg">
<meta name="description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
<meta name="keywords" content="bootstrap, bootstrap 5, bootstrap 5 one page, bootstrap 5 mobile application, one page template, bootstrap 5 one page template, themesberg, themesberg one page, one page template bootstrap 5" />
<link rel="canonical" href="https://themesberg.com/product/bootstrap/swipe-free-mobile-app-one-page-bootstrap-5-template">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/swipe/">
<meta property="og:title" content="Swipe - Mobile App One Page Bootstrap 5 Template">
<meta property="og:description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/swipe/swipe-thumbnail.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/swipe/">
<meta property="twitter:title" content="Swipe - Mobile App One Page Bootstrap 5 Template">
<meta property="twitter:description" content="Free Mobile Application One Page Bootstrap 5 Template by Themesberg">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/swipe/swipe-thumbnail.jpg">



<!-- Swipe CSS -->
<link type="text/css" href="../css/swipe.css" rel="stylesheet">
<div class="row">
    <div class="col-1">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar col-1">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="dashboard.php" class="nav-link bg-dark">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p style="color: #fff;">
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php
                        foreach($danhmuc as $danhmucvalue){
                        ?>
                        <li class="nav-item">
                            <a href="dashboard.php?danhmuc=<?php echo $danhmucvalue['danhmuc']?>" class="nav-link text-center">
                                <p>
                                    <?php echo $danhmucvalue['danhmuc']?>
                                </p>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
    </div>
    <div class="col-11">

        <body>
            <header class="header-global" id="home">
                <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-theme-secondary">
                    <div class="container position-relative">
                        <a class="navbar-brand mr-lg-4" href="../views/index.php">
                            <img class="navbar-brand-light" src="../image/logo.png" alt="Logo dark">
                        </a>
                        <div class="navbar-collapse collapse mr-auto" id="navbar_global">
                            <div class="navbar-collapse-header">
                                <div class="row">
                                    <div class="col-6 collapse-brand">
                                        
                                    </div>
                                    <div class="col-6 collapse-close">
                                        <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                                <li class="nav-item btn btn-primary">
                                    <a href="../views/createblog.php?>" class="nav-link" style="color: #fff">
                                        CREATE
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center">
                            <?php
                            $email = 'null';
                            if(isset($_SESSION['email'])){
                                $email = $_SESSION['email'];
                            }
                            
                            ?>
                            <h3 class=" d-none d-md-inline mr-md-3">Xin chào: <?php echo $email ?></h3>
                            <a href="../process/logoutprocess.php" class="btn btn-outline-soft d-none d-md-inline mb-3 mr-md-3 animate-up-2">ĐĂNG XUẤT</a>
                            <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
                <section class="section section-lg" id="about">
                    <div class="container">
                        <form action="dashboard.php" method="get">
                            <div class="row row-grid align-items-center ">
                                <div class="col-12 col-lg-10 order-lg-2">
                                    <input type="text" name="timkiem" class="form-control" id="timkiem" required placeholder="Tìm kiếm">
                                </div>
                                <div class="col-12 col-lg-2 order-lg-2">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <?php
                $stt = 1;
                if(isset($_GET['timkiem'])) {
                    $allBlog = $blog->getBlogByKeyWord($_GET['timkiem']);
                }
                else if(isset($_GET['danhmuc'])){
                    $allBlog = $blog->getBlogByDanhMuc($_GET['danhmuc']);
                }
                else{
                    $allBlog = $blog->getBlogByPage($page, $perPage);
                }
                ?>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1%">STT</th>
                                <th scope="col" style="width: 50%">Tiêu đề</th>
                                <th scope="col" style="width: 15%">Danh mục</th>
                                <th scope="col" style="width: 15%">Tác giả</th>
                                <th scope="col" style="width: 20%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allBlog as $value) { ?>
                            <tr>
                                <td class="text-start"><?php echo $stt++ ?></td>
                                <td><?php echo $value['tieude']?></td>
                                <td><?php echo $value['danhmuc']?></td>
                                <td><?php echo $value['tacgia']?></td>
                                <td>
                                <a href="../views/updateblog.php?id=<?php echo $value['id']?>" class="btn btn-dark animate-up-2">
                                    Update
                                    <span class="icon icon-xs ">
                                        <i class="fas fa-external-link-alt"></i>
                                    </span>
                                </a>
                                <a href="../process/deleteblogprocess.php?id=<?php echo $value['id']?>" class="btn btn-dark animate-up-2">
                                    Delete
                                    <span class="icon icon-xs ">
                                        <i class="fas fa-external-link-alt"></i>
                                    </span>
                                </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php
                $total_pages = ceil($total / $perPage);
                ?>
                <nav aria-label="...">
                    <ul class="pagination pagination-sm justify-content-center">
                        <?php
                        if ($total_pages > 1) {
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=$i'>$i</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </main>
            <footer class="footer py-5 pt-lg-6">
            </footer>




        </body>
    </div>
</div>