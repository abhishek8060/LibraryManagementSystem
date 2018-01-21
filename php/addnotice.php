<?php

session_start();
$_SESSION['message'] = '';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
    $notice=$mysqli->real_escape_string($_POST['notice']);
    $date=$mysqli->real_escape_string($_POST['date']); 
    
    $queryuname="INSERT INTO notices (notice,date) VALUES ('$notice','$date')";
       
     if($mysqli->query($queryuname)===true)
        {  $_SESSION['message']="Notice added succesfully";
           header("location: http://localhost/webp/boot/admin.php");  
         }
      else
      {
        $_SESSION['message']=$queryuname;
        header("location: http://localhost/webp/boot/admin.php");  
           
      }   
     
  }
            
        
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    
  </head>
<body>


<div class="container" style="width:600px;">
  <h3 align="center">Add Notice</h3>
    
    <form method="post" action="http://localhost/webp/boot/php/addnotice.php" enctype="multipart/form-data" autocomplete="off">
    <textarea name="notice" style="height:350px;" placeholder="Write Notice here.." class="form-control noticebox"></textarea>
   <!-- <input type="textarea" name="notice" class="form-control" placeholder="Write Notice here" required/><br>  -->
    <label>Date:</label><input type="text" name="date" id="date" style="width:150px;" class="form-control" value="<?php echo date("Y-m-d");?>" required/>
   <br>  <input type="submit" name="submit" class="btn btn-success" value="Add"/>
     
   </form>
 </div>
</body>
</html>
