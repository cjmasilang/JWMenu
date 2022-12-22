<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->table_number= $_POST['table_number'];
	 $table =  $_POST['table_number'];
 
      
    $stmt = $user->check_table();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);
 

        echo "<div class='alert alert-danger ' role='alert'>";
            echo "Table already exists";
            echo "</div>" ;

	 // if unable to create the table, tell the user
  }  

      else{
      
    $user->table_number= $_POST['table_number'];
      	$user->add_table();
        echo "<div class='alert alert-success'>Table successfully added.</div>";
    }
 
   

   
}
?>