<?php
 session_start();
require_once("posts.php");
$sqllink =mysqli_connect("localhost","root","","opiniony");
if(isset($_POST['mainpage'])){
    $findData= selected("posts","1=1 ORDER BY rate DESC ");
    //echo $findData ;
    if(mysqli_num_rows($findData)>0){
        while($data= mysqli_fetch_assoc($findData)){
            //$data= mysqli_fetch_assoc($findData);
            $id=$data['post_id'];
            $text=$data['content'];
            $image=$data['image'];
            $rate=$data['rate'];
            if($image!=null){
                  echo "'$text'<br>'$image'<br> '$rate'<br>";
             }
           else{
                  echo "'$text'<br> '$rate'<br>";
             }
            //print_r( $data) ;
           echo "<a href='rate.php?postid=$id'>Evaluation</a><br> ";
        }
    }
    else {
        echo"rong";
    }
}
?>