<?php    
 session_start();
 
    if(isset($_POST['bid']))
        { 
           
        
            $books_table='';
               $message='';
               $check='1';
             
        if($_POST["action"] == "add")
           { 
              if(!empty($_SESSION["list"])){
              foreach($_SESSION["list"] as $keys => $values)  
               {  
                if($values["bid"] == $_POST["bid"])  
                {  
                     $check='0';  
                }  
               }
              }
               if($check=='1'){

                 if($_SESSION['count']<3){
                 $_SESSION['count']++;
                  $book_array=array(
                  
                  'bid' => $_POST['bid'],
                  'bname' => $_POST['bname'],
                  'aname' => $_POST['aname']

                   );
                   
            //     $ind=$_SESSION['count'];
                $_SESSION['list'][]=$book_array;
                      
                  
              //     $_SESSION['count']++;
                   //print_r($_SESSION);

                   $books_table.=''.$message.' 
                <table class="table table-bordered">  
                <tr>  
                     <th>BookID</th>  
                     <th>Name</th>  
                     <th>Author</th>  
                     <th>Action</th>   
                </tr>  ';


               if(!empty($_SESSION["list"]))  
               {  
                
                 foreach($_SESSION["list"] as $keys => $values)  
                  {  
                    $books_table .= '  
                     <tr>  
                          <td>'.$values["bid"].'</td>  
                          <td>'.$values["bname"].'</td>  
                          <td>'.$values["aname"].'</td>  
                          
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["bid"].'">Remove</button></td>  
                     </tr>  
                   ';  
          
                 }  
                 $books_table .= '  
                     <tr>  
                     <td colspan="5" align="center">  
                            
                               <input type="submit" name="list" id="submit" class="btn btn-warning" value="Submit List" />  
      
                     </td>  
                   </tr>  
                  '; 
                 }  
      
           $books_table .= '</table>';
              echo $books_table;
            }
             
             else
             {
              echo $check;
             }


            }
            else
              echo $check; 
          
         }

      else if($_POST["action"]=="remove"){

           $_SESSION['count']--;
           foreach($_SESSION["list"] as $keys => $values)  
           {  
                if($values["bid"] == $_POST["bid"])  
                {  
                     unset($_SESSION["list"][$keys]);  
                     $message = '<label class="text-success">Book Removed</label>';  
                }  
           }



           $books_table.=''.$message.' 
                <table class="table table-bordered">  
                <tr>  
                     <th>BookID</th>  
                     <th>Name</th>  
                     <th>Author</th>  
                     <th>Action</th>   
                </tr>  ';


               if(!empty($_SESSION["list"]))  
               {  
                
                 foreach($_SESSION["list"] as $keys => $values)  
                  {  
                    $books_table .= '  
                     <tr>  
                          <td>'.$values["bid"].'</td>  
                          <td>'.$values["bname"].'</td>  
                          <td>'.$values["aname"].'</td>  
                          
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["bid"].'">Remove</button></td>  
                     </tr>  
                   ';  
          
                 }  
                 $books_table .= '  
                     <tr>  
                     <td colspan="5" align="center">  
                            
                               <input type="submit" name="list" id="submit" class="btn btn-warning" value="Submit List" />  
      
                     </td>  
                   </tr>  
                  '; 
                 }  
      
           $books_table .= '</table>';  
           
           echo $books_table; 

  
      }
   
       

    } 

if($_POST["action"]=="submit"){

           $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library");  
           
              $f=1;
           foreach($_SESSION["list"] as $keys => $values)  
           {  
             
             $regno=$_SESSION['rgno'];
             $name=$_SESSION['username'];
             $bid=$values["bid"];
             $bname=$values["bname"];
             $checkis=0;

            $query="INSERT INTO tlb (regno,name,bid,bname,checkis) VALUES ('$regno','$name','$bid','$bname','$checkis')";

              
             if(mysqli_query($connect, $query)===false)
              {
               $f=0;     
              }

           }

        if($f==1)
          { 
            $_SESSION['submit']=1;
            echo "Y";
           }
        else
           echo "N";
             
      }
     if($_POST["action"]=="resubmit"){

           $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library");  
           
           $regno=$_POST['regno'];
           
           $query="DELETE FROM tlb WHERE regno='$regno'";

           $regno=$_SESSION['rgno'];
                       $queryuname="SELECT * FROM users where regno='$regno'";
                       $result=mysqli_query($connect,$queryuname);
                       if($result->num_rows>0){
                       while($rows=mysqli_fetch_array($result)) {
                       $check=$rows['tlb'];
                           }
                         }

                         if($check==='no')
                          {
                           if(mysqli_query($connect, $query)===true)
                            {
                              echo 'Y';
                             $_SESSION['submit']=0;     
                            }
                          }
                          else
                          echo 'N';  

           }

       
    
  
  ?> 

<script src="http://localhost/webp/boot/js/listaction.js"></script>

