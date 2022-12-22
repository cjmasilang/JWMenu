<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->food_id= $_POST['delete_id'];

      if($user->archive_food_item()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Food Item has been archived.";
            echo "</div>" ;     
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to archive food item.";
            echo "</div>" ;
   }


  

}
?>
