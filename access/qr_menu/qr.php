<?php

include '../../config/database.php';
include '../../classes/user.php'; 
  $database = new Database();
  $db = $database->getConnection();
  $user = new user($db); 

if (isset($_GET["u"]) && isset($_GET["p"])) {
    $u_id = $_GET["u"];  
    $p_id = $_GET["p"];

      if($u_id !== 'Pn2dUnFKCAsfOzPSwCJdxcbQo3gweAvksK6Ge1p0dArtCx0Vogv7vthWe8WA09ioHk7e75Lp5PU4hDY0JAdZqzM1vGNoGzgFvSlR' OR $p_id != 'hKzjug9FqKdTruyXoPo1QOZoI2HEDJBXGkyKk9ykg4DqDSNhAwdpn4aCjuGAT0eMfUKVJ70lYGUUqcr2CZStUFvcRAPeuvRBmOu3'){
                include_once "import.php";
echo'<center><div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow.   
  Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div></center>';
      }
      else{
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
       

        $user->ip = $ip;

        $stmt = $user->ip_check();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){


                    // Redirect user to welcome page
                         include_once "data.php";    
        }

        else{

                      include_once "import.php";
echo'<center><div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow. Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div></center>';
        }
      }
  }


      else{
        include_once "import.php";
echo'<center><div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow.<br> Your session may have timed out. For additional orders please ask management for assistance.<br> Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div></center>';
?>


<?php
      }
?>
