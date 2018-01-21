<?php
session_start();
$mysqli=new mysqli('localhost','root','Abhishek_2','library');
if($_SERVER['REQUEST_METHOD']=='POST'){
         
         if($_POST['action']=="sstudent"){  
    $regno=$mysqli->real_escape_string($_POST['search']);
    
    $queryuname="SELECT * FROM tlbissuelist where regno='$regno'";
        $result=$mysqli->query($queryuname);
       if($result->num_rows>0){
         ?>

        <div class="table-responsive">
            <table class="table table bordered table-striped table">
              <tr>
                <th>ID</th>
                <th>Regno</th>
                <th>Name</th>
                <th>BookID</th>
                <th>Book Name</th>
                <th>Action</th>
              </tr>
         <?php 
        while($rows=mysqli_fetch_array($result)) {
          ?>
              <tr >
                            <td><?php echo $rows['id'] ?></td>
                            <td><?php echo $rows['regno'] ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['bid'] ?></td>
                            <td><?php echo $rows['bname'] ?></td>
                          
                            <input type="hidden" id="<?php echo $rows['bid'] ?>name" value="<?php echo $rows['name'] ?>">
                            <input type="hidden" id="<?php echo $rows['bid'] ?>regno" value="<?php echo $rows['regno'] ?>">
                            <input type="hidden" id="<?php echo $rows['bid'] ?>bname" value="<?php echo $rows['bname'] ?>">
                            
                            <td id="<?php echo $rows['bid'] ?>"><button class="btn btn-primary return" id="<?php echo $rows['bid'] ?>">Return</button></td>
                            
                        
                     <!--       <td><b>Returned</b></td> -->   
              </tr>

          <?php
          }
        
        ?>
      </table>
    </div>
        <?php
      }
      else
         {
          echo '<h3>No results found</h3>';
         }
          
     }
  }
?>

<script>

$(document).ready(function(){
 
$('.return').click(function(){
 
   var id=$(this).attr('id');
   var regno=$('#'+id+'regno').val();
   var name=$('#'+id+'name').val();
   var bname=$('#'+id+'bname').val();
   var action="return";
    $.ajax({
    url:"http://localhost/webp/boot/php/tlbreturnaction.php",
    method:"POST",
    dataType:"text",
    data:{
    bid:id,
    regno:regno,
    name:name,
    bname:bname,
    action:action
    },
    success:function(data)
    { 
      var result = $.trim(data);
          // console.log(result);
               if(result[0]=='Y'){
                  $('#'+id).html('<b>Returned</b>');
                  alert('Book returned');  
           }
             
           else if(result[0]=='N')
            {
              alert('Can\'t be returned');
            }  
        
      }
 });

});    

});
</script>