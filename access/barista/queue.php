<?php
include_once "connection.php";

          $stmt2= $user->view_order_queue();
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
                   $stmt3= $user->view_order_queue_items_barista();
                     while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                  extract($row3);

                  echo '  
                   <center><div class="form-row"> ';
                   if($trans_order == 0){
                    echo'
                       <div class="col-md-6">'.$food_name.'</div>
                    <div class="col-md-3">x '.$quantity.'</div>
                    <div class="col-md-3"><button type="button" class="btn btn-danger btn-sm remove_button" remove_id="'.$order_id.'"><i class="fas fa-times"></i></button></div>';
                   }

                   else{
                    echo'
                       <div class="col-md-6"><span class="badge badge-danger">New</span>'.$food_name.'</div>
                    <div class="col-md-3">x '.$quantity.'</div>
                    <div class="col-md-3"><button type="button" class="btn btn-danger btn-sm remove_button" remove_id="'.$order_id.'"><i class="fas fa-times"></i></button></div>';

                   }
                   echo'
                  
                    
                  </div></center>
 <hr>
                  ';

                }
                  $user->transaction_number = $transaction_number;
                   $stmt5= $user->view_note_count();
                     $row5 = $stmt5->fetch(PDO::FETCH_ASSOC); 
                     if($row5 > 0){
                     echo'
                    
                      <a class="btn btn-outline-danger note_object" note_id="'.$transaction_number.'"> Note </a>';
                     }
                     else{

                     } 



                    echo'
                     <hr>
                      <a class="btn btn-warning finish_object button_size" finish_id="'.$transaction_number.'"> Done </a>
                    </article>

              </div>
              '; 
                
            }
            echo "";


          ?>
