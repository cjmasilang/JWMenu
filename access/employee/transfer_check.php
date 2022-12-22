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


     $user->transfer_id= $_POST['transfer_id'];
     $transf_id= $_POST['transfer_id'];
      $user->temp_id= $_POST['temp_id'];
      $stmt = $user->pick_transaction_id();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $user->transaction_number = $transaction_number;


      if($user->transfer_table_orders_table_orders() && $user->transfer_table_orders_table()  && $user->transfer_table_orders() && $user->update_transfer_table_orders()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Table has been transfered.";
            echo "</div>" ; 

   $data['message'] = $transf_id;
  $pusher->trigger('my-channel', 'my-event', $data);
    }    
    
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to transfer table.";
            echo "</div>" ;
   }


  

}
?>
