<?php
require 'db.php';
require 'models/user.php';
$user = new User();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->register($email, $password);
    header('location:register.php');
}