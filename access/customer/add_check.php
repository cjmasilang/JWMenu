<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
    $user->add_on_id= $_POST['add_on_id'];
    $user->quantity= $_POST['quantity'];
    $user->table_id = $_POST['table_id'];   


   if($user->add_to_cart_add_on()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Add-on has been added";
            echo "</div>" ;

   }

   else{

      echo "<div class='alert alert-warning alert-dismissable' role='alert'>";
            echo "Add-on has not been added";
            echo "</div>" ;
   }
    
}

?>
