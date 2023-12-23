<?php
require '../models/user.php';
session_start();
$user = new User();
if (isset($_SESSION['email']) && $_SESSION['role'] == 0) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = $_POST['password'];
            $role = $_POST['role'];
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $user->register($email, $passwordhash, $role);
            header('location:../views/dashboardUser.php');
        } else {
            die("Cảnh báo: Email không hợp lệ.");
        }
    } else {
        die("Cảnh báo: Lỗi");
    }
}
