<?php
session_start();
$_SESSION['message']='ABC LIBRARY ADMIN LOGIN';


if($_SERVER['REQUEST_METHOD']=='POST'){

	$name=$_POST['name'];
	$pwd=$_POST['password'];


	if($name=="abc" && $pwd=="12345")
	{
		 $_SESSION['message']='';
     setcookie("login","1");
		header("location: http://localhost/webp/boot/admin.php");
	}

	else{
		$_SESSION['message']="Incorrect details .Try Again!";
	    	
	}
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="http://localhost/webp/boot/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="stylelogin.css" rel="stylesheet">
    <script src="http://localhost/webp/boot/js/jquery.js"></script>
    

  </head>

<body>
     <div class="row">
     </div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
          <div class="login">
           <form method="post" action="login.php" autocomplete="off">
           	<br><br>
           	<h4 align="center"><?php echo $_SESSION['message']; ?></h4><br>
           	
           <input type="text" name="name" style="width:300px; margin-left:90px;" class="form-control" placeholder="Enter username" required/><br>
           <input type="password" name="password" style="width:300px; margin-left:90px;" class="form-control" placeholder="Password" required/>
           <br>
           <input type ="submit" value="Login" style="margin-left:90px;" class="btn btn-primary">
           </form>
          </div>
		</div>
		<div class="col-md-4">
		</div>
	</div>		


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost/webp/boot/js/bootstrap.min.js"></script>     
  </body>
</html>