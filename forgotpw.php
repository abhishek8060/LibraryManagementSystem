<?php
session_start();

$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){

  $regno=$mysqli->real_escape_string($_POST['regno']);
   
    $queryuname="SELECT * FROM users where regno='$regno'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $email=$rows['email'];
          $name=$rows['name'];
          $hash=$rows['hash'];


        }
        $hash=$hash.'-'.$regno;
        $sub="Forgot Password";
        $emessage="Hello,$name .Click here to Set your password http://localhost/webp/boot/resetpw.php?hash=$hash";
        $hhead="location:http://localhost/webp/boot/send.php?to=$email&subject=$sub&message=$emessage";
                    header($hhead);
      }

      else
      {
       $_SESSION['fmessage']="USER not registered";
        
      }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
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
            <h4 align="center">Send a Email to retrive password</h4>
           <form method="post" action="http://localhost/webp/boot/forgotpw.php" autocomplete="off">
            <center>
            <br> <?php if(isset($_SESSION['fmessage'])) echo $_SESSION['fmessage']; ?></center>
           <input type="text" name="regno" style="width:300px; margin-left:90px;" class="form-control" placeholder="Enter regno." required/><br>
           <input type ="submit" value="Send" style="margin-left:90px;" class="btn btn-primary">
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
