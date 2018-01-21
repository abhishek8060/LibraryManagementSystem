<?php    
 $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 
$output='';

      $query = "  
      SELECT * FROM books WHERE bookid LIKE '%".$_POST["search"]."%'";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  

      {
        <script>console.log('yess');</script>
        $output.='<h3 align="center">Found books:</h3>'; 
        $output.='<div class="table-responsive">
            <table class="table table bordered table-striped table">
              <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>No. of Copies</th>
              </tr>';

         while($rows=mysqli_fetch_array($result)) 
          { 
              $output.='<tr>
                            <td>'.$rows['bookid'].'</td>
                            <td>'.$rows['name'].'</td>
                            <td>'.$rows['author'].'</td>
                            <td>'.$rows['copies'].'</td>
                        </tr>';
                   }         

          }  
           
           echo $output;  
      }  
      else  
      {  
           echo 'Sorry!! Can\'t find the book';  
      }  
  ?>  