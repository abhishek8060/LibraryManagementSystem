<?php
session_start();
$_SESSION['message']='';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
	
		    $regno=$mysqli->real_escape_string($_POST['regno']);
		    $bookid=$mysqli->real_escape_string($_POST['bid']);
		    $name=$mysqli->real_escape_string($_POST['name']);
        $bname=$mysqli->real_escape_string($_POST['bname']);
       
        $checkis=1;
        $yes='yes';
        
	     $queryuname="SELECT * FROM books where bookid='$bookid'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $bcount=$rows['copies'];

        }
       
        if($bcount!=0){
       
          
            $queryuname="SELECT * FROM tlbissuelist where regno='$regno' AND bid='$bookid'";
            $result=$mysqli->query($queryuname);
            if($result->num_rows==0){
        
            $bcount--;
            
            $query="INSERT INTO tlbissuelist (regno,name,bid,bname) VALUES ('$regno','$name','$bookid','$bname')";
            if($mysqli->query($query)===true)
                  {
                    $mysqli->query("UPDATE books SET copies = '$bcount' WHERE bookid='$bookid'");
                    $mysqli->query("UPDATE tlb SET checkis = '$checkis' WHERE bid='$bookid' AND regno='$regno'");
                    $mysqli->query("UPDATE users SET tlb = '$yes' WHERE regno='$regno'");
            
                    echo 'Y';
                  }
             else{
                 echo 'N';
               } 

            } 
           else{
              
              echo 'D';
           }    

         }
        else{
           echo 'NB';
           }

      }
      else
      {
       
       echo 'NBD';

      }
  
    }
?>
