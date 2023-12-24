<?php
require '../models/user.php';
session_start();
$user = new User();
if (isset($_SESSION['email']) && $_SESSION['role'] == 0) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $id = $_POST['id'];
        if (isset($_POST['password'])) {
            $role = $_POST['role'];
            $password = $_POST['password'];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $user->updateUser($email, $passwordHash, $role, $id);
            header('location:../views/dashboardUser.php');
        }
    }
}
