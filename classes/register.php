<?php

	class register extends db{

		/*
		*
		*	@param: new user data 
		*   @return: Goes back to login page(../login.php)
		*   @call from:  action.php
		*/

		function createUser($registerdata){
			require_once '../phpmailer_email/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
			 $errors=[];
			 if($registerdata['name'] == ''){
			 	$errors['name']='Name is required';
			 }
			 if($registerdata['email'] == ''){
			 	$errors['email']='Email is required';
			 }
			 if($registerdata['password'] == ''){
			 	$errors['password']='Password is required';
			 }
			 if($registerdata['mobile'] == ''){
			 	$errors['mobile']='Mobile is required';
			 }
			 if(!empty($errors)){
			 	$_SESSION['errors']=$errors;
			 	header("location:../".$registerdata['current_url']."?error=error");
			 }
			
			if(empty($errors)){
			if(isset($registerdata['agreetoterms'])){
				$random=rand(10,10000);			

				$query=$this->db->prepare('INSERT INTO user (name,email,password,mobile,role,created_at,activation_code) VALUES (?,?,?,?,?,NOW(),?)');
				$query->execute(array($registerdata['name'],$registerdata['email'],md5($registerdata['password']),$registerdata['mobile'],$registerdata['role'],$random));
				$this->sendemail($registerdata['email'],$random);
				
				@header("location:../login.php");
			}else{
				$_SESSION['err']="Please agree to terms and conditions to continue...!!! ";
				header("location:../".$registerdata['current_url']);
			}
		   }	
			
		}


		function sendemail($email,$code){

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

			$mail->setFrom('khushboomahajan.mahajan@gmail.com','DirectoryApp');
			//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress($email);               // Name is optional
			$mail->addReplyTo('khushboomahajan.mahajan@gmail.com', 'DirectoryApp');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Regarding Activation of Account';
			$mail->Body    = 'Click on the activation code to activate your account:'.'<a href="http://localhost/listing/classes/action.php?activation='.$code.'">'.$code.'</a>';
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients.';
			$mail->send();
			
			return true;
		
		}

		function useractivation($code){
			$query=$this->db->prepare('UPDATE user SET activation_code = ? where activation_code = ?');
			$query->execute(array('',$code));
			$_SESSION['message']='You are successfully registered..!!';
			header("location:../login.php");

		}
	}
?>