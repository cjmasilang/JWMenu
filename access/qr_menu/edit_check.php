<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->order_id= $_POST['order_id'];
     $user->quantity= $_POST['quantity'];
     $quant= $_POST['quantity'];
    if($quant < 1){

      $user->delete_my_cart();
        echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Food Item has been deleted.";
            echo "</div>" ;  
    }

    else{


      if($user->edit_my_cart()){
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