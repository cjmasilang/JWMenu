<?php
include_once "connection.php";

          $stmt2= $user->review_order_queue_billing();
           while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        extract($row2);
          
             echo '   <div class="column">
                    <article class="card" style="font-family: Arial;>
                      <div>
                        <h2><a style="text-decoration:none; color: black;"  class="main-link" >OJW#'.$transaction_number.'</a></h2>
                        <h3>'.$table_number.'</h3>
                       <hr>
                       ';
                       $user->transaction_number = $transaction_number;
                   $stmt3= $user->review_order_queue_items_billing();
                     while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                  extract($row3);

                  echo '  
                   <center><div class="form-row"> ';
                    echo'
                       <div class="col-md-8">'.$food_name.'</div>
                    <div class="col-md-4">x '.$quantity.'</div>';

                   echo'
                  
                    
                  </div></center>
                  <br>
                  ';

                }
              echo'

                <hr>
                       ';
                       $user->transaction_number = $transaction_number;
                   $stmt4= $user->review_order_queue_items_add_on_billing();
                     while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
                  extract($row4);

                  echo '  
                   <center><div class="form-row"> 
                       <div class="col-md-8">'.$add_on_name.'</div>
                    <div class="col-md-4">x '.$quantity.'</div>';

                   echo'
                    
                  </div></center>


                  ';

                }


                    echo'
                     <hr>
                      <a class="btn btn-warning finish_object button_size" table_id = "'.$table_id.'" finish_id="'.$transaction_number.'"> Finish Order </a>
                    </article>

              </div>
              '; 
                
            }
?>