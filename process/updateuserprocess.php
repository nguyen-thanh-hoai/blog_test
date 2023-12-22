<?php
require '../models/user.php';
$user = new User();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $id = $_POST['id'];
        if (isset($_POST['password'])) {
            $role = $_POST['role'];
            $password = $_POST['password'];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $user->updateUser($email, $passwordHash,$role, $id);
        } else {
            $user->updateUser($email, $password,$role, $id);
        }
        header('location:../views/dashboardUser.php');
    } else {
        header('location:../views/dashboardUser.php');
    }
}
else{
    die("Cảnh báo: Lỗi");
}
