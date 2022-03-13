<?php
session_start();
//require_once("posts.php");
require_once("commands.php");
$sqllink =mysqli_connect("localhost","root","","opiniony");
$id=$_SESSION['user'];
if($id != null){
   if(isset($_POST['myrate'])){
       $pid  = $_POST['postid']; 
       $rate = $_POST['rate'];
     $findD= select("posts","post_id='$pid'");
      //echo $findD;
      $data= mysqli_fetch_assoc($findD);
      $ratevalue=$data['rate'];
       $userid=$data['user_id'];
      //$postid=$data['id '];
      $bool=insert("rate","rate,post_id","'$rate','$pid'"); 
      if($bool){
            if($rate > 4){
                  $rv=(int)$ratevalue;
                  $x=1;
                  $value=$rv+$x ;
                  //echo $value ;
                ?>
 <img id='bkgd' src="../pexels-photo-2072165.jpeg" style="height: 97%; width: 98%;position: absolute;z-index: -1; opacity:1.2;">

<?php
                  $up_rate= update("posts","rate='$value'","post_id='$pid'" );
                  //echo "<h3>Thank you for your rating >_< </h3>";
                }
              else{
                  $rv=(int)$ratevalue;
                  $x=1;
                  $value=$rv-$x ;
                 $up_rate= update("posts","rate='$value'","post_id='$pid'" );
                 //echo "<h3>Thank you for your rating >_< </h3>";
                 }
      }
}
 elseif(isset($_GET['postid'])){
        $postid=$_GET['postid'];
        $result=select("posts","post_id=$postid");
        $data=mysqli_fetch_assoc($result);
        $oldcontent=$data['content'];
        echo "$oldcontent";
       include_once("../evaluation.html");
    }
?> 
 <form action="home.php" method="post"  align="center"> 
    <input type="submit" value="HOME PAGE" name="returntoPage">
 </form>
<?php
  }
    else{
       header("location:../web/signup.html");
}
?>