<?php

/**
* 
*/
class mylistings extends db
{
	function getloggedinuser(){
		
		  $query=$this->db->prepare('select * from user where email=?');
		  $query->execute(array( $_SESSION['user']));
		  $user=$query->fetchAll(PDO::FETCH_ASSOC);
		  return $user[0]['id'];
		
	}

	function getalllistings($userid){

		$array=[];
		$query=$this->db->prepare('select * from listing where user_id=?');
		$query->execute(array($userid));
		$listings=$query->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($listings as $key => $value) {
			if($value['status'] == '1'){
				array_push($array, $value);
			}
		}
			return $array;
		
	}

	function getlistingsforadmin(){
		$query=$this->db->prepare('select * from listing');
			$array = [];
			$query->execute();
			$listings=$query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($listings as $key => $value) {
				// if($value['status'] == '0'){
					array_push($array, $value);
				// }
			}
			return $array;
		
	}


	function getAllListingsForAdminCount($offset,$limit){
		$array=[];
		$query=$this->db->prepare('select * from listing limit '.$limit.' offset '.$offset);
		$query->execute();
		$listings=$query->fetchAll(PDO::FETCH_ASSOC);

		foreach ($listings as $key => $value) {
			// if($value['status'] == '0'){
				array_push($array, $value);
			// }
		}
		return $array;
		//return $listings;
		
	}

	function getListingsForUser($userid,$offset,$limit){
		$array=[];
		$query=$this->db->prepare('select * from listing where user_id=? limit '.$limit.' offset '.$offset);
		$query->execute(array($userid));
		$listings=$query->fetchAll(PDO::FETCH_ASSOC);
		//print_r($listings);
		foreach ($listings as $key => $value) {
			if($value['status'] == '1'){
				array_push($array, $value);
			}
		}
		return $array;
	}

	function approve($id){
		$query=$this->db->prepare('UPDATE listing SET status=? where id=?');
		$query->execute(array('1',$id));
		header("location:../account/index.php?page=mylistings@p=1");
	}

	function view($id){
		$query=$this->db->prepare('SELECT * FROM listing where id=?');
		$query->execute(array($id));
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	function delete($id){
		$query=$this->db->prepare('DELETE FROM listing WHERE id=?');
		$query->execute(array($id));
		$avail=$this->db->prepare('DELETE FROM availabilty WHERE listing_id=?');
		$avail->execute(array($id));
		header("location:../account/index.php?page=mylistings&p=1");
	}

	function getunapprovedlisting(){
		$query=$this->db->prepare('SELECT * FROM listing where status=?');
		$query->execute(array('0'));
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	function getunapprovedlistingforuser($id){
		$query=$this->db->prepare('SELECT * FROM listing where status=? AND user_id=?');
		$query->execute(array('0',$id));
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	function Getalllistforuser($id){
		$query=$this->db->prepare('SELECT * FROM listing where user_id=?');
		$query->execute(array($id));
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}


?>