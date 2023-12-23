<?php
require '../models/blog.php';
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] != 2) {
    $blog = new Blog();
    if (isset($_POST['tieude'])) {
        $tieude = $_POST['tieude'];
        $noidung = $_POST['noidung'];
        $danhmuc = $_POST['danhmuc'];
        $image = $_FILES['hinh']['name'];
        $tacgia = $_SESSION['email'];
        $the = $_POST['the'];
        $target_dir1 = "../image/";
        $target_file1 = $target_dir1 . basename($_FILES["hinh"]["name"]);
        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file1);
        $blog->createBlog($tieude, $noidung, $danhmuc, $image, $tacgia, $the);
        header('location:../views/dashboardBlog.php');
    } else {
        die("Cảnh báo: Lỗi");
    }
}
