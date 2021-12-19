<?php

	class Post
	{

		
		public function create_post($userid,$data,$files)
		{
			 $error = "";
			if(!empty($data['post']) || !empty($files['file']['name']))
			{
				$conn = mysqli_connect("localhost","root","","test_db");

                 if(!$conn){
  	            echo "Connection failed!";
  	         }
			   $myimage ="";
			   $has_image= 0;
               $post = addslashes($data['post']);
                $postid = $this->create_postid();
			   if(!empty($files['file']['name']))
			   {
				   $folder = "upload/".$userid."/";
				   if(!file_exists($folder))
				   {
					   mkdir($folder,0777,true);
				   }

				   $filename = $folder. $postid . ".jpg";
				   move_uploaded_file($_FILES['file']['tmp_name'],$filename);
				   $myimage = $filename;
				   $has_image = 1;
			   }
                

                $q1 = "insert into posts (userid,postid,post,image,has_image) values ('$userid','$postid','$post','$myimage','$has_image')";
               $result= mysqli_query($conn,$q1);
              
              
			}
			else{
               $this->error .= "Please type something<br>";
			}

			return $error;
		}

		public function get_post($id)
		{
			
				$conn = mysqli_connect("localhost","root","","test_db");

                 if(!$conn){
  	            echo "Connection failed!";
  	         }
			$query = "select * from posts order by id desc";
			$result = mysqli_query($conn,$query);
			if($result)
			{
				return $result;
			}else{
				return false;
			}
		

		}
		public function get_user($id)
		{
			$conn = mysqli_connect("localhost","root","","test_db");

                 if(!$conn){
  	            echo "Connection failed!";
  	         }
  	         $query = "select * from users1,posts where user_name='$id ' and userid=user_name limit 1";
  	         $result = mysqli_query($conn,$query);
  	         if($result)
  	         {
  	         	return $result;
  	         }else
  	         {
  	         	return false;
  	         }
		}

		public function get_usersid()
		{
			$conn = mysqli_connect("localhost","root","","test_db");

                 if(!$conn){
  	            echo "Connection failed!";
  	         }
  	         $query = "select * from users1";
  	         $result = mysqli_query($conn,$query);
  	         if($result)
  	         {
  	         	return $result;
  	         }else
  	         {
  	         	return false;
  	         }
		}



		public function like_post($id,$type,$user_name){
            $conn = mysqli_connect("localhost","root","","test_db");

                 if(!$conn){
  	            echo "Connection failed!";
  	         }
			
			$sql = "select userid from posts where postid=$id";
			$result = mysqli_query($conn,$sql);
			//increament the post table
			if($user_name != $result)
			{
		    $sql = "update posts set likes= likes + 1 where postid = '$id' limit 1" ;
            mysqli_query($conn,$sql);
			}
			//save likes detail
			$sql = "select likes from likes where where type = 'post' && contentid='$id' limit 1" ;
            $result =mysqli_query($conn,$sql);
			if(is_array($result)){

				$likes = json_decode($result[0]['likes'],true);
                
                $user_ids = array_column($likes,"userid");
				
				if(!in_array($user_name, $user_ids)){
				$arr["userid"] = $user_name;
				$arr["date"] = date("Y-m-d H:i:s");

				$likes[] = $arr;

				$likes_string = json_encode($likes);
				$sql = "update likes set likes ='$likes_string" ;
				mysqli_query($conn,$sql);
			}
			}else{

				$arr["userid"] = $user_name;
				$arr["date"] = date("Y-m-d H:i:s");
				$arr2 = $arr;
				$likes = json_encode($arr2);
				$sql = "insert into likes (type,contentid,likes) values ('$type','$id','$likes')" ;
				mysqli_query($conn,$sql);
			}
		   	
		    
		}



		private function create_postid()
		{
			$length = rand(4,19);
			$number = " ";
			for ($i=0; $i < $length; $i++){
				$new_rand = rand(0,9);

				$number = $number.$new_rand;
			}
			return $number;
		}
	}