<?php 
session_start();
$_SESSION['message']='';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
	
		    $regno=$mysqli->real_escape_string($_POST['regno']);
		    $bookid=$mysqli->real_escape_string($_POST['bookid']);
		    $returndate=$_POST['returndate'];	
        $retid=$_POST['bookid'].$_POST['regno'];
        
	    $queryuname="SELECT * FROM users where regno='$regno'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
        	$count=$rows['count'];
          $f=$rows['fine'];
        }
      }

      else
      {
       $_SESSION['message']="USER not registered";
        header("location: http://localhost/webp/boot/admin.php"); 
        exit();
      }
      $queryuname="SELECT * FROM issuelist where issueid='$retid'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $subdate=$rows['todate'];

        }
      }

      else
      {
       $_SESSION['message']="$bookid hasn't been issued not to $regno ";
        header("location: http://localhost/webp/boot/admin.php"); 
        exit();
      }

      //$fine=SELECT DATEDIFF("$subdate","$returndate");


      
      $start = strtotime($subdate);
      $end = strtotime($returndate);

      $fine = ceil(($end - $start) / 86400);
      
      if($fine<=0)
        $fine=0;
      
       $fine+=$f;


      $queryuname="SELECT * FROM books where bookid='$bookid'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $bcount=$rows['copies'];

        }
       

        
            $count--;
            $bcount++;
            
            
            $query="INSERT INTO returnlist (bookid,regno,subdate,returndate,fine) VALUES ('$bookid','$regno','$subdate','$returndate','$fine')";
            if($mysqli->query($query)===true)
                  { 
                    $mysqli->query("UPDATE users SET count = '$count',fine='$fine' WHERE regno='$regno'");
                    $mysqli->query("UPDATE books SET copies = '$bcount' WHERE bookid='$bookid'");
                    $mysqli->query("DELETE FROM issuelist WHERE issueid ='$retid'");
                    $_SESSION['message']="$bookid has been returned by $regno";
                    header("location: http://localhost/webp/boot/admin.php");}
             else{
              $_SESSION['message']="Can't be returned!!";
               header("location: http://localhost/webp/boot/admin.php");
             } 
        
      }
      else
      {
      $_SESSION['message']="Book not added";
      	header("location: http://localhost/webp/boot/admin.php");
      }
  
    }

       

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    
    <script src="http://localhost/webp/boot/js/jquery.js"></script>
    

  </head>

<body>
	<div align="center">

     <h1> Return book </h1><br>
    <form method="post" class="issform" action="http://localhost/webp/boot/php/returnaction.php" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="regno" placeholder="Enter registration number" class="form-control" required/><br>
        <input type="text" name="bookid" id="bookid" placeholder="Book Id" class="form-control" required/><br>
        <label>Return date</lable><input type="text" name="returndate"value="<?php  echo date("Y-m-d"); ?>"  class=form-control required/><br>
        <input type="submit" value="Return" class="btn btn-primary" align="right" name="submit"/>
  </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost/webp/boot/js/bootstrap.min.js"></script>     
  </body>
</html>
