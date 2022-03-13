<?php
function insert($table,$col,$value){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="INSERT INTO $table ($col) VALUES($value)";
      $query= mysqli_query($sqllink,$query);
      //$error=mysqli_error($sqllink);
      mysqli_close($sqllink);
      //return $error ;
      return $query;
}
function remove($table,$value){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="DELETE  FROM $table WHERE $value";
      $query= mysqli_query($sqllink,$query);
      mysqli_close($sqllink);
}
function update($table,$col,$cond){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="UPDATE $table SET $col WHERE $cond";
      $que= mysqli_query($sqllink,$query);
      mysqli_close($sqllink);
      return $que;
}
function select($table,$cond){
    $sqllink =mysqli_connect("localhost","root","","opiniony");
      $query="SELECT * FROM $table WHERE $cond ";
      $que= mysqli_query($sqllink,$query);
      if(mysqli_num_rows($que)>0)
          {return $que;}
    mysqli_close($sqllink);
}
?>