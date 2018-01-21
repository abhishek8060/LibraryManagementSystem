<?php    
 $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 
$output='';
     if($_POST["iid"]=="book"){
      $query = "  
      SELECT * FROM books ORDER BY adddate DESC";
      $count=0;  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
         while($rows=mysqli_fetch_array($result)) 
          {   
             if($count<10 ){
              $output.='<ul>
                            <li>'.$rows['name'].'-'.$rows['author'].'</li>
                        </ul>';
                      }
                  else
                   break;    
             $count+=1;    
          }  
           
           echo $output;  
      }  
      else  
      {  
           echo 'No new Books';  
      } 
}
 else{
   $output='';
   $query = "  
      SELECT * FROM notices ORDER BY id DESC";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
         $count=0;
         while($rows=mysqli_fetch_array($result)) 
          { 
           
              if($count<10) {
              $output.='<ul>
                            <li>'.$rows['notice'].'</li>
                        </ul>';
               }
              else{
                break;
              }

              $count+=1; 

          }  
           
           echo $output;  
      }  
      else  
      {  
           echo 'No new Notices';  
      } 
 }

  ?>  