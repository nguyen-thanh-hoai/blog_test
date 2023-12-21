<?php
require '../models/user.php';
$user = new User();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user->delete($id);
    header('location:../views/dashboardUser.php');
}
else{
    die("Cảnh báo: Lỗi");
}
?>