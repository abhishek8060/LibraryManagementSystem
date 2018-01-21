<?php
session_start();
$_SESSION['message'] = '';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
    $id=$mysqli->real_escape_string($_POST['bookid']);
    $name=$mysqli->real_escape_string($_POST['name']);
    $aname=$mysqli->real_escape_string($_POST['aname']);
    $pname=$mysqli->real_escape_string($_POST['pname']);
    $copies=$mysqli->real_escape_string($_POST['copies']);
    $location=$mysqli->real_escape_string($_POST['location']);
    $price=$mysqli->real_escape_string($_POST['price']);
    $adddate=$_POST['adddate']; 
    

   
      $query="INSERT INTO books (name,author,publication,copies,location,price,adddate) VALUES ('$name','$aname','$pname','$copies','$location','$price','$adddate')";
      if($mysqli->query($query)===true)
                  {$_SESSION['message']="$name has been added to the list with Bookid = $id ";
                  header("location: http://localhost/webp/boot/admin.php");}
             else{
              $_SESSION['message']="Can't be issued!!";
               header("location: http://localhost/webp/boot/admin.php");
              }
                
     }       
        
?>