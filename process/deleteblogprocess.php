<?php
require '../models/blog.php';
$blog = new Blog();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $getBlog = $blog->getBlogById($id);
    $image = '../image/'. $getBlog[0]['hinh'];
    $blog->delete($id);
    unlink($image);
    header('location:../models/dashboard.php');
}
?>