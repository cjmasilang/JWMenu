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
                      echo "Unable to delete category. Food Items still present in category.";
                      echo "</div>" ;

          }

          else{

                if($user->delete_category()){
                echo "<div class='alert alert-success alert-dismissable' role='alert'>";
                      echo "Category has been deleted.";
                      echo "</div>" ;     
              }
                else{
                 echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
                      echo "Failed to delete category.";
                      echo "</div>" ;
             }

          }

}
?>
