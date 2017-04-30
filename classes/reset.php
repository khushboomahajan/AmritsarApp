<?php
	/**
	* 
	*/
	class reset extends db
	{
		
		function users($email){
			$query=$this->db->prepare('SELECT * FROM user where email=?');
			$query->execute(array($email));
			$users=$query->rowCount();
			if($users > 0){
				return true;
			}else{
				return false;
			}
		}


		function resetmyaccount($post){
			print_r($post);
			require_once '../phpmailer_email/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';			
			$emailexist=$this->users($post['email']);
			if($emailexist == true){
			$random=rand(1,100000);
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
			$mail->addAddress($post['email']);               // Name is optional
			$mail->addReplyTo('khushboomahajan.mahajan@gmail.com', 'DirectoryApp');
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Reset password ';
			$mail->Body    = 'Click on the link to reset your password:'.'<a href="http://localhost/listing/resetmyaccount.php?reset='.md5($random).'">'.$random.'</a>';
			$mail->send();
			$query=$this->db->prepare('UPDATE user SET reset_password = ? where email = ?');
			$query->execute(array(md5($random),$post['email']));
			$_SESSION['resetmsg']='Please check your email to reset your account';
			header("location:../reset.php");			
			}else{
			$_SESSION['resetmsg']='Please enter correct email';
			header("location:../reset.php");
			}

		}

		function resetafteremail($postdata,$resetdata){
			$query=$this->db->prepare('UPDATE user SET password = ?, reset_password = ? where reset_password = ?');
			$query->execute(array(md5($postdata['new_password']),'0',$resetdata));
			$_SESSION['message']='Your Password has been set..';
			header("location:../login.php");
		}
	}
?>