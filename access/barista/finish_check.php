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
  $pusher5 = new Pusher\Pusher(
    '1c6335e562830e626580',
    '08cf9994518b76bf4691',
    '1265699',
    $options
  );
     $user->finish_id= $_POST['finish_id'];
     $finish_id= $_POST['finish_id'];



      if($user->finish_order_item_barista()){
      echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been finished and ready to be served.";
            echo "</div>" ;  
  $data5['message'] = $finish_id;
  $pusher5->trigger('my-channel5', 'my-event5', $data5);
}
      else{
       echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Failed to finish order.";
            echo "</div>" ;
   }


  

}
?>
