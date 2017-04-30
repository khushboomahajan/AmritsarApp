<?php

	
	class listingdetail extends db
	{
		
		function detail($id){
			$query=$this->db->prepare('SELECT * FROM listing where id=?');
			$query->execute(array($id));
			$arrayReturn= $query->fetchAll(PDO::FETCH_ASSOC);
			return $arrayReturn[0];
		}

		function timings($listid){
			$query=$this->db->prepare('SELECT * FROM availability where listing_id=?');
			$query->execute(array($listid));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		/*
		*
		*	@param: listing id 
		*   @return: Goes back to listing-detail.php
		*   @call from: listing-detail.php
		*/

		function listdetail($listid){
			$query=$this->db->prepare('SELECT * FROM listing as list left join availability as avail on avail.listing_id = list.id where list.id = ?');
			$query->execute(array($listid));
			//echo "<pre/>";
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}

	}

?>