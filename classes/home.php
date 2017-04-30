<?php

	/**
	* 
	*/
	class home extends db
	{
		
		public function featuredbusiness()
		{
			$query=$this->db->prepare('SELECT * FROM listing left join reviews on reviews.listing_id=listing.id where reviews.rating=?');
			$query->execute(array('5'));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function categories()
		{
			$query=$this->db->prepare('SELECT * FROM category');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function totallisting()
		{
			$query=$this->db->prepare('SELECT * FROM listing');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function totalusers()
		{
			$query=$this->db->prepare('SELECT * FROM user');
			$query->execute();
			return count($query->fetchAll(PDO::FETCH_ASSOC));
		}

		public function recentlisting()
		{
			$query=$this->db->prepare('select * from listing  ORDER BY id DESC LIMIT 3');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}
	}

?>