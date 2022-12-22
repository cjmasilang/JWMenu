<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->quantity= $_POST['quantity'];
     $user->food_id= $_POST['food_id'];
     $user->transaction_id= $_POST['table_id'];
     $stmt2= $user->select_transac_add();
     $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        extract($row2);
     $user->table_id = $table_id;


     

      if($user->add_to_cart_add()){
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