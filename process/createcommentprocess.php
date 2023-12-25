<?php
require '../models/blog.php';
if(isset($_POST['comment'])){
    $blog = new Blog();
    $id = $_POST['id'];
    $date_string = date("H-i-s");
    $blog->createComment($id, $_POST['comment'],$date_string);
    header("location: ../views/comment.php?id=$id");
}