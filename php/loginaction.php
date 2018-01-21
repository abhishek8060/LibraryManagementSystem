<?php  
 session_start();  
 $mysqli=new mysqli('localhost','root','Abhishek_2','library');
 if(isset($_POST["regno"]))  
 {    $output='';
      $regno=$mysqli->real_escape_string($_POST["regno"]);
      $output=$regno;
      $query = "SELECT * FROM users WHERE regno = '$regno' AND password = '".md5($_POST["password"])."' ";  
     $result=$mysqli->query($query);
      if($result->num_rows>0)  
      {  

         while($rows=mysqli_fetch_array($result)) 
          { $_SESSION['username'] = $rows['name'];
            $_SESSION['rgno']=$rows['regno'];
            $_SESSION['count']=0;
            $_SESSION['submit']=0;
           // $_SESSION['list'][]=array();
          }  
           
     $query = "SELECT * FROM tlb WHERE regno = '$regno'";  
     $result=$mysqli->query($query);
      if($result->num_rows>0)  
      {  
        $_SESSION['submit']=1;
      }  

           echo 'Y';
           /*$output.=$_SESSION['username'];
      $output.=$_SESSION['rgno'];
      echo $output; */ 
      }  
      else  
      {  
           echo 'N';  
      }  

      
 }  
 if(isset($_POST["action"]))  
 {        
      session_destroy();  
 }  
 ?>  