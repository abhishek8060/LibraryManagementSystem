<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="http://localhost/webp/boot/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="styleind.css" rel="stylesheet">
    <script src="http://localhost/webp/boot/js/jquery.js"></script>
    

  </head>

<body>
     
<div class="navbar navbar-default  navbar-fixed-top" role="navigation">
 <div class="container">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
     
    <span class="sr-only"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    
    </button>

    <a class="navbar-brand" href="#">Student's Portal</a>
   </div>
  <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <?php  
                if(isset($_SESSION['username']))  
                { 
                 
                ?>  
                  
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo '  '.$_SESSION['username']?><b class="caret"></b></a>      
                  <ul class="dropdown-menu">
                  <li ><a href="#list" data-toggle="modal" data-target="#listModal"><i class="fa fa-list" aria-hidden="true"></i> Your List </a></li>
                  <li ><a href="#" id="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                  </ul>
                <?php  
                }  
                else  
                {  
                ?>  
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">User<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                   <li ><a href="#login" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                   <li ><a href="http://localhost/webp/boot/php/signaction.php">Sign Up</a></li>
                  </ul>     
                <?php  
                }  
                ?>  
          
        </li>
      </ul>
  </div>
 </div>
</div>


<div class="container">
    <div class="jumbotron text-center">
      <h1>ABC Library</h1>
    </div>
</div>


<div class="row">
   <div class="col-md-2">
     <h3 align="center"><u>New arrivals</u></h3>
      <div id="newbooks">
      </div>
</div>
   
   
   <div class="col-md-7">
      <div class="form-group">
        <div class="input-group">
           <span class="input-group">Search <i class="fa fa-book" aria-hidden="true"></i></span>
           <input type="text" name="searchtext" id="searchtext" class="form-control" placeholder="Type any book/author name to search.."/>
        </div>
      </div>    
      <br/>
      <div id="result">
      </div>
   </div>
  
   
   <div class="col-md-2">
      <h3><i class="fa fa-bars" aria-hidden="true"></i> Notices</h3>
       <div id="notices">
       </div>
   </div> 
 </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost/webp/boot/js/bootstrap.min.js"></script>
    <script src="http://localhost/webp/boot/js/listaction.js"></script>
     
       
        
  </body>
</html>
<script>


$(document).ready(function(){
/*var book="book";
var notice="notice";
$('#newbooks').html('');
$('#notices').html('');

$.ajax({
url:"http://localhost/webp/boot/php/noticesandbooksaction.php",
method:"POST",
data:{iid:book},
success:function(data){
  $('#newbooks').html(data);  
}
});

$.ajax({
url:"http://localhost/webp/boot/php/noticesandbooksaction.php",
method:"POST",
data:{iid:notice},
success:function(data){
  $('#notices').html(data);  
}
});
*/

setInterval(function(){
$('#newbooks').load('http://localhost/webp/boot/php/nandb.php?iid=book').fadeIn('slow');
},1000);
setInterval(function(){
$('#notices').load('http://localhost/webp/boot/php/nandb.php?iid=notice').fadeIn('slow');
},1000);



$('#searchtext').keyup(function(){
      var txt = $(this).val();
      
      if(txt!='')
      {
        $.ajax({
             url:"http://localhost/webp/boot/php/searchaction.php",
             method:"POST",
             data:{search:txt},
             dataType:"text",

             success:function(data){
              $('#result').html(data);
             }
  
        });
      }

      else{
        $('#result').html('');
      }


 });



 
});

</script>


<!--Modal -->

<div id="loginModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Login</h4>  
                </div>  
                <div class="modal-body">  
                     <label>Registration Number</label>  
                     <input type="text" name="regno" id="regno" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" id="password" class="form-control" />  
                     <br />  
                      <a href ="http://localhost/webp/boot/forgotpw.php">Forgot Password?</a><br><br> 
                     <button type="button" name="login_button" id="login_button" class="btn btn-primary">Login</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 <h1> 
<?php
//print_r($_SESSION);
?>
</h1>
<div id="listModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">List</h4>  
                </div>  
                <div class="modal-body"> 
                  <div class="listmain">
                 

             <?php
               if(isset($_SESSION['submit'])){   
                if($_SESSION['submit']==0){

                   if(!empty($_SESSION["list"]) )  
                      {  
                      ?>
                   <table class="table table-bordered">  
                <tr>  
                     <th>BookID</th>  
                     <th>Name</th>  
                     <th>Author</th>  
                     <th>Action</th>   
                </tr> 
                <?php
                 foreach($_SESSION["list"] as $keys => $values)  
                  {  
              
                    ?>  
                     <tr>  
                          <td><?php echo $values["bid"] ?></td>  
                          <td><?php echo $values["bname"] ?></td>  
                          <td><?php echo $values["aname"] ?></td>  
                          
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["bid"] ?>">Remove</button></td>  
                     </tr>  
                     
                   <?php  
          
                 }
                 ?>

                 <tr>  
                     <td colspan="5" align="center">  
                            
                               <input type="submit" name="list" id="submit" class="btn btn-warning" value="Submit List" />  
      
                     </td>  
                   </tr>
                 <?php
                  }
                }
                else if($_SESSION['submit']==1)
                    {
                       $regno=$_SESSION['rgno'];
                       $mysqli=new mysqli('localhost','root','Abhishek_2','library');
                       $queryuname="SELECT * FROM users where regno='$regno'";
                       $result=$mysqli->query($queryuname);
                       if($result->num_rows>0){
                       while($rows=mysqli_fetch_array($result)) {
                       $check=$rows['tlb'];
                           }
                         }

                         if($check==='no'){

                      ?>
                      <b>List Submitted.. Thank you<br> </b>
                      <button name="resubmit" class="btn btn-primary resubmit" id="<?php echo $_SESSION['rgno']; ?>">Resubmit</button>
                  <?php
                      }
                      else
                      {
                        echo '<b>Books Issued</b>';
                      }

                    } 
                    }   
                 ?>

                  </div>
              </div>  
      </div>  
  </div>
 </div>  
 <script src="http://localhost/webp/boot/js/logincheck.js"></script>
 