<?php 

   
 $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 
$output='';

      $query = "  
      SELECT * FROM books ORDER BY adddate DESC";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      { 
        $output.='<h3 align="center">Book List</h3><br>
            <div class="table-responsive">
            <table class="table table bordered table-striped table">
              <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Publication</th>
                <th>No. of Copies</th>
                <th>Location</th>
                <th>Price</th>
              </tr>';
        
         while($rows=mysqli_fetch_array($result)) 
          { 
              $output.='<tr>
                            <td>'.$rows['bookid'].'</td>
                            <td>'.$rows['name'].'</td>
                            <td>'.$rows['author'].'</td>
                            <td>'.$rows['publication'].'</td>
                            <td>'.$rows['copies'].'</td>
                            <td>'.$rows['location'].'</td>
                            <td>'.$rows['price'].'</td>
                            </tr>';
                    

          }  
           
           echo $output;  
      }  
else  
      {  
           echo 'No books!!';  
      }  
  
  ?>  