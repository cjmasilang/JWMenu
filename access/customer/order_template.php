

  <style type="text/css">

#table_menu{
    font-size: 0.9rem;
}
.button_size{
    font-size: 0.9rem;
}
  </style>
  <div id="table_menu" style="width: 100%;">
<?php
     echo "<br>";

// display the table if the number of users retrieved was greater than zero
if($total_rows>0){
      echo "<br>";
 
     if($total_rows < 2){
        $res = 'Order';
    }
    else{
        $res = 'Orders';
    }
       echo "<p style='color: gray; font-family: Arial; font-weight: normal; float:left;'>
        <strong>{$total_rows} {$res} found.</strong>
    </p>";
     echo "<table class='table table-borderless table-striped'>";
       echo '<thead>';
        echo "<tr>";
        echo "<th>Food Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Computed Price</th>";
        echo "<th>Action</th>";
          echo "</tr>";
 echo"</thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $price = $food_price * $quantity;
        $transaction_id;
          echo "<tr>";
          echo "<td><i class='fas fa-tags'></i> {$food_name}</td>";
          echo "<td>x {$quantity}</td>";
          echo "<td><span>&#8369;</span> {$price}</td>";
          echo "<td>";  
                           
               echo "
                  <a class='btn btn-outline-secondary edit_object' edit_id='".$order_id."'><i class='fas fa-edit'></i> Edit
                       </a>

                       <a class='btn btn-outline-warning add_object' add_id='".$order_id."'><i class='fas fa-plus'></i> Add-on
                       </a>
                  
             </td>";
      
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
        <strong>No order found.</strong>
    </div>";
}
?>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>

  