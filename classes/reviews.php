<?php

	
	class reviews extends db
	{
		
		function loggedInuser($email){
			$query=$this->db->prepare('SELECT * FROM user where email=?');
			$query->execute(array($email));
			$userdata=$query->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($userdata)){
				return $userdata;
			}else{
				return 'false';
			}
			
		}


		function postreview($post){
			 $user=$this->loggedInuser($_SESSION['user']);			 
			 if($user == 'false'){
			 	$_SESSION['message']="Please register or login first..!!";			 	
			 	header("location:../index.php?page=listing-detail&id=".$post['listid']);
			 }else{	
			 	print_r($user);		 	
				$query=$this->db->prepare('insert into reviews (review,user_id,username,email,listing_id,status,rating,created_at) VALUES (?,?,?,?,?,?,?,NOW())');
				$query->execute(array($post['review'],$user[0]['id'],$user[0]['name'],$user[0]['email'],$post['listid'],'0',$post['rating']));
				$_SESSION['message']="Comment sent for Approval..!!";			 	
				header("location:../index.php?page=listing-detail&id=".$post['listid']);
			 }
			 
		}

		function getreviewsforcurrentUser($userid){
		
			$query=$this->db->prepare('SELECT review.*, user.profile_img  FROM reviews as review left join user as user on review.user_id= user.id where review.user_id=?');
			// select * from reviews as review left join user as user on user.id = review.user_id where review.user_id=? 
			$query->execute(array($userid));
			return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		function getreviewsforadmin(){
			$query=$this->db->prepare('SELECT review.*, user.profile_img  FROM reviews as review left join user as user on user.id = review.user_id');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function approve($id){
		//echo $id;
		$query=$this->db->prepare('UPDATE reviews SET status=? WHERE id=?');
		$query->execute(array('1',$id));
		header("location:../account/index.php?page=reviews");
		}

		function getreviews($listid){
			$query=$this->db->prepare('SELECT review.*, user.profile_img  FROM reviews as review left join user as user on user.id = review.user_id where review.listing_id=? AND review.status=?');
			$query->execute(array($listid,'1'));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function getreviewdata($id){
			$query=$this->db->prepare('SELECT * from reviews where id=?');
			$query->execute(array($id));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}


		function postreply($post){
			print_r($post);
			$user=$this->loggedInuser($_SESSION['user']);
			$reviewdata=$this->getreviewdata($post['reviewid']);
			 	print_r($reviewdata);	
			 if($user == 'false'){
			 	$_SESSION['replymsg']="Please register or login first to reply..!!";			 	
			 	header("location:../index.php?page=listing-detail&id=".$reviewdata[0]['listing_id']);
			 }else{	
			 	$userid=$user[0]['id'];
			 	$listing_id=$reviewdata[0]['listing_id'];

			 	$query=$this->db->prepare('INSERT into replies (reply,review_id,rating,user_id,list_id,status,created_at) VALUES (?,?,?,?,?,?,NOW())');
				$query->execute(array($post['reply'],$post['reviewid'],$post['rating'],$userid,$listing_id,'0'));
				$_SESSION['replymsg']="Comment sent for Approval..!!";			 	
				

				//set parent id of reviews table

				$parentid=$this->db->prepare('UPDATE reviews SET parent_id=? where id=?');
				$parentid->execute(array('1',$post['reviewid']));
				header("location:../index.php?page=listing-detail&id=".$reviewdata[0]['listing_id']);

			 }	
		}

		function delete($id){
		$query=$this->db->prepare('DELETE FROM reviews where id=?');
		$query->execute(array($id));
		$del=$this->db->prepare('DELETE FROM replies WHERE review_id=?');
		$del->execute(array($id));
		header("location:../account/index.php?page=reviews");
	}

	}


?>