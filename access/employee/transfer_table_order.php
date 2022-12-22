<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->transfer_id = $_POST['transfer_id'];
   $transfer_id = $_POST['transfer_id'];
   $id= $_POST['transfer_id'];  
   $temp =  $_POST['temp_id'];


echo "<form method='POST' id='archiveForm'>
<p>Transfer table to table ".$transfer_id."</p>
       <table class='table table-borderless'>
  
  <tbody>
    <tr>
        <td style='display: none;'> <label for='transfer_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='".$id."'  name='transfer_id' required></td>
       
    </tr>
      <tr>
        <td style='display: none;'> <label for='temp_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='".$temp."'  name='temp_id' required></td>
       
    </tr>
    <tr>
 
            <td>
            </td>
            <td>
              
              <button type='submit' class='btn btn-warning' style='float: right;' >Transfer</button>
              
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
        url: 'transfer_check.php',
        method: 'POST',
        data:$('#archiveForm').serialize(),

        success:function(data){
            $('#updateModal4').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},1000);
        }
    });
});
</script>