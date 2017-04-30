<?php
	session_start();
	
	if($_SESSION['user'] != ''){
		date_default_timezone_set('Asia/Calcutta');
		if(isset($_GET['page'])){
			$content = $_GET['page'];
		}else{
			$content = 'dashboard';
		}	
		require_once "../autoload.php";
		include_once "template.php";
	}else{

		header('location:../index.php');
	}

	

?>