<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
    $user->table_id= $_POST['edit_id'];
    $user->table_number = $_POST['table_number'];
 
   
       $stmt = $user->check_table_number();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);
 
  echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Table already exists";
            echo "</div>" ;

  
  }  

     else{
   $user->table_number= $_POST['table_number'];
   $user->edit_table();
    echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Table has been edited";
            echo "</div>" ;
}
}
?>
