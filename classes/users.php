<?php

	/**
	* 
	*/
	class users extends db
	{
		
		function registeredusers(){

			$query=$this->db->prepare('SELECT * FROM user');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}
	}
		
?>