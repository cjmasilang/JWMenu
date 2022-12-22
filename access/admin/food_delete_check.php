<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
     $user->food_id= $_POST['delete_id'];
        $stmt = $user->food_delete_check();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
          extract($row);
            $filepath = '../../uploads/'.$row['pic_1'];
            $filepath2 = '../../uploads/'.$row['pic_2'];
                if($user->delete_food_item() && unlink($filepath) && unlink($filepath2)){
                echo "<div class='alert alert-success alert-dismissable' role='alert'>";
                      echo "Food Item has been deleted.";
                      echo "</div>" ;     
              }
                else{
                 echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
                      echo "Failed to delete food item.";
                      echo "</div>" ;
             }


}
?>
