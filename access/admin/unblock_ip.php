<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->ip_number= $_POST['ip_number'];

        if($user->unblock_ip()){

        echo "<div class='alert alert-success ' role='alert'>";
            echo "Ip address has been added";
            echo "</div>" ;
  }  

      else{
      
        echo "<div class='alert alert-danger'>Failed to unblock ip addresses.</div>";
    }
 
   

   
}
?>