 <?php
session_start();
//session_id($id)
require_once("posts.php");
if(isset($_POST['createp'])){
   $text=$_POST['tpost'];
   $catid=$_POST['catvalue'];
   $counid=$_POST['country'];
   $id=$_SESSION['user'];
   $myFile=$_FILES["img"]; 
       $fname=$myFile["name"];
       $fTmpname=$myFile["tmp_name"];
       $ftype=$myFile["type"];
       $fsize=$myFile["size"]; 
    $folder="images/".$fname;
    $sqllink =mysqli_connect("localhost","root","","opiniony");   
   if($sqllink) {
    if($fsize!=0){
    $upload=move_uploaded_file( $fTmpname,$folder ); 
  // $image=$_POST['img'];
      if($text!=null && $myFile!=null ){
            $bool=add("posts","content,user_id,image,category_id, country_id","'$text','$id','$fname','$catid','$counid'"); 
             //echo $bool ;
            if($bool){
                echo "done";
                include_once("profile.php");
                 }
          else{echo'error3';}
             }
        else{echo"NO";}
    }
       else{
      if($text!=null ){
            $bool=add("posts","content,user_id ,category_id ,country_id","'$text','$id','$catid','$counid'"); 
            //echo $bool ;
            if($bool){
                echo "done";
                include_once("profile.php");
                 }
             else{ 
                 echo"error1";
                }
         } 
      else{
           echo"please enter your post ";
           include_once("../posts.html");
        }
   }
   }

else{
    header("location:../404.html");
    }
   }
    
 else{echo"error2";}
?>