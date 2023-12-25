<?php
require '../models/user.php';
session_start();
if (isset($_SESSION['email'])) { ?>
    <?php
    if (isset($_SESSION['email'])) {
        $user = new User();
        if (isset($_GET['timkiem'])) {
            $total = $user->getTotalUserByKeyWord($_GET['timkiem']);
        } else {
            $total = $user->getTotalUser();
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = 10;
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

                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-10">

                <body style="font-family: Arial, sans-serif;">
                    <nav id="navbar-main" aria-label="Primary navigation" class="navbar headroom navbar-light ">
                        <div class="container position-relative">
                            <div class="row">
                                <div class="col-1 col-md-1 mt-3">
                                    <a class="navbar-brand" href="../process/logoutprocess.php">
                                        <img class="navbar-brand-light " src="../image/logo.png" alt="Logo dark">
                                    </a>
                                </div>
                                <div class="col-11 col-md-11">
                                    <div class="d-flex align-items-center offset-4">
                                        <?php
                                        $email = 'null';
                                        if (isset($_SESSION['email'])) {
                                            $email = $_SESSION['email'];
                                        }
                                        ?>
                                        <h5 class="mr-md-3">Xin chào: <?php echo $email ?></h3>
                                            <a href="../views/changepassword.php" class="btn btn-outline-soft d-none d-md-inline mb-3 mr-md-3 animate-up-2" style="font-family: Arial, sans-serif;">ĐỔI MẬT KHẨU</a>
                                            <a href="../process/logoutprocess.php" class="btn btn-outline-soft d-none d-md-inline mb-3 mr-md-3 animate-up-2" style="font-family: Arial, sans-serif;">ĐĂNG XUẤT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="container">
                        <form action="dashboardUser.php" method="get">
                            <div class="row row-grid align-items-center ">
                                <div class="col-10 col-lg-10 order-lg-2">
                                    <input type="text" value="<?php echo $timkiem = isset($_GET['timkiem']) ? $_GET['timkiem'] : '' ?>" name="timkiem" class="form-control" id="timkiem" required placeholder="Tìm kiếm">
                                </div>
                                <div class="col-2 col-lg-2 order-lg-2">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class=" offset-md-9 btn btn-primary">
                        <?php
                        $canCreate = '../views/createuser.php';
                        $notCreate = '../views/dashboardUser.php' ?>
                        <a href="<?php if ($_SESSION['role'] == 0) {
                                        echo $canCreate;
                                    } else {
                                        echo $notCreate;
                                    }
                                    ?>" class="nav-link" style="color: #fff">
                            CREATE
                        </a>
                    </div>
                    <?php
                    $stt = (($page - 1) * $perPage) + 1;
                    if (isset($_GET['timkiem'])) {
                        $allUser = $user->getUSerByKeyWordPage($_GET['timkiem'], $page, $perPage);
                    } else {
                        $allUser = $user->getAllUser();
                    }
                    ?>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 1%">STT</th>
                                    <th scope="col" style="width: 49%">Email</th>
                                    <th scope="col" style="width: 30%">Ngày cập nhật</th>
                                    <th scope="col" style="width: 20%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allUser as $value) { ?>
                                    <tr>
                                        <td class="text-start"><?php echo $stt++ ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['update_at'] ?></td>
                                        <td>
                                            <?php
                                            $id = $value['id'];
                                            $canUpdate = "../views/updateuser.php?id=$id";
                                            $notUpdate = "../views/dashboardUser.php";
                                            ?>
                                            <a href="<?php if ($_SESSION['role'] == 0) {
                                                            echo $canUpdate;
                                                        } else {
                                                            echo $notUpdate;
                                                        }
                                                        ?>" class="btn btn-dark animate-up-2">
                                                Update
                                                <span class="icon icon-xs ">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </span>
                                            </a>
                                            <?php
                                            $canDelete = "../process/deleteuserprocess.php?id=$id";
                                            $notDelete = "../views/dashboardUser.php";
                                            ?>
                                            <a href="<?php if ($_SESSION['role'] == 0) {
                                                            echo $canDelete;
                                                        } else {
                                                            echo $notDelete;
                                                        }
                                                        ?>" class="btn btn-dark animate-up-2">
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
                            if (isset($_GET['timkiem'])) {
                                $timkiem = $_GET['timkiem'];
                                if ($total_pages > 1) {
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<li class='page-item'><a class='page-link' href='dashboardUser.php?timkiem=$timkiem&page=$i'>$i</a></li>";
                                    }
                                }
                            } else {
                                if ($total_pages > 1) {
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<li class='page-item'><a class='page-link' href='dashboardUser.php?page=$i'>$i</a></li>";
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </body>
            </div>
        </div>
    <?php
    } else {
        die("Cảnh báo: Bạn không có quyền truy cập!!!");
    }
    ?>
<?php
}
?>