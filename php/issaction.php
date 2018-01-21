<?php
session_start();
$_SESSION['message']='';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
  
        $regno=$mysqli->real_escape_string($_POST['regno']);
        $bookid=$mysqli->real_escape_string($_POST['bookid']);
        $fromdate=$_POST['fromdate'];
        $todate=$_POST['todate']; 
        $issueid=$_POST['bookid'].$_POST['regno'];
        

        
      $queryuname="SELECT * FROM users where regno='$regno'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $count=$rows['count'];
          $email=$rows['email'];
          $name=$rows['name'];

        }

        echo "hello";

      }

      else
      {
        echo "there";
       $_SESSION['message']="USER not registered";
        header("location: http://localhost/webp/boot/admin.php"); 
      }
      $queryuname="SELECT * FROM books where bookid='$bookid'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $bcount=$rows['copies'];
          $bname=$rows['name'];

        }
       
        if($bcount!=0){
       
          if($count<2)
          {

            $queryuname="SELECT * FROM issuelist where issueid='$issueid'";
            $result=$mysqli->query($queryuname);
           if($result->num_rows==0){
        
        
            
            $count++;
            $bcount--;
            $mysqli->query("UPDATE users SET count = '$count' WHERE regno='$regno'");
            $mysqli->query("UPDATE books SET copies = '$bcount' WHERE bookid='$bookid'");
            
            $query="INSERT INTO issuelist (issueid,bookid,regno,formdate,todate) VALUES ('$issueid','$bookid','$regno','$fromdate','$todate')";
            if($mysqli->query($query)===true)

                  {
                    $emessage="Hello,$name .$bname has been issued to you.Last date submission is $todate";
                    $hhead="location:http://localhost/webp/boot/send.php?to=$email&message=$emessage";
                    //header($hhead);
                     $_SESSION['message']="Book issued .";
                     //header("location: http://localhost/webp/boot/admin.php");   
                    }
             else{
              $_SESSION['message']="Can't be issued!!";
               header("location: http://localhost/webp/boot/admin.php");
             } 

            } 
           else{
              $_SESSION['message']="Same book can't be issued to one student!!";
               header("location: http://localhost/webp/boot/admin.php");

           }    

           }
          else{
           $_SESSION['message']="More than 2 books can't be registered";
           header("location: http://localhost/webp/boot/admin.php");
          }
        }
        else{
          $_SESSION['message']="Book not available!!";
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
    
    
  </head>

<body>
  <div align="center">

     <h1> Issue book </h1><br>
    <form method="post" class="issform" action="http://localhost/webp/boot/php/issaction.php" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="regno" id="regno" placeholder="Enter registration number" class="form-control" required/><br>
        <input type="text" name="bookid" id="bookid" placeholder="Book Id" class="form-control" required/><br>
        <label>Issue date</lable><input type="text" name="fromdate" id="fromdate" value="<?php  echo date("Y-m-d"); ?>"  class=form-control required/><br>
        <label>Return date</lable><input type="text" name="todate" id="todate" value="<?php $d=strtotime("+14 Days"); echo date("Y-m-d",$d); ?>"  class=form-control required/><br>
        <input type="submit" value="Issue" class="btn btn-primary" align="right" name="submit"/>
  </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://localhost/webp/boot/js/bootstrap.min.js"></script>     
  </body>
</html>
