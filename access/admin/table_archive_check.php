<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->table_id= $_POST['delete_id'];

      if($user->archive_table()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Table has been archived";
            echo "</div>" ;     
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to archive table";
            echo "</div>" ;
   }


  

}
?>
