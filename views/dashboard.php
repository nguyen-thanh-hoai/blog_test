<?php
require '../models/blog.php';
session_start();
if (isset($_SESSION['email'])) {
    $blog = new Blog();
    if (isset($_GET['timkiem'])) {
        $total =  $blog->getTotalBlogByKeyWord($_GET['timkiem']);
    } else if (isset($_GET['danhmuc'])) {
        $total = $blog->getTotalBlogByDanhMuc($_GET['danhmuc']);
    } else {
        $total =  $blog->getTotalBlog();
    }

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perPage = 10;
    $danhmuc = $blog->getDanhMuc();
?>
    <!-- Primary Meta Tags -->
    <title>Blog-Test</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
    <!-- Swipe CSS -->
    <link type="text/css" href="../css/swipe.css" rel="stylesheet">
    <div class="row">
        <div class="col-md-2 mt-3 col-2">
            <div class="sidebar">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link bg-dark">
                            <p style="color: #fff;">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardUser.php" class="nav-link bg-dark">
                            <p style="color: #fff;">
                                User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardBlog.php" class="nav-link bg-dark">
                            <p style="color: #fff;">
                                Blog
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboardBlogTest.php" class="nav-link bg-dark">
                            <p style="color: #fff;">
                                Blog Test
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chat.php" class="nav-link bg-dark">
                            <p style="color: #fff;">
                                Chat
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-10">

        </div>
    </div>
<?php
} else {
    die("Cảnh báo: Bạn không có quyền truy cập!!!");
}
?>