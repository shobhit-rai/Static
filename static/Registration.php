<!DOCTYPE html>
<html>
    <head>
        <title>
            Registration Form
        </title>
        <link rel="stylesheet" href="reg.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="header">
            <p>
                STATIC   
            <p>
        </div>
      <div class="reg">  
        <div id="form">
            <h1>Register</h1>
        <form action="reg.php" name="registration" method="post">
           First name 
            <?php if(isset($_GET['fname'])){ ?> 
               <input type="text" name="fname"  
               class="form-control" 
               placeholder="Eg: John" 
               value="<?php echo $_GET['fname']; ?>" >

             <?php }else { ?>
                <input type="text" name="fname"  class="form-control" placeholder="Eg: John"
                value="">
             <?php } ?>
           
            
            
            Last name:  
           <?php if(isset($_GET['lname'])){ ?> 
               <input type="text" name="lname"  
               class="form-control" 
               placeholder="Eg: Doe" 
               value="<?php echo $_GET['lname']; ?>" >

             <?php }else { ?>
                <input type="text" name="lname"  class="form-control" placeholder="Eg: Doe"
                value="">
             <?php } ?>
            
            Date of Birth: <input type="date" name="bod" class="form-control">
           
            College-gmail: 
            <?php if(isset($_GET['email'])){ ?> 
               <input type="text" name="email"  
               class="form-control" 
               placeholder="please enter your college email " 
               value="<?php echo $_GET['email']; ?>" >

             <?php }else { ?>
                <input type="text" name="email"  class="form-control" placeholder="Eg:please enter your college email"
                value="">
             <?php } ?>
            

            Username: <input type="text" name="uname" class="form-control">
                      
            
            Password: <input type="password"  class="form-control" name="pass" id="password">
                      
                      <br>
                      <input type ="password" name="repass" class="form-control"placeholder="Enter your password again" >
            <br>
            <div class="buttons">
            <button type="submit" class="btn btn-primary">Register</button>
            <button type="reset"  class="btn btn-primary">Reset</button> 
            <br>
            <small>Already registered? <a href="index.php">Login</a></small>  
            </div> 
              
        </form>
           <?php if (isset($_GET['error'])){ ?> 

            <p class="error"><?php echo $_GET['error']; ?></p>

          <?php } ?>
          <?php if (isset($_GET['success'])){ ?> 

            <p class="success"><?php echo $_GET['success']; ?></p>

          <?php } ?>
       </div>
      </div>
    </body>
</html>