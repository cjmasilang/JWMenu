<?php

  include '../../config/database.php';
   include '../../classes/user.php';


$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->finish_id = $_POST['note_id'];
   $id= $_POST['note_id'];    
echo "<form method='POST' id='archiveForm'>
       <table class='table table-borderless'>
  
  <tbody>
    <tr>
        <td style='display: none;'> <label for='finish_id'>ID</label></td>
        <td style='display: none;'><input type='text' class='form-control' value='".$id."'  name='finish_id' required></td>
       
    </tr>
";
                       $user->transaction_number = $id;
                   $stmt4= $user->view_note_count();
                     while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
                  extract($row4);

                  echo"<h5>".$content.".<br></h5>";

                }

echo"

    <tr>
 
            <td>
            </td>
            <td>

              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </td>
          </tr>
   
  
  </tbody>
</table>
      </form>";

   
}
?>
