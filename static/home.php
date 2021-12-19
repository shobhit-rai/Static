<?php
  session_start();
  

  if( isset($_SESSION['user_name'])){



  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="home.css">
        <script>
        /* This function is for scroll up navbar (operational and working fine)*/
           var prevSCrollpos = window.pageYOffset;
           window.onscroll = function() 
           {    
             var currentScrollPos = window.pageYOffset;
             if(prevSCrollpos > currentScrollPos){
             document.getElementById("navbar").style.top = "-1px";
             }
             else{
               document.getElementById("navbar").style.top = "-50px";
             }
            prevSCrollpos = currentScrollPos;
    
            }
            var settingsmenu = document.querySelector(".settings-menu")
          /* The function to toggle the settings option(working)*/
            function settingsMenuToggle()
            {
              
              document.getElementsByClassName("settings-menu")[0].classList.toggle("settings-menu-height");
             }
            
            
        </script>
            <script src="https://kit.fontawesome.com/f8f839f6c8.js" crossorigin="anonymous"></script>
      
       
    </head>
    <body>
        
        
        <div class="container">
            <!-- left sidebar-->
                    <div class="left-sidebar">
                        <div class="imp-links">
                            <a href="https://news.google.com/"><img src="images/news.png">Latest news</a>
                            <!-- <a href="#"><img src="images/friends.png">Friends</a>
                            <a href="#"><img src="images/Group.png">Group</a> -->

                            <!-- <a href="#">See more</a> -->
                       </div>
                       <div class="shortcut-links">
                           <p>Your Shortcuts</p>
                           <a href='https://www.upwork.com/hire/web-developers/'><img src="images/shortcut-1.png">Web developers</a>
                           <a href='https://www.wix.com/'><img src="images/shortcut-2.png">Web design</a>
                           <a href='https://www.geeksforgeeks.org/what-is-full-stack-development/'><img src="images/shortcut-3.png">Full Stack</a>
                           
                       </div>
                    </div>

                    <!--Main content-->

                    <div class="main-content">
                        <div class="write-post-container">
                            <div class="user-profile">
                                <img src="images/profile.jpg">
                                <div>
                                    <p><?php echo $_SESSION['user_name']; ?></p>
                                    <!-- <small>Public <i class="fas fa-sort-down"></i></small> -->
                                </div>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                              <div class="post-input-container">
                                  <textarea name="post" col="1" rows="3" placeholder="What's on your mind, Shobhit">
                                        </textarea>
                                  <div class="add-post-links">
                                   <a href=#>  <img src="images/photo.png"><input type=file name="file"></a> 
                                   <input type="submit" value="Post">
                                  <input type ="reset" >
                                  </div>
                                        
                              </div>
                            </form>  
                        </div>
                   
                    <!-- Post: The basic structure of it (all functions shown here may or may not be implemented)-->
                       <?php 
                          include("post.php");
                          $post = new Post();
                          $id = $_SESSION['user_name'];
                          $posts = $post->get_post($id);
                          if($posts)
                          {
                            
                            foreach($posts as $row){
                                $row_user = $post->get_user($row['userid']);
                                include("post1.php");
                            }
                          }
                       ?>
                           
                      
                    </div>


                    <!--Right Sidebar-->
                    <div class="right-sidebar">
                        <!-- <div class="sidebar-title">
                            <h4>Events</h4>
                            <a href='#'>See all</a>
                        </div> -->
                    <!-- Events section -->
                        <!-- <div class="event">
                            <div class="left-event">
                                <h3>27</h3>
                               <span>Novemeber</span>

                            </div>
                            <div class="right-event">
                                <h4>Social Media</h4>
                                <p><i class="fas fa-map-marker-alt"></i>Nitte Karkala</p>
                                <a href="#">Mode info</a>
                            </div>
                        </div>
                        <div class="event">
                            <div class="left-event">
                                <h3>22</h3>
                               <span>Novemeber</span>

                            </div>
                            <div class="right-event">
                                <h4>CSI inaugaration</h4>
                                <p><i class="fas fa-map-marker-alt"></i>Nitte Karkala</p>
                                <a href="#">Mode info</a>
                            </div>
                        </div> -->
                    <!-- Advertisements -->
                        <!-- <div class="sidebar-title">
                            <h4>Advertisement</h4>
                            <a href='#'>Close</a>
                        </div>
                        <img src="images/advertisement.png" class="sidebar-ads">
                        <div class="sidebar-title">
                            <h4>Conversation</h4>
                            <a href='#'>Hide Chats</a>
                        </div> -->
                      
                    <!-- Friends list-->    
                        <div class="online-list">
                            <div class="image">
                                
                                <h1>About&nbsp;us</h1>
                                <p>&nbsp;Static&nbsp;is&nbsp;made&nbsp;by&nbsp;nitte&nbsp;students&nbsp;for&nbsp;nitte&nbsp;students.
                                &nbsp;In&nbsp;static,&nbsp;you&nbsp;can&nbsp;post&nbsp;about&nbsp;your&nbsp;amazing&nbsp;college&nbsp;life.
                                &nbsp;With&nbsp;many&nbsp;more&nbsp;features&nbsp;to&nbsp;come,&nbsp;so&nbsp;stay&nbsp;tune.
                                </p>
                            </div>
                        </div>
                        
                        </div>



                    </div>
                </div>

        <div id="navbar">
                    <div class="button button1">
                    <h1>STATIC</h1>
                    <!-- <button id="button1" onclick="click(event,'home')">Home</button>
                    <button id="button2" onclick="click(event,'Club')">Clubs</button>
                    <button id="button3" onclick="click(event,'Placement')">Placement</button>
                    
                    </div>
                    <div class="search-box">
                        <img src="images/search.png" >
                        <input type="text" placeholder="Search"> -->
                    </div>
                    <div class="button2 image " onclick="settingsMenuToggle()">
                        <img src="images/profile.jpg" >
                    </div>

                    <!--drop down-->
                    <div class="settings-menu">
                        <div class="settings-menu-inner">
                            <div class="user-profile">
                                <img src="images/profile.jpg">
                                <div>
                                    <p><?php echo $_SESSION['user_name']; ?></p>
                                    <a href="testprofile.php">See your profile</a>
                                </div>
                            </div> 
                           
                            <hr>
                            <!-- <div class="user-profile">
                                <img src="images/feedback.png">
                                <div>
                                    <p>Give Feedback</p>
                                    <a href="#">Help us to improve the new design</a>
                                </div>
                            </div> 
                            <hr>
                            <div class="setting-links">
                                <img src="images/setting.png" class="settings-icon">
                                <a href="#">Settings & Privacy <img src="images/arrow.png" width="10px">  </a>   
                            </div>
                            <div class="setting-links">
                                <img src="images/help.png" class="settings-icon">
                                <a href="#">Help & support <img src="images/arrow.png" width="10px">  </a>  
                            </div>
                            <div class="setting-links">
                                <img src="images/display.png" class="settings-icon">
                                <a href="#">Display & Accesibility<img src="images/arrow.png" width="10px">  </a>  
                            </div> -->
                            <div class="setting-links">
                                <img src="images/logout.png" class="settings-icon">
                                <a href="logout.php">Logout<img src="images/arrow.png" width="10px">  </a>
                            </div>
                        </div>
                              
                    </div>
                
                </div>      
        
    </body>
</html>
<?php } else{
    header("Location: index.php");
    exit();
}

//posting starts here
   if($_SERVER['REQUEST_METHOD']== "POST")
   {
      
      $post = new Post();
      $id = $_SESSION['user_name'];
      $result = $post->create_post($id,$_POST,$_FILES);
      
      if($result == "")
      {
         
         echo("<script>location.href ='home.php';</script>");
        die;
      }else{
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey>";
        echo "<br> the following  error occured:";
        echo $result;
        echo "</div>";

      }
      
   }

   

?>