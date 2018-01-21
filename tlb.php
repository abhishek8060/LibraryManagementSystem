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
    <script src="http://localhost/webp/boot/js/jquery.js"></script>
    <link href="http://localhost/webp/boot/css/tlb.css" rel="stylesheet">
    
  </head>

<body>
     
<div class="navbar navbar-default  navbar-fixed-top" role="navigation">
 <div class="container">
   <div class="navbar-header">
    

    <a class="navbar-brand" href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Admin Portal</a>
   </div>
  <div class="navbar-collapse collapse">
      
  </div>
 </div>
</div>
<div class="row" style="margin-top:70px;">
  <h1 align="center"><U>TLB Section</u></h1>
</div>
<div class="row" >
  <div class="col-md-3">
     <div class="links">
      <a href="#" id="issue">Issue Requests</a>
      <a href="#" id="isslist">Issue List</a>
      <a href="#" id="return">Return</a>
      <a href="#" id="retlist">Return List</a>
     
     </div>
  </div>  
  

  <div class="col-md-8" id="maindiv">
  </div>

  
</div>
</body>
</html>

<script>

$(document).ready(function(){
  
  $('#issue').click(function(){
      
      $('#maindiv').load('http://localhost/webp/boot/php/tlbrequests.php');
   
  });

$('#isslist').click(function(){
      
      $('#maindiv').load('http://localhost/webp/boot/php/tlbisshistory.php');
   
  });

$('#return').click(function(){
      
      $('#maindiv').load('http://localhost/webp/boot/php/tlbreturnrequest.php');
   
  });

$('#retlist').click(function(){
      
      $('#maindiv').load('http://localhost/webp/boot/php/tlbreturnhistory.php');
   
  });


});

</script>
