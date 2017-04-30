<?php
	
	/*set_error_handler(function(){
		throw new Exception("Error Processing Request", 1);
	});*/
	require_once "config.php";
	
	class db{

		protected $db;

		private $host = host;

		private $dbname = dbname;

		private $user = user;

		private $pass = pass;

		function __construct(){

			try{
				$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pass);
				@session_start();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

	}

?>