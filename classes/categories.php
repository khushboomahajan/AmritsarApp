<?php


	/**
	* 
	*/
	class categories extends db
	{
		
		function allcategories(){

			$query=$this->db->prepare('SELECT * FROM category');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}
	}

?>