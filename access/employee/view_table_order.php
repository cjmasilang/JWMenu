<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->view_id = $_POST['view_id'];
   $id= $_POST['view_id'];
   $user->table_number = $id;
   $stmt2= $user->view_table_order_check();
   $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

   if($row2){
         extract($row2); 
   $transac_num = $transaction_number; 
   $tab_id = $table_id;   
echo "<form method='POST' id='archiveForm'>
      <p style='display: none;'>".$transaction_number."</p>
       <table class='table table-borderless'>";
         echo '<thead>';
        echo "<tr>";
        echo "<th>Food Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Price</th>";
          echo "</tr>";
 echo"</thead>";
  $user->transaction_number = $transac_num;
  $user->table_id = $tab_id;
  $stmt= $user->my_view_table_check();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $price = $food_price * $quantity;
 echo"
    <tr>";
        echo "<td><i class='fas fa-tags'></i> {$food_name}</td>";
          echo "<td>x {$quantity}</td>";
          echo "<td><span>&#8369;</span> {$price}</td>";
       
    echo"</tr>";

  }

  echo'<hr>';


    $user->transaction_number = $transac_num;
  $user->table_id = $tab_id;
  $stmt2= $user->my_view_table_add_on();
  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        extract($row2);
        $on_price = $add_on_price * $row2['quantity'];
 echo"
    <tr>";
        echo "<td><i class='fas fa-tags'></i> {$add_on_name}</td>";
          echo "<td>x ".$row2['quantity']."</td>";
          echo "<td><span>&#8369;</span> {$on_price}</td>";
       
    echo"</tr>";

  }
  echo"
    <tr>
  <td>
            </td>
            <td>
            </td>
            <td>
            
             <a class='btn btn-warning' href='menu_view_add?table=".$transac_num."'><i class='fas fa-plus'></i> Order<a/>
            </td>
          </tr>
   
  

</table>
      </form>";

   }

   else {
    echo "<h5>No orders yet.</h5>";
   }


   
}
?>
<script type="text/javascript">
  
</script>