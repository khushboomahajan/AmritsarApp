<?php

	/**
	* 
	*/
	class category extends db
	{
		
		function addcategory($post){
			$query=$this->db->prepare('INSERT INTO category (name,created_at) VALUES (?,NOW())');
			$query->execute(array($post['category']));
			$_SESSION['category']="Category Added Successfully..!!!";
			header("location:../account/index.php?page=category");
		}
	}

?>