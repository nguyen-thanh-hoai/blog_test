<?php
require 'models/blog.php';
$blog = new Blog();
if(isset($_POST['tieude'])){
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $image = $_FILES['hinh']['name'];
    $target_dir1 = "./image/";
    $target_file1 = $target_dir1.basename($_FILES["hinh"]["name"]);   
    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file1);
    $blog->createBlog($tieude, $noidung,$image);
    header('location:index.php');
}
?>