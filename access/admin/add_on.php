<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->food_id = $_POST['add_id'];
   $id= $_POST['add_id'];
     }   
        ?>
</table>
<form method='POST' id='editForm'>
       <table class='table table-borderless'>
  
  <tbody>
    <tr>
        <td style='display: none;'> <label for='edit_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='<?php echo $id;?>'  name='adds_id' required></td>
       
    </tr>


     <tr>
        <td> <label for='add_on_id'>Add-on:</label></td>
        <td> <Select class="form-control" name="add_on_id" required>
                  <option value="" disabled selected>Select add-on...</option>
                    <?php 
                   $stmt= $user->select_add_on_list();
                   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    
                     echo '<option value="'.$add_on_id.'" >'.$add_on_name.'</option>';
                 }
                  ?>
                </Select></td>
       
    </tr>


    <tr>
 
            <td>
            </td>
            <td>
              
              <button type='submit' class='btn btn-secondary' style='float: right;' ><i class='fas fa-plus'></i> Add-on</button>
              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
            </td>
          </tr>
   
  
  </tbody>
</table>
      </form>

   

<script type="text/javascript">
  
  $('#editForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'add_on_check.php',
        method: 'POST',
        data:$('#editForm').serialize(),

        success:function(data){
            $('#updateModal7').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},2000);
        }
    });
});
</script>