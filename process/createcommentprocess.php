<?php
require '../models/blog.php';
if(isset($_POST['comment'])){
    $blog = new Blog();
    $id = $_POST['id'];
    $email = $_POST['email'];
    $blog->createComment($id, $_POST['comment'],$email);
    header("location: ../views/comment.php?id=$id");
}