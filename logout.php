<?php

setcookie("login","1",time()-1);
session_destroy();  
header("location:http://localhost/webp/boot/login.php");
?>