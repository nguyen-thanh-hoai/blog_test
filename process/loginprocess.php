<?php

require '../models/user.php';
session_start();
$user = new User();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $getPassword = $user->getPassword($email);
    $getUser = $user->getUserByEmail($email);
    if (!$getPassword) {
        header('location:../views/login.php');
        echo "Email không tồn tại";
        exit;
    }

    if (password_verify($password, $getPassword[0]['matkhau'])) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $getUser[0]['vitri'];
        header('location:../views/dashboard.php');
    } else {
        header('location:../views/login.php');
    }
}
else{
    die("Cảnh báo: Lỗi");
}
