<?php
require '../models/blog.php';
$blog = new Blog();
if(isset($_POST['tieude'])){
    $id = $_POST['id'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $danhmuc = $_POST['danhmuc'];
    $image = $_FILES['hinh']['name'];
    $target_dir1 = "../image/";
    $target_file1 = $target_dir1.basename($_FILES["hinh"]["name"]);   
    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file1);
    $blog->updateBlog($id,$tieude, $noidung, $danhmuc,$image);
    header('location:../models/dashboard.php');
}
?>