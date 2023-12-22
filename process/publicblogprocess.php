<?php
require '../models/blog_test.php';
session_start();
$blog = new BlogTest();
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 0){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $getBlog = $blog->getBlogById($id);
            $blog->publicBlog($getBlog[0]['tieude'],$getBlog[0]['noidung'],$getBlog[0]['danhmuc'],$getBlog[0]['hinh'],$getBlog[0]['tacgia'],$getBlog[0]['the']);
            $blog->delete($id);
            header("location:../views/dashboardBlogTest.php");
        }
    }
}