<?php
session_start();
require_once("commands.php");
require_once("posts.php");
$sqllink =mysqli_connect("localhost","root","","opiniony");
$name=$_POST['name'];
$pass=$_POST['pass'];
if(isset($_POST['log'])){
      if($name!=null && $pass!=null ){
          if($pass >=8){
           $findData= select("users","Name='$name' AND password='$pass'" );
              if($findData){
                  $data= mysqli_fetch_assoc($findData);
                  $_SESSION['user']=$data['id'];
                  //$userid=$_SESSION['user'];
                  //saveid($userid);
                  include_once("profile.php");
                   mysqli_close($sqllink);
              }
              else{
                  echo"sign up first please";
                header("location:../web/signup.html");
              }
            }
          else{
              header("location:../web/login.html");
              echo"please enter password more than or equel 8";
          }
      }
       else{
           echo"please enter username & password ";
              header("location:../web/login.html");
       }
   } 
else{
    echo"error enter your info then press login";
    //include_once("../web/login.html");
     header("location:../web/login.html");
}

?>