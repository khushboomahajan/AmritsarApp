<?php

	/**
	* 
	*/
	class listing extends db
	{
		private $images=[];
		private $facilities_data=[];
		function submitlisting($post,$files){			
			for($i=0;$i<count($files['images']['name']);$i++){
				move_uploaded_file($files['images']['tmp_name'][$i], '../images/'.$files['images']['name'][$i]);
				array_push($this->images, $files['images']['name'][$i]);
			}
			$uploadedfiles=implode(',', $this->images);
			//get login userid from user table
			$loginuseremail=$_SESSION['user'];
			$userquery=$this->db->prepare('select * from user where email=?');
			$userquery->execute(array($loginuseremail));
			$userarray=$userquery->fetchAll(PDO::FETCH_ASSOC);
			$userid=$userarray[0]['id'];
			if(isset($post['facilities'])){
				for($i=0;$i<count($post['facilities']);$i++){
					array_push($this->facilities_data, $post['facilities'][$i]." : ".$post[$post['facilities'][$i]]);
					 
				}
			}			
			$providing_facility=implode(",", $this->facilities_data);
			//Inserting listing data in listing table
			$query=$this->db->prepare("INSERT INTO listing (category,title,description,country,city,address,phone_no,email,website,facilities,images,user_id,geo_lat,geo_long,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
			$query->execute(array(
								$post['category'],
								$post['title'],
								$post['description'],
								$post['country'],
								$post['city'],
								$post['address'],
								$post['phoneno'],
								$post['email'],
								$post['website'],
								$providing_facility,
								$uploadedfiles,
								$userid,
								$post['geo_lat'],
								$post['geo_long']
								));
			$last_id = $this->db->lastInsertId();
			
			//insert availability data
			foreach ($post['day'] as $key => $value) {
				foreach ($post['time'] as $k => $v) {
					if($key===$k){						
						if(is_array($v)){
							echo $v['from'];
							$avail_query=$this->db->prepare("INSERT INTO availability (day,from_time,to_time,listing_id) VALUES (?,?,?,?)");
							$avail_query->execute(array(
														$value,
														$v['from'],
														$v['to'],
														$last_id	
														));
						}
					}
				}
			}
			header("location:../account/index.php?page=dashboard");			
				
		}
		
	}

?>