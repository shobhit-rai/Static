<?php

	class Post
	{

		
		public function create_post($userid,$data)
		{
			 $error = "";
			if(!empty($data['post']))
			{
				$conn = mysqli_connect("localhost","root","","test_db");

                 if(!$conn){
  	            echo "Connection failed!";
  	         }
                $post = addslashes($data['post']);
                $postid = $this->create_postid();

                $q1 = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";
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