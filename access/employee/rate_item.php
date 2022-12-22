
<style type="text/css">
  #viewForm {
    padding-right: 10px;
    padding-left: 10px;
  }
</style>
<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->value = $_POST['value'];
   $user->t_id = $_POST['t_id'];
  
   echo $_POST['t_id'];
   
}
?>
<script type="text/javascript">
  
  $('#viewForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'view_check_add.php',
        method: 'POST',
        data:$('#viewForm').serialize(),

        success:function(data){
            $('#updateModal5').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},1000);
        }
    });
});


</script>

