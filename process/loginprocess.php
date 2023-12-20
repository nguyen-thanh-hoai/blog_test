<?php

require '../models/user.php';
session_start();
$user = new User();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $getPassword = $user->getPassword($email);
    if (!$getPassword) {
        header('location:../views/login.php');
        echo "Email không tồn tại";
        exit;
    }

    if (password_verify($password, $getPassword[0]['matkhau'])) {
        $_SESSION['email'] = $email;
        header('location:../models/dashboard.php');
    } else {
        header('location:../views/login.php');
    }
}
