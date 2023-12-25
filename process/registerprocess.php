<?php
require '../models/user.php';
$user = new User();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $checkEmail = $user->checkEmail($email);
    if ($checkEmail == 0) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $role = 2;
            $password = $_POST['password'];
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $user->register($email, $passwordhash, $role);
            header('location:../views/index.php');
        } else {
            die("Cảnh báo: Email sai vui lòng trở về trang trước để tiếp tục đăng kí");
        }
    }
    else{
        die('Cảnh báo: Email đã tồn tại vui lòng trở về trang trước để tiếp tục đăng kí');
    }
} else {
    die("Cảnh báo: Lỗi");
}
