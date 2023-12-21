<?php
require '../models/user.php';
$user = new User();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $user->register($email, $passwordhash);
        header('location:../views/dashboardUser.php');
    } else {
        die("Cảnh báo: Email không hợp lệ.");
    }
}
else{
    die("Cảnh báo: Lỗi");
}
