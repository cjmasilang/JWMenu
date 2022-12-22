<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->category_id= $_POST['delete_id'];
        $stmt = $user->category_delete_check();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);
                 echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
                      echo "Unable to archive category. Food Items still present in category.";
                      echo "</div>" ;

          }

          else{

                if($user->archive_category()){
                echo "<div class='alert alert-success alert-dismissable' role='alert'>";
                      echo "Category has been archived.";
                      echo "</div>" ;     
              }
                else{
                 echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
                      echo "Failed to archive category.";
                      echo "</div>" ;
             }

          }

}
?>
