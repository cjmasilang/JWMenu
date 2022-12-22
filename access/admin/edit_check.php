<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
    $user->category_id= $_POST['edit_id'];
    $user->category_name = $_POST['category_name'];
     $user->category_description = $_POST['category_description'];
   
       $stmt = $user->check_category_name();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);
 
  echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Category already exists";
            echo "</div>" ;

  
  }  

     else{
   $user->category_name= $_POST['category_name'];
   $user->category_description = $_POST['category_description'];
   $user->edit_category();
    echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Category has been edited";
            echo "</div>" ;
}
}
?>
