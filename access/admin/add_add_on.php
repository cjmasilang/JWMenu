<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
	 $user->add_on_name= $_POST['add_on_name'];
   $user->add_on_price= $_POST['add_on_price'];
   $user->add_on_type= $_POST['add_on_type'];
      
    $stmt = $user->add_checker_on();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);
 

        echo "<div class='alert alert-danger ' role='alert'>";
            echo "Add-on already exists";
            echo "</div>" ;

	 // if unable to create the table, tell the user
  }  

      else{

   $user->add_on_name= $_POST['add_on_name'];
   $user->add_on_price= $_POST['add_on_price'];
       $user->add_add_menu_on();
        echo "<div class='alert alert-success'>Add-on successfully added.</div>";

            
      

          }
 
    }
 
?>