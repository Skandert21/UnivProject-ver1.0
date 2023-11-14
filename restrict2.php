<?php


// Check if the user is logged in, if not then redirect him to login page
if($_SESSION['level'] != 0){



    header("location: warn2.php");
  

    exit;

}

?>
 
       

