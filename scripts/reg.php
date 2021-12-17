<?php
  session_start();
  include "db_conn.php";
  if(isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['bod']) && isset($_POST['repass']) && isset($_POST['email'])){
  	function validate($data){
  		$data = trim($data);
  		$data = stripcslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;

  	}
      $uname =validate($_POST['uname']);
      $pass = validate( $_POST['pass']);
      $repass = validate($_POST['repass']);
      $fname = validate($_POST['fname']);
      $lname = validate($_POST['lname']);
      $email = validate($_POST['email']);
      $bod = validate($_POST['bod']);

      $user_data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&email='.$email;

       if(empty($fname)){
      	  header("Location: Registration.php?error= *First name required");
      	  exit();
      }

      else if(empty($lname)){
         header("Location: Registration.php?error= * Last name is required &$user_data");
         exit();
       }

      else if(empty($uname)){
         header("Location: Registration.php?error= *User Name is required &$user_data");
  	       exit();
      }else if(empty($pass)){
          header("Location: Registration.php?error= *Password is required &$user_data");
  	      exit();

      }
      else if(empty($repass)){
         header("Location: Registration.php?error= *Re entry of password is required &$user_data");
         exit();
      }
      else if(empty($email)){
         header("Location: Registration.php?error= *Email is required
            $user_data");
         exit();
      }
      else if(empty($bod)){
         header("Location: Registration.php?error= *Birth date is required $user_data");
         exit();
      }
      else if($pass !== $repass){
         header("Location: Registration.php?error= *Password doesnt match. Please confirm again");
         exit();
      }

      else{
      	     
              $sql ="select * from users1 where user_name='$uname' ";
              $result= mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0){
               header("Location: Registration.php?error= *The username is already taken, try another&$user_data");
                  exit();
              }else{
                 $sql2 = "insert into users1 value('$email','$fname','$lname','$uname','$pass','$bod') ";
                 $result1 = mysqli_query($conn,$sql2);
                 if($result1){
                   header("Location:Registration.php?success=Your account has been created successfully");
                   exit();
                 }else{header("Location: Registration.php?error= Unknown error occuredr&$user_data");
                 exit();

                 }
              }
      	 		
      	 	}
      	 	 
      	 
  }else{
  	header("Location: Registration.php?error");
  	exit();
  } 