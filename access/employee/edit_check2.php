<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->add_order_id= $_POST['add_order_id'];
     $user->quantity= $_POST['quantity'];
     $quant= $_POST['quantity'];
    if($quant < 1){

      $user->delete_my_cart_add_on();
        echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Add on item has been deleted.";
            echo "</div>" ;  
    }

    else{


      if($user->edit_my_cart_add_on()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Quantity has been edited.";
            echo "</div>" ;     
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to edit quantity.";
            echo "</div>" ;
   }

    }





  

}
?>