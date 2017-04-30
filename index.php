<?php
	date_default_timezone_set('Asia/Calcutta');
	if(isset($_GET['page'])){
		$content = $_GET['page'];
	}else{
		$content = 'home';
	}

	require_once "autoload.php";
	
	include_once "template.php";

?>