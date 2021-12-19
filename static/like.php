<?php
 include("post.php");
 session_start();


if(isset($_SERVER['HTTP_REFERER'])){
$return_to = $_SERVER['HTTP_REFERER'];
}else{
    $return_to = "home.php";
}
if(isset($_GET['type']) && isset($_GET['id']))
  {
    if(is_numeric($_GET['id'])){
        $post = new Post();
        $return = $post->like_post($_GET['id'],$_GET['type'],$_SESSION['user_name']);
        echo $return;
         header("Location: ".$return_to);
        die;
    }
    
  }

