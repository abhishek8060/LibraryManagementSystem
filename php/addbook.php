<?php
session_start();
$_SESSION['message'] = '';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
    $bookid=$mysqli->real_escape_string($_POST['bid']);
    $copies=$mysqli->real_escape_string($_POST['copies']); 
    
    $queryuname="SELECT * FROM books where bookid='$bookid'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $bcount=$rows['copies'];

        }
      }
       $cp=$copies;
       $copies+=$bcount;
       
     if($mysqli->query("UPDATE books SET copies = '$copies' WHERE bookid = '$bookid' ")===true)
        {  $_SESSION['message']="$cp copies of $bookid addded";
           header("location: http://localhost/webp/boot/admin.php");
         }
      else
      {
        $_SESSION['message']="can't be addded";
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
  <h3>Add Book</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#exbook">Existing</a></li>
    <li><a data-toggle="tab" href="#nwbook">New</a></li>
   </ul>
 <div class="tab-content">
  <div id="exbook" class="tab-pane fade in active">
    <br><br>
    <form method="post" action="http://localhost/webp/boot/php/addbook.php" enctype="multipart/form-data" autocomplete="off">
    <input type="text" name="bid" id="bid" style="width:200px;" class="form-control" placeholder="Book ID" required/>
     <button id="sbook" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
     <br><br>
     <div id="sresult">
     </div>
    <input type="text" name="copies" id="copies" style="width:200px;" class="form-control" placeholder="No. of copies" required/><br>
    
    <input type="submit" value="Add" class="btn btn-success" name="submit"/>
  </form>
 </div>
 <?php 

$_SESSION['message'] = '';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

 $result=$mysqli->query("SELECT *From books ORDER by bookid DESC");
        if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $id=$rows['bookid'];
          $id++;
          break;

        }
      }
      else{
        $_SESSION['message']="No any books in database!!";
        header("location: http://localhost/webp/boot/admin.php");
      }
?> 
  <div id="nwbook" class="tab-pane fade">
   <form method="post" action="http://localhost/webp/boot/php/addnewbook.php" enctype="multipart/form-data" autocomplete="off"><br>
   <label>Book id:</label> <input type="text" name="bookid" id="bookid" style="width:300px;" class="form-control" value="<?php echo $id; ?>" required/><br>
    <input type="text" name="name" id="name" style="width:300px;" class="form-control" placeholder="Book Name" required/><br>
    <input type="text" name="aname" id="aname" style="width:300px;" class="form-control" placeholder="Author Name" required/><br>
    <input type="text" name="pname" id="pname" style="width:300px;" class="form-control" placeholder="Publication" required/><br>
    <input type="text" name="copies" id="copies" style="width:300px;" class="form-control" placeholder="No. of copies" required/><br>
    <input type="text" name="location" id="location" style="width:300px;" class="form-control" placeholder="Location" required/><br>
    <input type="text" name="price" id="price" style="width:300px;" class="form-control" placeholder="Price" required/><br>
    <label>Date:</label><input type="text" name="adddate" id="adddate" style="width:300px;" class="form-control" value="<?php  echo date("Y-m-d"); ?>" required/><br>
    <input type="submit" value="Add" class="btn btn-success" name="submit"/>
  </div>  


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        
  </body>
</html>


<script>
$(document).ready(function(){


  $('#sbook').click(function(){
      var txt = $('#bid').val();
        console.log(txt);
      if(txt!='')
      {
        $.ajax({
             url:"http://localhost/webp/boot/php/searchbookadmin.php",
             method:"POST",
             data:{search:txt},
             dataType:"text",

             success:function(data){
              $('#sresult').html(data);
             }
  
        });
      }

      else{
        $('#result').html('');
      }


 });


});

</script>
  