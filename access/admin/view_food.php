<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->food_id = $_POST['view_id'];
   $stmt = $user->select_food_item();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   extract($row);
   $id= $_POST['view_id'];
    
echo "<form method='POST' id='editForm'>
       <table class='table table-borderless'>
  
  <tbody>
      <tr>
        <td><p>1st Picture</p><br><img style='height: 100%; width:100%;' src='../../uploads/".$pic_1."' alt='pic_1'></td>
        <td><p>2nd Picture</p><br><img style='height: 100%; width:100%;' src='../../uploads/".$pic_2."' alt='pic_2'></td>
       
    </tr>
     <tr>
        <td> <label for='food_name'>Food Name:</label></td>
        <td><p>".$food_name."</p></td>
       
    </tr>
      <tr>
        <td> <label for='price'>Food Description:</label></td>
        <td><p>".$food_description."</p></td>
       
    </tr>
          <tr>
        <td> <label for='price'>Food Price:</label></td>
        <td><p>".$food_price."</p></td>
       
    </tr>
 
    <tr>
 
            <td>
            </td>
            <td>
              
              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </td>
          </tr>
   
  
  </tbody>
</table>
      </form>";

   
}
?>
