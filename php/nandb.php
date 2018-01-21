<?php    
 $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 

     if($_GET["iid"]=="book"){
      $query = "  
      SELECT * FROM books ORDER BY adddate DESC";
      $count=0;  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
         while($rows=mysqli_fetch_array($result)) 
          {   
             if($count<10 ){
                        ?><ul>
                            <li><?php echo $rows['name'].'-'.$rows['author'];?></li>
                        </ul><?php
                      }
                  else
                   break;    
             $count+=1;    
          }  
           
           
      }  
      else  
      {  
        ?>
           <h4>No new Books</h4>  <?php
      } 
}
 else if($_GET["iid"]=="notice"){
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
                      ?> <ul>
                            <li><?php echo $rows['notice'];?></li>
                        </ul> 
                        <?php
               }
              else{
                break;
              }

              $count+=1; 

          }  
           
           
      }  
      else  
      {  
          ?>
           <h4>No new Books</h4>  <?php
     
      } 
 }

  ?>  