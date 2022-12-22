<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->user_id= $_POST['delete_id'];

      if($user->archive_user()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "User Account has been archived.";
            echo "</div>" ;     
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to archive user account.";
            echo "</div>" ;
   }


  

}
?>
