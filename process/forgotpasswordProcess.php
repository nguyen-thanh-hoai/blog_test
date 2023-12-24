<?php

require '../models/user.php';
require("../PHPMailer-master/src/PHPMailer.php");
require("../PHPMailer-master/src/SMTP.php");
require("../PHPMailer-master/src/Exception.php");

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $user = new User();
  $checkEmail = $user->checkEmail($email);
  if (!$checkEmail) {
    echo "Email không tồn tại";
    exit;
  }
  $string = str_shuffle("amdesv");
  $password = password_hash($string, PASSWORD_DEFAULT);

  $user->updatePassword($email, $password);
  $subject = "Quen Mat Khau";
  $body = "Mật khẩu mới của bạn là: $string";

  //gui mail
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 1;
  $mail->SMTPAuth = true; 
  $mail->SMTPSecure = 'ssl'; 
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->IsHTML(true);
  $mail->Username = "monkeyhoai@gmail.com";
  $mail->Password = "xewv gpes xvbp qtxv";
  $mail->SetFrom("monkeyhoai@gmail.com");
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->AddAddress($email);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
    echo "Mật khẩu mới đã được gửi đến email của bạn.";
    header('location:../views/login.php');
   }
}
else{
  die("Cảnh báo: Lỗi");
}

?>
