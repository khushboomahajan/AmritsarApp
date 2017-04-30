<?php
	require_once "autoload.php";
	function displayerror($key){
		if(session_status() == PHP_SESSION_NONE){
			session_start();
		}
		$displayfields = @$_SESSION['errors'][$key];
		@$_SESSION['errors'][$key] = '';
		return $displayfields;
	}
 
	
	function loggedInuser(){
		$email=$_SESSION['user'];
		$obj=new login();
		$user=$obj->userdata($email);
		return $user;
	
	}

	function allusers(){
		 $obj=new users();
		 $users=$obj->registeredusers();
		 return $users;
	}
	

?>