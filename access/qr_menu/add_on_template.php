

  <style type="text/css">

#table_menu{
    font-size: 0.9rem;
}
.button_size{
    font-size: 0.9rem;
}
@media screen and (max-width: 600px) {
.thw{
    width: 25%;
     font-size: 10px;
}
.bot{

  font-size: 10px;
}

}
  </style>
  <div id="table_menu" style="width: 100%;">
<?php
     echo "<br>";

// display the table if the number of users retrieved was greater than zero
if($total_rows2>0){
      echo "<br>";
 

     echo "<table class='table table-borderless table-striped'>";
       echo '<thead>';
        echo "<tr>";
        echo "<th class='thw'>Add-on Name</th>";
        echo "<th class='thw'>Quantity</th>";
        echo "<th class='thw'>Computed Price</th>";
        echo "<th class='thw'>Action</th>";
          echo "</tr>";
 echo"</thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $price = $add_on_price * $quantity;
          echo "<tr>";
          echo "<td class='thw'><i class='fas fa-tags'></i> {$add_on_name}</td>";
          echo "<td class='thw'>x {$quantity}</td>";
          echo "<td class='thw'><span>&#8369;</span> {$price}</td>";
          echo "<td class='thw'>";  
                           
               echo "
                  <a class='btn btn-outline-secondary btn-block edit_object2 bot' edit_id2='".$add_order_id."'><i class='fas fa-edit'></i> Edit
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
        <strong>No add-ons found.</strong>
    </div>";
}
?>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>

  