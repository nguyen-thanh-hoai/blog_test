<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['role']);
header('location:../views/login.php');
?>