<?php
session_start();
$_SESSION['message'] = '';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    
  </head>
<body>


<div class="container" style="width:600px;">
  <h3>Search</h3>
  
 <div class="tab-content">
    
    <input type="text" name="regno" id="regno" style="width:200px;" class="form-control" placeholder="Reg no." required/>
     <button id="sstudent" class="btn btn-success" style="float:left;"><i class="fa fa-search" aria-hidden="true"></i></button>
     <br><br>
     <div id="sresult">
     </div>
    
     
 </div>
 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        
  </body>
</html>


<script>
$(document).ready(function(){


  $('#sstudent').click(function(){
      var txt = $('#regno').val();
        console.log(txt);
        var action="sstudent";
      if(txt!='')
      {
        $.ajax({
             url:"http://localhost/webp/boot/php/tlbstudent.php",
             method:"POST",
             data:{search:txt,
                   action:action},
             dataType:"text",

             success:function(data){
              $('#sresult').html(data);
             }
  
        });
      }

      else{
        $('#sresult').html('');
      }


 });


});

</script>
  