<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
  $user->add_on_id= $_POST['add_on_id'];
    $user->food_id= $_POST['adds_id'];
    $Food_id= $_POST['adds_id'];
    $Add_on_id= $_POST['add_on_id'];

    $stmt = $user->check_add_on_list();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
      $name= $add_on_name;
      $price= $add_on_price;

     $user->add_on_id= $_POST['add_on_id'];
      $user->food_id= $_POST['adds_id'];
       $stmt2 = $user->check_add_on();
 
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        if($row2){
            extract($row2);
 
  echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Add-on failed to be added.";
            echo "</div>" ;

  
  }  

     else{
    $user->add_on_name= $name;
    $user->add_on_price= $price;
    $user->add_on_id= $Add_on_id;
    $user->food_id= $Food_id;
    $user->add_add_menu();
    echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            
            echo "Add-on has been added.";
            echo "</div>" ;
}
}
?>