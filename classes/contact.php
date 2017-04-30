<?php
	require_once '../phpmailer_email/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	if(isset($_POST['submit'])){
		print_r($_POST);
		session_start();
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

		$mail->setFrom('khushboomahajan.mahajan@gmail.com', $_POST['name']);
		//$mail->addAddress($_POST['email'],$_POST['name']);     // Add a recipient
		$mail->addAddress('khushboomahajan.mahajan@gmail.com');               // Name is optional
		$mail->addReplyTo($_POST['email']);
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $_POST['title'];
		$mail->Body    = 'Email:'.$_POST['email'].'<br> Message:'.$_POST['message'];
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients.';
		if(!$mail->send()) {			
   			$_SESSION['contact']= 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    $_SESSION['contact']= 'Message has been sent';
		}

		echo $_SESSION['contact'];
		//return true;
		header("location:../index.php");		
	}

	
?>