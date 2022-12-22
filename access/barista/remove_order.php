<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->remove_id = $_POST['remove_id'];
   $id= $_POST['remove_id'];    
echo "<form method='POST' id='archiveForm'>
       <table class='table table-borderless'>
  
  <tbody>
    <tr>
        <td style='display: none;'> <label for='remove_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='".$id."'  name='remove_id' required></td>
       
    </tr>
    <tr>
 
            <td>
            </td>
            <td>
              
              <button type='submit' class='btn btn-warning' style='float: right;' >remove</button>
              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
            </td>
          </tr>
   
  
  </tbody>
</table>
      </form>";

   
}
?>
<script type="text/javascript">
  
  $('#archiveForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'remove_check.php',
        method: 'POST',
        data:$('#archiveForm').serialize(),

        success:function(data){
            $('#updateModal6').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},500);
        }
    });
});
</script>