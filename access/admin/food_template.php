

  <style type="text/css">
    form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background:  #3b3636;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #f5ca53;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
#table_menu{
    font-size: 0.9rem;
}
.button_size{
    font-size: 0.9rem;
}
  </style>
  <div id="table_menu" >
<?php
     echo "<br>";

    echo " <form role='search' class='example' action='menu_list?category=".$category_id."&'>";
              $search_value=isset($search_term) ? "value='{$search_term}'" : "";
              echo"
                    <input type='text' placeholder='Search...' name='s' id='srch-term'  {$search_value}/>
                     <input style='display:none;' type='text' name='category' value='".$category_id."'/>
                    <button type='submit'><i class='fa fa-search'></i></button>
                  </form>";
// display the table if the number of users retrieved was greater than zero
if($total_rows>0){
      echo "<br>";
 
     if($total_rows < 2){
        $res = 'Food item';
    }
    else{
        $res = 'Food Items';
    }
       echo "<p style='color: gray; font-family: Arial; font-weight: normal; float:left;'>
        <strong>{$total_rows} {$res} found.</strong>
    </p>";
     echo "<table class='table table-bordered table-striped'>";
       echo '<thead>';
        echo "<tr>";
        echo "<th>1st Picture</th>";
        echo "<th>2nd Picture</th>";
        echo "<th>Food Name</th>";
        echo "<th>Food Description</th>";
        echo "<th>Food Price</th>";
        echo "<th>Action</th>";
          echo "</tr>";
 echo"</thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
          echo "<tr>";
          echo "<td><img style='height: 80px; width:80px;' src='../../uploads/".$pic_1."' alt='pic_1'></td>";
          echo "<td><img style='height: 80px; width:80px;' src='../../uploads/".$pic_2."' alt='pic_2'></td>";
          echo "<td><i class='fas fa-tags'></i> {$food_name}</td>";
          echo "<td><i class='fas fa-info-circle'></i> {$food_description}</td>";
          echo "<td><span>&#8369;</span> {$food_price}</td>";
          echo "<td>";  
                           
               echo "

                  <a class='btn btn-outline-danger delete_object btn-block button_size' delete_id='".$food_id."'><i class='fas fa-archive'></i> Archive </a>
                  <a class='btn btn-outline-secondary edit_object btn-block button_size' edit_id='".$food_id."'><i class='fas fa-edit'></i> Edit
                       </a>
                  <a class='btn btn-outline-info view_object btn-block button_size' view_id='".$food_id."'><i class='fas fa-eye'></i> View </a>
                   <a class='btn btn-outline-secondary add_object btn-block button_size' add_id='".$food_id."'><i class='fas fa-plus'></i> Add-on
                       </a>

                         <a class='btn btn-outline-secondary see_object btn-block button_size' see_id='".$food_id."'><i class='fas fa-eye'></i> View Add-on
                       </a>
                  
             </td>";
      
          echo "</tr>";

        }
 
    echo "</table>";
    // actual paging buttons
    include_once '../paging/paging.php';
}
 
// tell the user there are no selfies
else{
     echo "<br>";
      echo "<br>";
       echo "<br>";
    echo "<div class='alert alert-warning'>
        <strong>No food item found.</strong>
    </div>";
}
?>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>

  