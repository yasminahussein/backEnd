<?php
session_start();
require_once("posts.php");
$sqllink =mysqli_connect("localhost","root","","opiniony");
$id=$_SESSION['user'];
if(isset($_GET['postid'])){
    $postid=$_GET['postid'];
    $findData=delete("posts","post_id='$postid'" );
//if($findData){
    }
    include_once("profile.php");
    mysqli_close($sqllink);
   
//}
//}
?>