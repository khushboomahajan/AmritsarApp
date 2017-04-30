<?php

	/**
	* 
	*/
	class replies extends db
	{
		
		function getreplies(){
			$query=$this->db->prepare('select reply.*, user.profile_img, user.name from replies as reply left join user on user.id = reply.user_id;');
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		function approve($id){
		//echo $id;
		$query=$this->db->prepare('UPDATE replies SET status=? WHERE id=?');
		$query->execute(array('1',$id));
		header("location:../account/index.php?page=replies");
		}

		function readreply($listid){
			$query=$this->db->prepare('SELECT reply.*, user.profile_img, user.name  FROM replies as reply left join user as user on user.id = reply.user_id where reply.list_id=? AND reply.status=?');
			$query->execute(array($listid,'1'));
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>