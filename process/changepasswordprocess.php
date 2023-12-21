<?php
require '../models/user.php';
session_start();
$user = new User();
if (isset($_SESSION['email'])) {
    if (isset($_POST['oldpassword'])) {
        $email = $_SESSION['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $newpasswordagain = $_POST['newpasswordagain'];
        $getPassword = $user->getPassword($email);
        if (password_verify($oldpassword, $getPassword[0]['matkhau'])) {
            if ($newpassword == $newpasswordagain) {
                $passwordhash = password_hash($newpassword, PASSWORD_DEFAULT);
                $user->updatePassword($email, $passwordhash);
                header('location:../views/login.php');
            }
        } else {
            echo 'sai password';
        }
    }else{
        die("Cảnh báo: Lỗi");
    }
}else{
    die("Cảnh báo: Lỗi");
}