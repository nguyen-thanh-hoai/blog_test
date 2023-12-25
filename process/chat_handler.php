<?php
//require __DIR__ . '/vendor/autoload.php';
require '../vendor/autoload.php';
require '../models/user.php';
session_start();
$user = new User();
$options = array(
  'cluster' => 'ap1',
  'useTLS' => true
);
$pusher = new Pusher\Pusher(
  '7db1eaf43eca75e7d009',
  'e38e6b14bfdbc0064a09',
  '1729757',
  $options
);
$message = $_POST['message'];
$emailsend = $_SESSION['emailsend'];
$user->createMessage($_SESSION['email'], $emailsend,$message);
$data = array(
  'message'=>$message,
);
$pusher->trigger('my-channel', 'my-event', $data);
header('location:../views/chat.php');
