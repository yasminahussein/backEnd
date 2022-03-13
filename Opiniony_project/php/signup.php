 <?php
require_once("commands.php");
if(isset($_POST['signup'])){
   $name=$_POST['uname'];
   $pass=$_POST['pword'];
   $email=$_POST['email'];
    $birth=$_POST['birth'];
    $country=$_POST['country'];
   $sqllink =mysqli_connect("localhost","root","","opiniony");
   if($sqllink) {
      if($name!=null && $pass!=null && $pass >=8 ){
            $bool=insert("users","name,birthday,email,password,country_id","'$name','$birth','$email','$pass','$country'");
         if($bool){
             include("../web/login.html");
          }
          else{
             // echo $bool;
              echo"Error in data";
          }
      }
       else{
           echo"please enter username & passwordmore than 8 character ";
              include("../web/signup.html");
       }
   } 
}
else{
    echo"error";
}

?>