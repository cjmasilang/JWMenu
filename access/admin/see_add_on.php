<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->food_id = $_POST['see_id'];
   $stmt = $user->select_add_on();
   $total_rows=$user->add_list_count();
   $id= $_POST['see_id'];


  if($total_rows>0){
      echo "<br>";
 
     if($total_rows < 2){
        $res = 'Add-on';
    }
    else{
        $res = 'Add-ons';
    }
       echo "<p style='color: gray; font-family: Arial; font-weight: normal; float:left;'>
        <strong>{$total_rows} {$res} found.</strong>
    </p>";
     echo "<table class='table table-bordered table-striped'>";
       echo '<thead>';
        echo "<tr>";
        echo "<th>Add-on Name</th>";
        echo "<th>Price</th>";
          echo "</tr>";
 echo"</thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
          echo "<tr>";
          echo "<td>".$add_on_name."</td>";
          echo "<td>".$add_on_price."</td>";

      
          echo "</tr>";

        }
 
    echo "</table>";
}
 
// tell the user there are no selfies
else{
     echo "<br>";
      echo "<br>";
       echo "<br>";
    echo "<div class='alert alert-warning'>
        <strong>No Add-on found.</strong>
    </div>";
}  


   
}
?>
