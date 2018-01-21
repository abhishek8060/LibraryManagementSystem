<?php

session_start(); 
$_SESSION['message']=''; 
$mysqli=new mysqli('localhost','root','Abhishek_2','library');
      
      if($_SERVER['REQUEST_METHOD']=='POST'){

      $regno=$mysqli->real_escape_string($_POST['regno']);
      $fine=$mysqli->real_escape_string($_POST['fine']);
      $date=date('Y-m-d');
      $z=0;
    

      $query = "INSERT INTO fine (pdate,regno,amount) VALUES ('$date','$regno','$fine')";
      if($mysqli->query($query)===true)  
      {
      	$mysqli->query("UPDATE users SET fine=$z WHERE regno=$regno");
      	echo 'Y';
      }
      else
      	echo 'N';
  }
?>