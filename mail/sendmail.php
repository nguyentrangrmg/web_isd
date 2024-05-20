<?php 
require "PHPMailer/src/PHPMailer.php"; 
require "PHPMailer/src/SMTP.php"; 
require 'PHPMailer/src/Exception.php'; 
$mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
try {
    $mail->SMTPDebug = 0; //0,1,2: chế độ debug
    $mail->isSMTP();  
    $mail->CharSet  = "utf-8";
    $mail->Host = 'smtp.gmail.com';  //SMTP servers
    $mail->SMTPAuth = true; // Enable authentication
    $mail->Username = 'nguyentrangrmg@gmail.com'; // SMTP username
    $mail->Password = 'rcopzqrdrlswdami';   // SMTP password
    $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
    $mail->Port = 465;  // port to connect to                
    $mail->setFrom('nguyentrangrmg@gmail.com', 'Trang' ); 
    $mail->addAddress('loanthiensong@gmail.com', 'Mick'); 
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Tiêu đề thư';
    $noidungthu = 'Nội dung thư'; 
    $mail->Body = $noidungthu;
    $mail->smtpConnect( array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));
    $mail->send();
    echo 'Đã gửi mail xong';
} catch (Exception $e) {
    echo 'Error: ', $mail->ErrorInfo;
}
?>