<?php

	session_start();
 
	//include("dbconnect.php");
	//include("login.php");
	include("user.php");

	//check if user logged in

	if(isset($_SESSION['users1']) && is_numeric($_SESSION['users1']))
	{
		$id = $_SESSION['users1'];
		$login = new Login();

		$result = $login->check_login($id);

		if($result)
		{

			//retrieve user data
			$user = new User();

			$user_data = $user->get_data($id);
		}
		if (!$user_data)
		 {
			header("Location: login.php");
			die;
		}
		else
		{
			header("Location: login.php");
			die;
		}
	}
	else
	{
       header("Location: login.php");
       die;
	}

//posting starts here
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$post = new Post();
		$id = $_SESSION['users1'];
		$result = $post->create_post($id, $_POST);

        if($result == "") 
        {
        	header("Location: profile.php");
        	die;
        }
        else
        {
        	echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey>";
        	echo "<br>The following error has occured:<br><br>";
        	echo $result;
        	echo "</div>";

        }
	}

	//collect posts
	$post = new Post();
	$id = $_SESSION['users1'];

	$posts = $post->get_post($id);



?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile | Static </title>
</head>
<style type="text/css">
	
	#blue_bar{
		height: 50px;
		background-color: #405d9b;
		color: #d9dfeb;
	}
	#search_box{
		width: 400px;
		height: 20px;
		border-radius: 5px;
		border: none;
		padding: 4px;
		font-size: 14px;
		background-image: url("C:\\Users\\karth\\Downloads\\social images\\search.png");
		background-repeat: no-repeat;
		background-position: right;

	}

	#profile_pic{
		width: 150px;
		margin-top: -200px;
	    border-radius: 50%;
	    border: solid 2px white;
	}
	#menu_buttons{
		width: 100px;
		display: inline-block;
		margin:  2px;
	}
    #friends_img{
    	width: 75px;
    	float: left;
    	margin: 8px;
    }

    #friends_bar{
    	background-color: floralwhite;
    	min-height: 400px;
    	margin-top: 20px;
    	color:  #aaa;
    	padding: 8px;
    }

    #friends{
    	clear: both;
    	font-size: 12px;
    	font-weight: bold;
    	color: #405d9b
    }
    
    textarea{
    	width: 100%;
    	border: none;
    	font-family: tahoma;
    	font-size: 14px;
    	height: 60px;
    }

    #post_button{
    	float: right;
    	background-color: #405d9b;
    	border: none;
    	color: whitesmoke;
    	padding: 4px;
    	font-size: 14px;
    	border-radius: 2px;
    	width: 50px;
    }

    #post_bar{
 	margin-top: 20px;
 	background-color: white;
 	padding: 10px;
    }
    
    #post{
    	padding: 4px;
    	font-size: 13px;
    	display: flex;
    	margin-bottom: 20px;
    }



</style>
<body style="font-family: tahoma;">

<!--topbar-->

    <div id="blue_bar">
    	<div style="width: 800px;margin:auto;font-size:30px;">
    		Static &nbsp <input type="text" id="search_box">
    		<img src="C:\Users\karth\Downloads\social images\selfie.jpg" style="width: 40px; float: right;">
    	</div>

<!--cover area-->

<div style="width: 800px;margin:auto;min-height: 400px;">
	<div style="background-color: whitesmoke;text-align: center;color:#405d9b">
	<img src="C:\Users\karth\Downloads\social images\mountain.jpg" style="width:100%;">
	<img id="profile_pic" src="C:\Users\karth\Downloads\social images\selfie.jpg">
	<br>

	<!-- display name from db-->
	<div style="font-size: 20px;color:black;"><?php echo $user_data['fname']. "". $user_data['lname'] ?> </div>
	<br>

	<div id="menu_buttons">Friends </div>
	<div id="menu_buttons"> Photos  </div>
	<div id="menu_buttons" >Settings </div>
</div>

<!-- below cover area-->

     <div style="display: flex;">
     	<!--friends area-->
     	<div style="min-height: 400px;flex: 1;">

                <div id="friends_bar">

                	Friends<br>

                	<div id="friends">
                		<img id="friends_img" src="C:\Users\karth\Downloads\social images\user1.jpg">
                		<br>
                		First user
                	</div>


                	<div id="friends">
                		<img id="friends_img" src="C:\Users\karth\Downloads\social images\user2.jpg">
                		<br>
                		Second user
                	</div>


                	<div id="friends">
                		<img id="friends_img" src="C:\Users\karth\Downloads\social images\user3.jpg">
                		<br>
                		Third user
                	</div>


                	<div id="friends">
                		<img id="friends_img" src="C:\Users\karth\Downloads\social images\user4.jpg">
                		<br>
                		Fourth user
                	</div>


                </div>
        </div>


     	<!-- posts area-->

     	<div style="min-height: 400px;flex: 2.5;padding: 20px; padding-right: 0px;">
     		<div style="border:solid thin #aaa; padding: 10px;background-color: whitesmoke;">

     			<textarea placeholder="What's on your mind?"></textarea>
     			<input id="post_button" type="submit" value="post">
     			<br>
     		</div>

     		<!--posts-->
     		<div id="post_bar">
     			<?php
                 if($posts)
                 {
                 	foreach ($posts as $row) {
                 		// code...
                 	}
                 }
     			
     				include("C:\Users\karth\Downloads\static\post.php");



     			?>
     			


     		</div>
     
     </div>

 </div>
</div>


</body>
</html>