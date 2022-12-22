

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
  <div id="table_menu" style="width: 100%;">
<?php
     echo "<br>";

    echo " <form role='search' class='example' action='archive'>";
              $search_value=isset($search_term) ? "value='{$search_term}'" : "";
              echo"
                    <input type='text' placeholder='Search...' name='s' id='srch-term'  {$search_value}/>
                    <button type='submit'><i class='fa fa-search'></i></button>
                  </form>";
// display the table if the number of users retrieved was greater than zero
if($total_rows>0){
      echo "<br>";
 
     if($total_rows < 2){
        $res = 'Category';
    }
    else{
        $res = 'Categories';
    }
       echo "<p style='color: gray; font-family: Arial; font-weight: normal; float:left;'>
        <strong>{$total_rows} {$res} found.</strong>
    </p>";
     echo "<table class='table table-bordered table-striped'>";
       echo '<thead>';
        echo "<tr>";
        echo "<th style='width: 60%;'>Category Name</th>";
        echo "<th style='width: 40%;'>Action</th>";
          echo "</tr>";
 echo"</thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
          echo "<tr>";
          echo "<td><i class='fas fa-tags'></i> {$category_name}</td>";
          echo "<td>";  
                           
               echo "

                  <a class='btn btn-outline-danger delete_object button_size' delete_id='".$category_id."'><i class='fas fa-trash'></i> Delete </a>
                  <a class='btn btn-outline-secondary activate_object button_size' activate_id='".$category_id."'><i class='fas fa-toggle-on'></i> Activate
                       </a>
                  <a href='archive_menu_list?category={$category_id}' class='btn btn-outline-dark button_size'><i class='fas fa-eye'></i> View </a>
                  
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
        <strong>No category found.</strong>
    </div>";
}
?>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>

  