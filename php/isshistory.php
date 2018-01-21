<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    
  </head>
<body>
<?php 
      $connect = mysqli_connect("localhost", "root", "Abhishek_2", "library"); 
      $query = "  
      SELECT * FROM issuelist ORDER by formdate DESC";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0){
        ?>
        <br><h2 align="center">Issue List</h2><br>
        <div class="table-responsive">
            <table class="table table bordered table-striped table">
              <tr>
                <th>IssueID</th>
                <th>BookID</th>
                <th>Reg.No</th>
                <th>Issue Date</th>
                <th>Submission Date</th>
              </tr>
<?php
         while($rows=mysqli_fetch_array($result)) 
          { 
                 ?>   
                        <tr >
                            <td><?php echo $rows['issueid']; ?></td>
                            <td><?php echo $rows['bookid']; ?></td>
                            <td><a href="#" class="user" id="<?php echo $rows['regno'];?>"><?php echo $rows['regno']; ?></a></td>
                            <td><?php echo $rows['formdate']; ?></td>
                            <td><?php echo $rows['todate']; ?></td>
                        </tr>

                  <?php }} ?>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 </body>
</html>
<script>
$(document).ready(function(){
   
   $('.user').click(function(){
 
     var regno=$(this).attr('id');
      $.ajax({
          url:"http://localhost/webp/boot/php/searchstudent.php",
             method:"POST",
             data:{search:regno},
             dataType:"text",

             success:function(data){
           //   alert(regno);
              $('#main').html(data);

             }
      });
 
   });

});
</script> 