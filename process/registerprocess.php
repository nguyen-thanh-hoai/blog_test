<?php
require '../models/user.php';
$user = new User();
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $role = $_POST['role'];
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $user->register($email, $passwordhash, $role);
        header('location:../views/login.php');
    } else {
        header('location:../views/register.php');
    }
}
else{
    die("Cảnh báo: Lỗi");
}
