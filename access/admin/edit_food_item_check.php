<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
    $user->food_id= $_POST['edit_id'];
    $user->food_name = $_POST['food_name'];
    $user->food_description = $_POST['food_description'];
    $user->food_price = $_POST['food_price'];
    if($user->edit_food()){
            echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Food Item has been edited";
            echo "</div>" ;

  }  

     else{
            echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Food Item was not updated.";
            echo "</div>" ;
}
}
?>
