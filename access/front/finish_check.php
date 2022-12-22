<?php

  include '../../config/database.php';
   include '../../classes/user.php';
require __DIR__ . '../../../vendor/autoload.php';

$database= new Database();
$db = $database->getConnection();
$user = new user($db);

if($_POST){
      $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '1c6335e562830e626580',
    '08cf9994518b76bf4691',
    '1265699',
    $options
  );



      $user->table_id= $_POST['table_id'];
     $user->finish_id= $_POST['finish_id'];
     $finish_id= $_POST['finish_id'];
     $user->finish_date = date("Y-m-d h:i:s");


      if($user->finish_transaction_order() && $user->finish_order_item_transaction() && $user->finish_order_item_add_on_transaction() && $user->restore_table_seat()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been finished and ready to be served.";
            echo "</div>" ;    
  $data['message'] = $finish_id;
  $pusher->trigger('my-channel', 'my-event', $data);
    }
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to finish order.";
            echo "</div>" ;
   }


  

}
?>
