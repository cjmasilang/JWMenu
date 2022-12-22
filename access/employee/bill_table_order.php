<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

   $user->view_id = $_POST['bill_id'];
   $id= $_POST['bill_id'];
   $user->table_number = $id;
   $stmt2= $user->view_table_order_check();
   $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

   if($row2){
         extract($row2); 
   $transac_num = $transaction_number; 
   $user->transaction_id = $transaction_number; 
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
  $stmt= $user->my_view_table();
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
  $total_price=$user->total_price_bill();
  $total_price_add_on=$user->total_price_add_on_bill();
  $total_price_final = $total_price + $total_price_add_on;
  echo"
  <tr>
 <div class='form-row'>

  <div class='col-md-10'>

  </div>
  <div class='col-md-2'>
    

  <input style='display: none;' type='text' name='finish_id' value='".$transac_num."'>
   <input style='display: none;' type='text' name='transaction_total_price' value='".$total_price_final."'>



  </div>
</div>
  </tr>
    <tr>
  <td>
  <h5>Total Price: </h5>
            </td>
            <td>
              <h3 style='color:red;'><span>&#8369;</span>".$total_price_final."</h3>
            </td>
            <td>
            
            </td>
          </tr>

              <tr>
  <td>

            </td>
            <td>
       
            </td>
            <td>";
   $user->transac_number = $transac_num;
   $stmt5= $user->select_table_bail_out();
   $row5 = $stmt5->fetch(PDO::FETCH_ASSOC);

   if($row5 > 0){


}

else{

              echo"
             <button type='submit' class='btn btn-warning' style='float: right;' ><i class='fas fa-receipt'></i> Bill</button>
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
             ";
}
             echo"
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
  
  $('#archiveForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'bail_out.php',
        method: 'POST',
        data:$('#archiveForm').serialize(),

        success:function(data){
            $('#updateModal5').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},500);
        }
    });
});
</script>