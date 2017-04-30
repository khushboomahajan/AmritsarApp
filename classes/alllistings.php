<?php

	/*
		*
		*	@param: no param
		*   @return: array 
		*   @call from: pages/listings.php
		*/
	class alllistings extends db
	{
		function listings(){
			
			$query=$this->db->prepare('SELECT * FROM listing where status=?');
			$query->execute(array('1'));
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		function recentlistings(){
			$limit=5;
			$query=$this->db->prepare('SELECT * FROM listing where status=? ORDER BY id DESC limit '.$limit);
			$query->execute(array('1'));
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		function listingsbycategory($category){
			$query=$this->db->prepare('SELECT * FROM listing where category=? AND status=?');
			$query->execute(array($category,'1'));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	}


?>