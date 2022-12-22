<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->activate_id = $_POST['activate_id'];
   $id= $_POST['activate_id'];    
echo "<form method='POST' id='activateForm'>
       <table class='table table-borderless'>
  
  <tbody>
    <tr>
        <td style='display: none;'> <label for='activate_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='".$id."'  name='activate_id' required></td>
       
    </tr>
    <tr>
 
            <td>
            </td>
            <td>
              
              <button type='submit' class='btn btn-secondary' style='float: right;' ><i class='fas fa-toggle-on'></i> Activate</button>
              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
            </td>
          </tr>
   
  
  </tbody>
</table>
      </form>";

   
}
?>
<script type="text/javascript">
  
  $('#activateForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'table_activate_check.php',
        method: 'POST',
        data:$('#activateForm').serialize(),

        success:function(data){
            $('#updateModal5').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},2000);
        }
    });
});
</script>