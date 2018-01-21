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
      SELECT * FROM tlbissuelist ORDER by regno DESC";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0){
        ?>
        <br><h2 align="center">Issue List</h2><br>
        <div class="table-responsive">
            <table class="table table bordered table-striped table">
              <tr>
                
                <th>Reg.No</th>
                <th>Name</th>
                <th>BookId</th>
                <th>Book Name</th>
                </tr>
<?php
         while($rows=mysqli_fetch_array($result)) 
          { 
                 ?>   
                        <tr >
                            <td><a href="#" class="user" id="<?php echo $rows['regno'];?>"><?php echo $rows['regno']; ?></a></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['bid'] ?></td>
                            <td><?php echo $rows['bname'] ?></td>
                        </tr>

                  <?php }}
               else
                 echo '<h2 align="center">No Issue records</h2>'

                   ?>  
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
              $('#maindiv').html(data);

             }
      });
 
   });

});
</script> 
  