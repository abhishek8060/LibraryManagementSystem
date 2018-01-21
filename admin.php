<?php
session_start();

if(!isset($_COOKIE["login"]))
  header("location: http://localhost/webp/boot/login.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="http://localhost/webp/boot/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="style22.css" rel="stylesheet">
    <script src="http://localhost/webp/boot/js/jquery.js"></script>
    
  </head>

<body>
     
<div class="navbar navbar-default  navbar-fixed-top" role="navigation">
 <div class="container">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
     
    <span class="sr-only">Toggle Navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    
    </button>

    <a class="navbar-brand" href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Admin Portal</a>
   </div>
  <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li><a href="tlb.php">TLB Section</a> </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="logout.php">Logout</a> </li>
      </ul>
  </div>
 </div>
</div>

<div class="row">
  <div class="col-md-2">
     </div>
     <div class="col-md-2">
     </div>
 <div class="col-md-2">
    <button name="issuebtn" id="issbtn" style="padding:30px;padding-top:20px;padding-bottom:20px;" class="btn btn-primary">Issue</button>
  </div>
  <div class="col-md-2">
    <button name="returnbtn" id="returnbtn" style="padding:30px;padding-top:20px;padding-bottom:20px;" class="btn btn-primary">Return</button>
  </div>
  <div class="col-md-4">
   
        
        <input type="text" name="sregno" id="sregno" style="width:200px;" class="form-control" placeholder="Reg No." required/>
          <button id="sstud" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button> 
       
      </div>
   </div>
<br>
<div class="row">
   <div class="col-md-2">
    <button name="isslist" id="isslist" style="margin-left:10px; margin-top:5px;"  class="btn btn-info">Issue History</button><br><br>
    <button name="returnlist" id="returnlist" style="margin-left:10px; margin-top:5px;" class="btn btn-info">Return History</button>
    <br><br><button style="margin-left:10px; margin-top:5px;" name="booklist" id="booklist" class="btn btn-info">Book list</button>

   </div>
   <div class="col-md-8" id="main">
     <h1 align="center"> <?php if(isset($_SESSION['message']))echo $_SESSION['message']; ?></h1>
     
   </div>
   <div class="col-md-2">
    <button name="addbook" id="addbook"  class="btn btn-info">Add Book</button><br><br>
    <button name="addnotice" id="addnotice"  class="btn btn-info">Add a Notice</button>
    <br><br>
    
   </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost/webp/boot/js/bootstrap.min.js"></script>     
  </body>
</html>

<script>
$(document).ready(function(){
  
$('#issbtn').click(function(){
    $('#main').load('http://localhost/webp/boot/php/issueaction.php');
 });

$('#returnbtn').click(function(){
    $('#main').load('http://localhost/webp/boot/php/returnaction.php');
});

$('#isslist').click(function(){
  $('#main').load('http://localhost/webp/boot/php/isshistory.php');
});

$('#returnlist').click(function(){
  $('#main').load('http://localhost/webp/boot/php/returnhistory.php');
});

$('#addbook').click(function(){
  $('#main').load('http://localhost/webp/boot/php/addbook.php');
});

$('#addnotice').click(function(){
  $('#main').load('http://localhost/webp/boot/php/addnotice.php');
});


$('#booklist').click(function(){
 
  $('#main').load('http://localhost/webp/boot/php/booklistaction.php');


});

 $('#sstud').click(function(){
      var txt = $('#sregno').val();
      
      if(txt!='')
      {
         console.log(txt);
        $.ajax({
             url:"http://localhost/webp/boot/php/searchstudent.php",
             method:"POST",
             data:{search:txt},
             dataType:"text",

             success:function(data){
              //console.log(data);
              $('#main').html(data);

             }
  
        });
      }
      else
      {
        console.log('data nhi mila');
      }

      

 });

});

</script>
