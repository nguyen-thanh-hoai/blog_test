<?php
require '../models/db.php';
require '../models/user.php';
$user = new User();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $user->register($email, $passwordhash);
    header('location:../views/login.php');
}