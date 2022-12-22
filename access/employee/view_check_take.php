<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->food_id= $_POST['food_id'];
     $user->table_id= $_POST['table_id'];
     $user->quantity= $_POST['quantity'];

      if($user->add_to_cart_take()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Food Item has been added to order.";
            echo "</div>" ;     
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to add food item.";
            echo "</div>" ;
   }


  

}
?>