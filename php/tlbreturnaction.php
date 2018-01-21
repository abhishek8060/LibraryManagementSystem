<?php
session_start();
$_SESSION['message']='';
$mysqli=new mysqli('localhost','root','Abhishek_2','library');

if($_SERVER['REQUEST_METHOD']=='POST'){
  
	
		    $regno=$mysqli->real_escape_string($_POST['regno']);
		    $bookid=$mysqli->real_escape_string($_POST['bid']);
		    $name=$mysqli->real_escape_string($_POST['name']);
        $bname=$mysqli->real_escape_string($_POST['bname']);
       
        $checkis=0;
        $no='no';
        
	     $queryuname="SELECT * FROM books where bookid='$bookid'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
        while($rows=mysqli_fetch_array($result)) {
          $bcount=$rows['copies'];

        }
       
        }       
          
            
            $bcount++;
            
            $query="INSERT INTO tlbreturnlist (regno,name,bid,bname) VALUES ('$regno','$name','$bookid','$bname')";
            if($mysqli->query($query)===true)
                  {
                    $mysqli->query("UPDATE books SET copies = '$bcount' WHERE bookid='$bookid'");
                    $mysqli->query("UPDATE tlb SET checkis = '$checkis' WHERE bid='$bookid' AND regno='$regno'");
                    $mysqli->query("UPDATE users SET tlb = '$no' WHERE regno='$regno'");
                    $mysqli->query("DELETE FROM tlbissuelist WHERE regno='$regno' AND bid='$bookid'");
                    $mysqli->query("DELETE FROM tlb WHERE regno='$regno' AND bid='$bookid'");
                    
                    echo 'Y';
                  }
             else{
                 echo 'N';
               } 
      
    }
?>
