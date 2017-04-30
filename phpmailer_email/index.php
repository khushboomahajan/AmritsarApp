<?php
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); 
// $mail->SMTPDebug = 2;                                     // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'khushboomahajan.mahajan@gmail.com';                 // SMTP username
$mail->Password = '9646875188';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('khushboomahajan.mahajan@gmail.com','My Testing');
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('khushboomahajan555@gmail.com');               // Name is optional
$mail->addReplyTo('khushboomahajan.mahajan@gmail.com', 'My Testing');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Regarding Test';
$mail->Body    = 'This is the HTML message body <b>in bold!</b> Testing Apps';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>