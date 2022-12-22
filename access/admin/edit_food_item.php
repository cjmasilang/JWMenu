<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->food_id = $_POST['edit_id'];
   $stmt = $user->select_food_item();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   extract($row);
   $id= $_POST['edit_id'];
    
echo "<form method='POST' id='editForm'>
       <table class='table table-borderless'>
  
  <tbody>
    <tr>
        <td style='display: none;'> <label for='edit_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='".$id."'  name='edit_id' required></td>
       
    </tr>
     <tr>
        <td> <label for='food_name'>Food Name:</label></td>
        <td><input type='text' class='form-control'  name='food_name' value='".$food_name."' required></td>
       
    </tr>
      <tr>
        <td> <label for='price'>Food Description:</label></td>
        <td><textarea class='form-control'  name='food_description' rows='3' required>".$food_description."</textarea>
        </td>
       
    </tr>
      <tr>
        <td> <label for='food_price'>Food Price:</label></td>
        <td><input type='text' class='form-control'  name='food_price' value='".$food_price."' required></td>
       
    </tr>
    <tr>
 
            <td>
            </td>
            <td>
              
              <button type='submit' class='btn btn-secondary' style='float: right;' ><i class='fas fa-edit'></i> Edit</button>
              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
            </td>
          </tr>
   
  
  </tbody>
</table>
      </form>";

   
}
?>
<script type="text/javascript">
  
  $('#editForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'edit_food_item_check.php',
        method: 'POST',
        data:$('#editForm').serialize(),

        success:function(data){
            $('#updateModal5').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},2000);
        }
    });
});
</script>