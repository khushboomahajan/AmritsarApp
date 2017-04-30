<?php

	class login extends db{

		/*
		*
		*	@param: no param
		*   @return: array, nothing
		*   @call from:  index.php
		*/
		function checkUser($user){

			 $errors=[];
			 if($user['email'] == ''){
			 	$errors['email']='This field is required';
			 }
			 if($user['password'] == ''){
			 	$errors['password']='This field is required';
			 }


			 if(!empty($errors)){
			 	$_SESSION['errors']=$errors;
			 	header("location:../".$user['current_url']."?error=error");
			 }

			 if(empty($errors)){
			 	$query=$this->db->prepare('select * from user where email=? AND password=?');
				$query->execute(array($user['email'],md5($user['password'])));
				$data=$query->fetchAll(PDO::FETCH_ASSOC);
								
				if($query->rowCount() >= 1){
					if($data[0]['activation_code'] == 0){
						$_SESSION['user']=$user['email'];
						$_SESSION['role']=$data[0]['role'];
						header("location:../account/index.php?page=dashboard");
					}else{
						$_SESSION['message'] = "Please activate your account";
						header("location:../".$user['current_url']);
					}
					
				}else{
					$_SESSION['err']='Please Enter the correct email or password..!!! ';
					header("location:../".$user['current_url']);
				}
			 }
			
					
		}

		function userdata($email){
			$query=$this->db->prepare('select * from user where email=?');
		    $query->execute(array($email));
		    return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
	}
?>