<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->user_id= $_POST['delete_id'];
                if($user->delete_user()){
                echo "<div class='alert alert-success alert-dismissable' role='alert'>";
                      echo "User account has been deleted.";
                      echo "</div>" ;     
              }
                else{
                 echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
                      echo "Failed to delete user account.";
                      echo "</div>" ;
             }


}
?>
