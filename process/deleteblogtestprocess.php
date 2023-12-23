<?php
require '../models/blog_test.php';
session_start();
$blog = new BlogTest();
if (isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $key = '';
        if (isset($_GET['timkiem'])) {
            $key = $key . 'timkiem=' . $_GET['timkiem'] . '&';
        } else if (isset($_GET['danhmuc'])) {
            $key = $key . 'danhmuc=' . $_GET['danhmuc'] . '&';
        } else if (isset($_GET['the'])) {
            $key = $key . 'the=' . $_GET['the'] . '&';
        } else if (isset($_GET['page'])) {
            $key = $key . 'page=' . $_GET['page'] . '&';
        }
        $id = $_GET['id'];
        $getBlog = $blog->getBlogById($id);
        $image = '../image/' . $getBlog[0]['hinh'];
        $blog->delete($id);
        unlink($image);
        header("location:../views/dashboardBlogTest.php?$key");
    } else {
        die("Cảnh báo: Lỗi");
    }
}
