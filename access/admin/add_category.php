<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->category_name= $_POST['category_name'];
   $user->category_description= $_POST['category_description'];
   $user->category_type= $_POST['category_type'];
	 $category =  $_POST['category_name'];
 
      
    $stmt = $user->check_category();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);
 

        echo "<div class='alert alert-danger ' role='alert'>";
            echo "Category already exists";
            echo "</div>" ;

	 // if unable to create the category, tell the user
  }  

      else{
      
    $user->category_name= $_POST['category_name'];
    $user->category_description= $_POST['category_description'];
      	$user->add_category();
        echo "<div class='alert alert-success'>Category successfully added.</div>";
    }
 
   

   
}
?>