

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

    echo " <form role='search' class='example' action='manage_user'>";
              $search_value=isset($search_term) ? "value='{$search_term}'" : "";
              echo"
                    <input type='text' placeholder='Search...' name='s' id='srch-term'  {$search_value}/>
                    <button type='submit'><i class='fa fa-search'></i></button>
                  </form>";
// display the table if the number of users retrieved was greater than zero
if($total_rows>0){
      echo "<br>";
 
     if($total_rows < 2){
        $res = 'User Account';
    }
    else{
        $res = 'User Accounts';
    }
       echo "<p style='color: gray; font-family: Arial; font-weight: normal; float:left;'>
        <strong>{$total_rows} {$res} found.</strong>
    </p>";
     echo "<table class='table table-bordered table-striped'>";
       echo '<thead>';
        echo "<tr>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>User Type</th>";
        echo "<th>Action</th>";
          echo "</tr>";
 echo"</thead>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
          if($usertype == 'admin'){
            $user_type = 'Admin';
          }
          elseif($usertype == 'employee'){
            $user_type = 'Employee';
          }
          elseif($usertype == 'kitchen'){
            $user_type = 'Kitchen Account';
          }
          else{
            $user_type = 'Front Desk Account';
          }
          echo "<tr>";
          echo "<td>{$firstname}</td>";
          echo "<td>{$lastname}</td>";
          echo "<td>{$user_type}</td>";
          echo "<td>";  
                           
               echo "

                  <a class='btn btn-outline-danger delete_object button_size' delete_id='".$user_id."'><i class='fas fa-archive'></i> Archive </a>
                  
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
        <strong>No user account found.</strong>
    </div>";
}
?>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>

  