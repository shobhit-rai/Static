<!DOCTYPE html>
<html>
    <head>
        <title>
            login
        </title>
        <link rel="stylesheet" href="reg.css">
        <script src="file:///c:/Users/Shobhit Rai/projects/project/JAVASCRIPT\reg.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="header">
            <p>
                 STATIC
</p>
        </div>
        <div id="login">
            <h1>Login</h1>
        <form action="login1.php" name="login" method="post">
            
            

            Username: <input type="text" name=uname class="form-control">
                      
            
            Password: <input type="password"  class="form-control" name="password" id="password">
                      <i class="bi bi-eye-slash" id="togglePassword"></i>
                      
            <br>
            <div class="buttons">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <button type="reset"  class="btn btn-primary">Reset</button> 
            <br>
            <small>New here? <a href="Registration.php">Register</a></small>  
            </div> 
              
        </form>
          <?php if (isset($_GET['error'])){ ?> 

            <p class="error"><?php echo $_GET['error']; ?></p>

          <?php } ?>
       </div>
      
    </body>
</html>