<?php
	
	/**
	* 
	*/
	class search extends db
	{
		
		public function searchdata($post)
		{
			//print_r($post);
			if(isset($_POST['location'])){
				$this->searchbylocation($_POST['location']);
			}
			if(isset($_POST['place'])){				
				$this->searchbyplace($_POST['place']);
			}

			if(isset($_POST['place']) && isset($_POST['location'])){
				$this->searchbyboth($_POST);
			}
		}

		public function searchbylocation($location)
		{
			$query=$this->db->prepare('SELECT * FROM listing where address like ? ');
			$query->execute(array('%'.$location.'%'));
			//print_r($query->fetchAll(PDO::FETCH_ASSOC));
			$_SESSION['searchResult'] = $query->fetchAll(PDO::FETCH_ASSOC);
			header("location:../index.php?page=search");

		}

		public function searchbyplace($place)
		{
			//echo $place;
			$query=$this->db->prepare('SELECT * FROM listing where title like ? ');
			$query->execute(array('%'.$place.'%'));
			$_SESSION['searchResult']=$query->fetchAll(PDO::FETCH_ASSOC);
			//print_r($query->fetchAll(PDO::FETCH_ASSOC));
			header("location:../index.php?page=search");

		}
		public function searchbyboth($post)
		{
			$query=$this->db->prepare('SELECT * FROM listing where title like ? AND address like ? ');
			$query->execute(array('%'.$post['place'].'%','%'.$post['location'].'%'));
			//print_r($query->fetchAll(PDO::FETCH_ASSOC));
			$_SESSION['searchResult']=$query->fetchAll(PDO::FETCH_ASSOC);
			header("location:../index.php?page=search");

		}
	}

?>