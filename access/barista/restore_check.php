<?php

  include '../../config/database.php';
   include '../../classes/user.php';
require __DIR__ . '../../../vendor/autoload.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

     $user->finish_id= $_POST['finish_id'];
    $finish_id= $_POST['finish_id'];
      if($user->restore_order() && $user->restore_order_item_barista() && $user->restore_order_item_add_on_barista()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been restored from queue.";
            echo "</div>" ; 
  
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to restore order.";
            echo "</div>" ;
   }


  

}
?>
