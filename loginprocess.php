<?php
require 'db.php';
require 'models/user.php';
$user = new User();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $user->login($email, $password);
    if($login == 1){
        header('location:index.php');
    }
    else{
        header('location:login.php');
    }
}
?>