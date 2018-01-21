<?php
session_start();

$mysqli=new mysqli('localhost','root','Abhishek_2','library');
      
      
       $hash=$_GET['hash'];
       list($a, $b) = explode('-', $hash);
       $rgno=$b;
            
if($_SERVER['REQUEST_METHOD']=='POST'){

       $regno =$_POST['regno'];
       $pwd   =$mysqli->real_escape_string($_POST['pwd']);
       $cnfpwd=$mysqli->real_escape_string($_POST['cnfpwd']);

       if(strcmp($pwd, $cnfpwd)==0){
        
          $password=md5($pwd);
      $queryuname="UPDATE users SET password = '$password' WHERE regno = '$b' and hash='$a'";
       if($mysqli->query($queryuname)===true)
        {

           $_SESSION['rmessage']="Password Upadated. Go and login";
           
        }
        else{
              $_SESSION['rmessage']="Password couldn't Upadated.";
               
            }    
    }
    else
    {
      $_SESSION['rmessage']="Passwords don't match";
    }

      
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link href="http://localhost/webp/boot/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="stylelogin.css" rel="stylesheet">
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

    <a class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
   </div>
  </div>
</div>

 <div class="row">
     </div>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
          <div class="login"><br>
            <h4 align="center">New password</h4>
           <form method="post" action="http://localhost/webp/boot/resetpw.php?hash=<?php echo $hash;?>" autocomplete="off">
            <center>
            <br> <?php if(isset($_SESSION['rmessage'])) echo $_SESSION['rmessage']; ?></center>
           <input type="hidden" name="regno" value="<?php echo $rgno; ?>" >
           <input type="password" name="pwd" style="width:300px; margin-left:90px;" class="form-control" placeholder="Enter new Password" required/><br>
           <input type="password" name="cnfpwd" style="width:300px; margin-left:90px;" class="form-control" placeholder="Retype password" required/><br>
           
           <input type ="submit" value="Update" style="margin-left:90px;" class="btn btn-primary">
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
