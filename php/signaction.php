<?php
session_start();
$_SESSION['message'] = '';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
 if(strlen($_POST['password'])>8){ 
	if($_POST['password']==$_POST['cnfpwd']){
		$name1=$mysqli->real_escape_string($_POST['name1']);
		$email=$mysqli->real_escape_string($_POST['email']);
		$regno=$mysqli->real_escape_string($_POST['regno']);
		$password=md5($_POST['password']); //md5 for hashing password
    $hash=$mysqli->real_escape_string(md5(rand(0,1000)));    
		$fine=0;
    $no='no';    

	    $queryuname="SELECT * FROM users where regno='$regno'";
        $result=$mysqli->query($queryuname);
        if($result->num_rows ==0){
	
                
	    		$query="INSERT INTO users (regno,name,email,password,hash,fine,tlb)"."VALUES ('$regno','$name1','$email','$password','$hash','$fine','$no')";

	    		if($mysqli->query($query)===true){
	    			   $_SESSION['message']="$regno registration successful";
                    	header("location: http://localhost/webp/boot/index.php");
	    		  
	    			
	    		
	    		}
	    		else{
	    
	    			$_SESSION['message']="Registration failed";
	    		}
	    	

	}
	else
	{
		$_SESSION['message']="You have Registered already!!";
	}
}
	else{
		$_SESSION['message']="Passwords don't match!!";
	}
}

else
   {
   $_SESSION['message']="Password length should be greater than 8!";

   }
 }  
	else
	{
    // $_SESSION['message']="Form sending error";
	}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="http://localhost/webp/boot/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="http://localhost/webp/boot/css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    

  </head>

<body>
     
<div class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
 <div class="container">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
     
    <span class="sr-only">Toggle Navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    
    </button>

    <a class="navbar-brand" href="http://localhost/webp/boot/index.php">Student's Portal</a>
   </div>
 </div>
</div>


<div class="row">
  <div class="col">
      <h1 align="center"><?php echo $_SESSION['message']?></h1> 
   </div>    
</div>


<div class="row">

   <div class="col-md-6">
        <h2 align="center">Fill the form</h2>
        <br>
        <form method="post" action="http://localhost/webp/boot/php/signaction.php" enctype="multipart/form-data" autocomplete="off">
        
       
        <input type="text" name="regno" placeholder="Enter registration number" class="form-control"  required/><br>
        <input type="text" name="name1" placeholder="Enter full name here" class="form-control" required/><br>
        <input type="email" name="email" placeholder="Enter email" class="form-control" required/><br>
        <input type="password" placeholder="Password" id="password" name="password" autocomplete="new-password" class="form-control" required/><br>
        <input type="password" placeholder="Confirm Password" name="cnfpwd" autocomplete="new-password" class="form-control" required/><br>
        <input type="submit" value="Sign Up" class="btnsignup" id="btnsignup" align="right" name="submit"/>
    </form>
   </div>    
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost/webp/boot/js/bootstrap.min.js"></script>
   
        
  </body>
</html>
