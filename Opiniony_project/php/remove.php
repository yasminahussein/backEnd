<?php
session_start();
require_once("commands.php");
$sqllink =mysqli_connect("localhost","root","","opiniony");
$id=$_SESSION['user'];
$findData= remove("users","user_id='$id'" );
if($findData){
    echo "done";
}
mysqli_close($sqllink);
header("location:../web/signup.html");
?>