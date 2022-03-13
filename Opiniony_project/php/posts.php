<?php
function add($table,$col,$value){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="INSERT INTO $table ($col) VALUES($value) ";
      $query= mysqli_query($sqllink,$query);
      return $query ;
      //return mysqli_error($sqllink);
      mysqli_close($sqllink);  
}

function delete($table,$value){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="DELETE  FROM $table WHERE $value";
      $query= mysqli_query($sqllink,$query);
      mysqli_close($sqllink);
}

function selected($table,$cond){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="SELECT * FROM $table WHERE $cond ";
      $query= mysqli_query($sqllink,$query);
      if(mysqli_num_rows($query)>0)
          {return $query;}
       else{return false;}
    //return mysqli_error($sqllink);
    mysqli_close($sqllink);
}
/*function saveid($id)
{
    $GLOBALS['userid']=$id; 
}
function getid(){
    return $GLOBALS['userid'];
}*/
?>