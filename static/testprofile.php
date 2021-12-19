<!DOCTYPE html>
<html>
<head>

<style>

*{
    margin: 0px;
    padding: 0px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    box-sizing: border-box;
}
body{
  background-color: whitesmoke;
}

.welcomeuser{
	color: black;
	background-color: #d5fefd;
    background-image: linear-gradient(315deg, #d5fefd 0%, #fffcff 74%);
	font-size: 32px;
	text-align: center;
	height: -500px;
	padding: 40px;
}

.home,.logout{
   display:inline-block;
}

.home{
	position: absolute;
	bottom: 5%;
	left: 20%;
	padding:  5px;
	background-color: floralwhite;

}
.logout
{
	background-color: floralwhite;
	position:absolute;
    bottom: 5%;
    right:20%;
    padding: 5px;
}


.wrapper{
	float: left;
  width: 100%;
  text-align: center;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

  
}

#blue_bar{
    height: 50px;
   background-color: #fefefe;
background-image: linear-gradient(315deg, #fefefe 0%, #00a4e4 74%);


}

.detail{
	font-size: 20px;
	font-family: Garamond;
	font-weight: bold;
}

.box {
  width: 330px;
  border: 10px #d5fefd;
  padding: 50px;
  margin: auto;
  color: solid black;
  background-color: #d5fefd;
background-image: linear-gradient(315deg, #d5fefd 0%, #fffcff 74%);
  
}
.value
{
	font-size: 18px;
	font-family: cursive;
	color:  royalblue;

}

</style>
</head>
<body>

      <div id="blue_bar">
      <div style="width: 800px;margin:auto;font-size:35px;font-style:itatic;color:white;text-align: left;">
      Static  &nbsp </div>
      </div>

</body>
</html>

<?php

	session_start();

	echo "<p class='welcomeuser'>"."Welcome ".$_SESSION['user_name']."!"."</p>";
	include "db_conn.php";

	$sql="select * from users1 where fname= '".$_SESSION['fname']."'";
	$res=mysqli_query($conn,$sql);
    
    echo "<table border='1'>";
    if($res)
    {
	$r=mysqli_fetch_array($res);
	
		echo "<div class='box'>";
		echo "<center>";
		echo "<label class='detail'>"."First Name: &nbsp"."</label>";
        echo "<span class='value'>".$r["fname"]."<br><br></span>";

        echo "<label class='detail'>"."Last Name: "."</label>";
        echo "<span class='value'>".$r["lname"]."<br><br></span>";

        echo "<label class='detail'>"."Email: "."</label>";
        echo "<span class='value'>".$r["email"]."<br><br></span>";

        echo "<label class='detail'>"."Date of Birth: "."</label>";
        echo "<span class='value'>".$r["bod"]."<br><br></span>";
       echo "</center>";
       echo "</div>";
	
}
	echo "</table>";
    echo "<div class='wrapper'>";
	echo "<button class='home'><a href='home.php'>Home</a></button>";
	echo "<button class='logout'><a href='logout.php'>Logout</a></button>";
	echo "</div>";
	mysqli_close($conn);
?>
