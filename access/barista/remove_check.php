<?php
  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

     $user->order_id= $_POST['remove_id'];
     $remove_id= $_POST['remove_id'];



      if($user->remove_order_item_barista()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been removed and ready to be served.";
            echo "</div>" ;  
        }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to remove order.";
            echo "</div>" ;
   }


  

}
?>
