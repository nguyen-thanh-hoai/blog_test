<?php
require '../models/blog.php';
session_start();
$blog = new Blog();
if (isset($_SESSION['email']) && $_SESSION['role'] != 2) {
    if (isset($_POST['tieude'])) {
        $id = $_POST['id'];
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        $danhmuc = $_POST['danhmuc'];
        $tacgia = $_SESSION['email'];
        $the = $_POST['the'];
        $image = $_FILES['hinh']['name'];
        $target_dir1 = "../image/";
        $target_file1 = $target_dir1 . basename($_FILES["hinh"]["name"]);
        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file1);
        $blog->updateBlog($id, $tieude, $noidung, $danhmuc, $image, $the, $tacgia);
        header('location:../views/dashboardBlog.php');
    } else {
        die("Cảnh báo: Lỗi");
    }
}
