<?php  
session_start(); 
$_SESSION['message']=''; 
$mysqli=new mysqli('localhost','root','Abhishek_2','library');
$output='';
      
      if($_SERVER['REQUEST_METHOD']=='POST'){

      $regno=$mysqli->real_escape_string($_POST['search']);
    }

      $query = "SELECT * FROM users WHERE regno=$regno";  
      $result = $mysqli->query($query);  
      if($result->num_rows > 0)  
      {
        
        
         while($rows=mysqli_fetch_array($result)) 
          { 
              $output.='<br><h1 align="center">'.$rows['name'].'</h1>
                        <center>
                        <div  style="width:450px;" >
                         <br><table class="table table bordered" style="font-size:20px;">
                          <tr >
                            <th>Email</th><td>'.$rows['email'].'</td>
                          </tr>
                          <tr> 
                             <input type="hidden" id="tfine" value="'.$rows['fine'].'"/> 
                            <th>Fine</th><td id="finedisp">'.$rows['fine'].'</td><td><button class="btn btn-primary xs fineb" id="'.$regno.'">Paid</button></td>
                        </tr>
                        </table>  </div></center>';
                            

          }

         $query1 = "SELECT * FROM issuelist WHERE regno=$regno";  
         $result1 = $mysqli->query($query1);  
         $output.='<h2 align="center"><u>Issued Books</u></h2>';
           
         if($result1->num_rows > 0)  {
                 
                 $output.='<center>
                        <div  style="width:450px;" >
                          <table class="table table">
                          <tr>
                          <th>IssueID</th>
                          <th>BookID</th>
                          <th>Issue Date</th>
                          <th>Submission Date</th>
                       <tr>';
                

            while($rows1=mysqli_fetch_array($result1)) 
                { 
                   

                   $output.='<tr>
                            <td>'.$rows1['issueid'].'</td>
                            <td>'.$rows1['bookid'].'</td>
                            <td>'.$rows1['formdate'].'</td>
                            <td>'.$rows1['todate'].'</td>
                        </tr>';


                    }

                 $output.='</table></div></center>';    
            }
            else
              $output.='<h3 align="center">No Books issued</h3>';

         $query1 = "SELECT * FROM tlbissuelist WHERE regno=$regno";  
         $result1 = $mysqli->query($query1);
           $output.='<h2 align="center"><u>TLB Books</u></h2>';

         if($result1->num_rows > 0)  {
                 
                 $output.='<center>
                        <div  style="width:450px;" >
                        
                          <table class="table table">
                          <tr>
                          <th>BookID</th>
                          <th>Book Name</th>
                       <tr>';
                

            while($rows1=mysqli_fetch_array($result1)) 
                { 
                   

                   $output.='<tr>
                            <td>'.$rows1['bid'].'</td>
                            <td>'.$rows1['bname'].'</td>
                            </tr>';


                    }

                 $output.='</table></div></center>';    
            }
            else
              $output.='<h3 align="center">No Books issued</h3>';

                       
            echo $output;
   
          
      }  
      else  
      {  
           echo '<br><h2 align="center">Sorry!! Can\'t find the user</h2>';  
      }
    
    
  ?>  


  <script>
  $(document).ready(function(){
      
       $('.fineb').click(function(){
          
          var regno=$(this).attr('id');
           //alert('Database updated');
           var fine=$('#tfine').val();
         if(fine!='0'){      
           $.ajax({
       
                url:"http://localhost/webp/boot/php/fineaction.php",
                method:"POST",
                data:{regno:regno,fine:fine},
                dataType:"text",
                success:function(data){
                  var result=data;
                  if(result[0]=='Y')
                   { 

                    alert('DB updated');
                    $('#finedisp').html('0');   
                     }
                  else
                    alert('Sorry can\'t able to update');
                }

           });
         }
         else
          alert('Fine amount is zero');

       });

  })
  </script>