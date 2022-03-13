<?php
session_start();
require_once("commands.php");
$sqllink =mysqli_connect("localhost","root","","opiniony");
$id=$_SESSION['user'];
if(isset($_POST['update'])){
    $name    = $_POST['uname'];
    $pass    = $_POST['pword'];
    $email   = $_POST['email'];
    $birth   = $_POST['birth'];
    $country = $_POST['country'];
    if($name!=null && $pass!=null && $pass >=8 ){
            $findData=update("users","name='$name',birthday='$birth',email='$email',password='$pass',country_id='$country'","id='$id'");
         if($findData){
             $findD= select("users","id='$id'" );
             if($findD){
                 echo "Your Data is updated successfully";
                 include_once("profile.php");
                 mysqli_close($sqllink);
             }
          else{
             // echo $bool;
              echo"Error in data ,try agin";
          }
      }
        
        /*$data= mysqli_fetch_assoc($findD);
        $name=$data['Name'];
        $password=$data['password'];
        echo "Name:'$name'<br> Password:'$password'<br>";
            }
        else{echo "Error in Link";}*/
          }
        else{
            echo "Enter you data in right way";
             include_once("../update.html");
            }
}
 else{
    echo "Enter you data in right way";
     include_once("../update.html");
    }
    
?>