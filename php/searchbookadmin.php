<?php    
 $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 
$output='';

      $query = "  
      SELECT * FROM books WHERE bookid LIKE '%".$_POST["search"]."%'";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {
        $output.='<div class="table-responsive">
            <table class="table table bordered">
              ';

         while($rows=mysqli_fetch_array($result)) 
          { 
              $output.='<tr>
                            <th>'.$rows['name'].'  '.$rows['author'].'</th>
                        </tr>';
                            

          }  
           
           echo $output;  
      }  
      else  
      {  
           echo 'Sorry!! Can\'t find the book';  
      }  
  ?>  