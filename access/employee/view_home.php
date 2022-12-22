<?php
include_once "connection.php";


          $stmt2= $user->view_table();
           while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        extract($row2);
            $id = $table_id;
             echo '   <div class="column">';

              if($table_status == 'Occupied' AND $table_number !='Temporary'){

                      echo'<article class="card">
                      <div>
                        <h2><p style="text-decoration:none; color: black; font-family: Arial;"    >'.$table_number.'</p></h2>
                        <p style="color:red;">
                          This table is occupied. 
                        </p>
                      <img src="../../images/table2.png" alt="table" style="width:100%; max-height:200px;">
                      <br>
                      <br>';
                     


                        echo'<div class="form-row">
                        <div class="col-md-6">  
                        <a style="color: black;" class="btn btn-block btn-outline-warning view_object" view_id="'.$table_id.'"><i class="fas fa-list"></i> Order</a>


                        </div>
                        <div class="col-md-6">
                        <a style="color: black;" class="btn btn-block btn-outline-warning bill_object" bill_id="'.$table_id.'"><i class="fas fa-receipt"></i> Bill</a>
                        </div>
                        </div>
                        <br>

                        <div class="form-row">
                        <div class="col-md-2">  
                        </div>
                        <div class="col-md-8">
                        <a style="color: black;" class="btn btn-block btn-outline-warning" href="../../access/employee/rate?table='.$table_id.'"><i class="fas fa-star"></i> Rate</a>
                        </div>
                        <div class="col-md-2">
                        </div>
                        </div>



                      </div>
                    </article>';

              }
                  else if ($table_status =='Occupied' AND $table_number == 'Temporary') {
                         echo'<article class="card">
                      <div>
                        <h2><a style="text-decoration:none; color: black; font-family: Arial;" >Temporary</a></h2>
                        <p style="color:red; padding-top:8px;" >
                          This table is unavailable. 
                        </p>
                          <img src="../../images/table_un.png" alt="table" style="width:100%; max-height:200px;">
                          <br>
                          <br>
                         <div class="form-row">
                        <div class="col-md-6">  
                        <a style="color: black;" class="btn btn-block btn-outline-warning view_object" view_id="'.$table_id.'"><i class="fas fa-list"></i> Order</a>


                        </div>
                        <div class="col-md-6">
                        <a style="color: black;" class="btn btn-block btn-outline-warning" href="../../access/employee/transfer_table?table='.$table_id.'">Transfer</a>
                        </div>
                        </div>

                      </div>
                    </article>';
                
              }

                       else if ($table_status =='Unoccupied' AND $table_number == 'Temporary') {
                         echo'<article class="card">
                      <div>
                        <h2><a style="text-decoration:none; color: black; font-family: Arial;" >Temporary</a></h2>
                        <p style="color:green; padding-top:8px;" >
                          This table is available. 
                        </p>
                          <img src="../../images/table.png" alt="table" style="width:100%; max-height:200px;">
                          <br>
                          <br>
                         <a style="color: black;" class="btn btn-block btn-outline-warning" href="../../access/employee/menu_view?table='.$table_id.'"><i class="fas fa-plus"></i> Order</a>

                      </div>
                    </article>';
                
              }
              else{

                      echo'<article class="card">
                      <div>
                        <h2><a style="text-decoration:none; color: black; font-family: Arial;" >'.$table_number.'</a></h2>
                        <p style="color:green; padding-top:8px;" >
                          This table is available. 
                        </p>
                          <img src="../../images/table-green.png" alt="table" style="width:100%; max-height:180px;">
                          <br>
                          <br>
                         <a style="color: black;" class="btn btn-block btn-outline-warning" href="../../access/employee/menu_view?table='.$table_id.'"><i class="fas fa-plus"></i> Order</a>

                      </div>
                    </article>';
              }


              echo'</div>

              '; 
                
            }
          ?>
