<?php


/**
* 
*/
class settings extends db
{
	
	function profile(){		
		$email=@$_SESSION['user'];
		$query=$this->db->prepare('select * from user where email=?');
		$query->execute(array($email));
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	function updateUser($post,$files){
		echo "<pre/>";
		print_r($post);
		echo "<pre/>";
		print_r($files);
		$user=$this->profile();
		// print_r($user);
		$filename=$files['image']['name'];

		if(md5($post['password']) == @$user[0]['password']){
			if(empty($post['new_password'])){
				move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$filename);
				$query=$this->db->prepare('UPDATE user SET name=?,email=?,password=?,mobile=?,city=?,state=?,address=?,profile_img=?,updated_at=NOW() WHERE id=?');
				$query->execute(array($post['name'],$user[0]['email'],md5($post['password']),$post['mobile'],$post['city'],$post['state'],$post['address'],$filename,$user[0]['id']));
				header("location:../account/index.php");
			}else{
				if($post['new_password'] == $post['retype_password']){
				move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$filename);
				$query=$this->db->prepare('UPDATE user SET name=?,email=?,password=?,mobile=?,city=?,state=?,address=?,profile_img=?,updated_at=NOW() WHERE id=?');
				$query->execute(array($post['name'],$user[0]['email'],md5($post['new_password']),$post['mobile'],$post['city'],$post['state'],$post['address'],$filename,$user[0]['id']));
				header("location:../account/index.php");
				} 
					else{
						echo "Passwords do not match";
					}
			}
			
			
		}else{
			echo "Old password is incorrect";
		}
	}
}


?>