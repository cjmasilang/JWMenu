   
 <?php        
  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher2 = new Pusher\Pusher(
    '1c6335e562830e626580',
    '08cf9994518b76bf4691',
    '1265699',
    $options
  );

    $user->transaction_total_price = $_POST["transaction_total_price"];   
    $user->tale_id = $_POST["tab_id"];
    $transaction_numb = substr(sha1(mt_rand()),17,11); 
    $user->transaction_number = $transaction_numb;
    $transac = $transaction_numb;
    $table_id = $_POST["tab_id"];
    $user->order_note = $_POST["order_note"];
    $transaction_total_price = $_POST["transaction_total_price"]; 

    if($user->update_table_cus() && $user->add_transaction_cus() && $user->update_transaction_order_cus() && $user->update_transaction_order_add_on_cus() && $user->add_note()){
             echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been confirmed. Your order is now being prepared.";
            echo "</div>
            <meta http-equiv='refresh' content='2;url=../session/logout.php' />
            " ;  
      

  $data2['message'] = $transac. '' .$table_id .''.$transaction_total_price;
  $pusher2->trigger('my-channel2', 'my-event2', $data2);
    }
    else{
              echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Unable to confirm order.";
            echo "</div>" ;  
    }
    ?>