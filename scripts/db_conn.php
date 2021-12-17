<?php
  $conn = mysqli_connect("localhost","root","","test_db");

  if(!$conn){
  	echo "Connection failed!";
  }