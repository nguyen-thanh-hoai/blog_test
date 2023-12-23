<?php
require '../models/user.php';
session_start();
$user = new User();
if (isset($_SESSION['email']) && $_SESSION['role'] == 0) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user->delete($id);
        header('location:../views/dashboardUser.php');
    } else {
        die("Cảnh báo: Lỗi");
    }
}
