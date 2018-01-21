<?php    
 $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 
 session_start();

$output='';
 

      $query = "  
      SELECT * FROM books WHERE name LIKE '%".$_POST["search"]."%' OR author LIKE '%".$_POST["search"]."%' OR bookid LIKE '%".$_POST["search"]."%'";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      { $output.='<h3 align="center">Found books:</h3>'; 
        $output.='<div class="table-responsive">
            <table class="table table bordered table-striped table">
              <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>No. of Copies</th>
                <th>Loaction</th>
                ';
               if(isset($_SESSION['username']) && $_SESSION['submit']==0)  
                $output.='<th>Operation</th>
              </tr>';
              else
                $output.='</tr>';

         while($rows=mysqli_fetch_array($result)) 
          { 
              $output.='<tr>
                            <td>'.$rows['bookid'].'</td>
                            <td>'.$rows['name'].'</td>
                            <td>'.$rows['author'].'</td>
                            <td>'.$rows['copies'].'</td>
                            <td>'.$rows['location'].'</td>
                            <input type="hidden" name="bname" id="bname'.$rows["bookid"].'" value="'.$rows["name"].'" />
                            <input type="hidden" name="aname" id="aname'.$rows["bookid"].'" value="'.$rows["author"].'" />
                          ';
                   if($rows['copies']>0 && isset($_SESSION['username']) && $_SESSION['submit']==0){
                           $output.='<td><button name="addbutton" id="'.$rows["bookid"].'" class="btn btn-success addbutton"><i class="fa fa-plus-square" aria-hidden="true"></i></button></td>
                            </tr>';}
                   else{
                       $output.='
                            <td></td>
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

 <script>
 $(document).ready(function(){
$('.addbutton').click(function(){
   
    var bid=$(this).attr("id");
    var bname=$('#bname'+bid).val();
    var aname=$('#aname'+bid).val();
    var action="add";
    $.ajax({
    url:"http://localhost/webp/boot/php/listaction.php",
    method:"POST",
    dataType:"text",
    data:{
    bid:bid,
    bname:bname,
    aname:aname,
    action:action
    },
    success:function(data)
    { 

           var result = $.trim(data);
           
                if(result[0]=='0'){
           alert(bname+' has been already added to the list');  
           }
             
           else if(result[0]=='1')
            {
              alert('More than 4 books can\'t be added');
            }  

           else{     
           alert(bname+' has been added to the list');
           $('.listmain').html(data); 
          }
    }
   

   });
  
  
  
  });
});

 </script>
