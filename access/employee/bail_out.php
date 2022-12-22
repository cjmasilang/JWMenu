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
  $pusher3 = new Pusher\Pusher(
    '1c6335e562830e626580',
    '08cf9994518b76bf4691',
    '1265699',
    $options
  );
     $user->finish_id= $_POST['finish_id'];
     $finish_id= $_POST['finish_id'];
     $user->transaction_total_price= $_POST['transaction_total_price'];

      if($user->finish_order_pay() && $user->finish_order_item_pay() && $user->finish_order_item_add_on_pay()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been finished and ready to be served.";
            echo "</div>" ; 
 $data3['message'] = $finish_id;
  $pusher3->trigger('my-channel3', 'my-event3', $data3); 
}
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to finish order.";
            echo "</div>" ;
   }


  

}
?>
