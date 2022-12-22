<?php 
class user{
 public $username;
 public $password;
 public $firstname;
 public $lastname;
 public $usertype;
 public $status;
 public $transaction_number;
 public $ID_number;
 
 function __construct($db){
  $this->conn = $db;
 }

  function user_data(){
    $query = "SELECT * FROM user_accounts WHERE username = ?";
    $stmt = $this->conn->prepare($query);


    $stmt->bindparam(1,$this->username);
    
    $stmt->execute();

    return $stmt;
 }
 function ip_check(){
  $query = "SELECT * FROM ip_checker WHERE ip_number = ?";
  $stmt = $this->conn->prepare($query);
  $stmt->bindparam(1, $this->ip);
  $stmt->execute();

  return $stmt;
 }

  function ip_check_dup(){
  $query = "SELECT * FROM ip_checker WHERE ip_number = ?";
  $stmt = $this->conn->prepare($query);
  $stmt->bindparam(1, $this->ip);
  $stmt->execute();

  return $stmt;
 }
  function view_menu_all(){
    $query = "SELECT * FROM food_category WHERE category_status = 1 ORDER BY category_name";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }

  function view_menu_all_category_select(){
    $query = "SELECT * FROM menu WHERE food_category_id = ? AND food_status=1";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->category_id);
    $stmt->execute();

    return $stmt;
 }

   function check_table_availability(){
    $query = "SELECT * FROM res_table WHERE table_id = ? AND table_status='Unoccupied'";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->t_avail);
    $stmt->execute();

    return $stmt;
 }


   function view_menu_all_category_select_take_out($search_term){
    $query = "SELECT * FROM menu WHERE food_status=1 AND food_name LIKE ?  ORDER BY food_name";
    $stmt = $this->conn->prepare($query);
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->execute();

    return $stmt;
 }

    function view_menu_all_category_select_take_out_view($search_term){
    $query = "SELECT * FROM menu WHERE  food_status=1 AND food_name LIKE ? AND food_category_id = ?  ORDER BY food_name";
    $stmt = $this->conn->prepare($query);
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindparam(2, $this->category_id);
    $stmt->execute();

    return $stmt;
 }
  public function badge_count(){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows2
             FROM transaction_order WHERE food_id = ? AND table_id = ? AND order_status = 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->food_id);
    $stmt->bindparam(2, $this->table_id);
 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows2'];
}

  public function badge_count_2(){

    // select query
    $query = "SELECT
                 SUM(quantity) as total_rows3
             FROM transaction_order WHERE food_id = ? AND table_id = ? AND order_status = 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->food_id);
    $stmt->bindparam(2, $this->table_id);
 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows3'];
}

  public function search_count($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM menu WHERE food_status=1 AND food_name LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";

    $stmt->bindParam(1, $search_term);

 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

  public function search_count_view($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM menu WHERE food_status=1 AND food_name LIKE ? AND food_category_id = ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";

    $stmt->bindParam(1, $search_term);
    $stmt->bindparam(2, $this->category_id);
 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}
  function review_order_queue(){
    $query = "SELECT * FROM transaction inner join res_table on res_table.table_id = transaction.transaction_table_id WHERE transaction_status='serving' OR transaction_status = 'preparing' ORDER BY time_started DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }

   function review_order_queue_billing(){
    $query = "SELECT * FROM transaction inner join res_table on res_table.table_id = transaction.transaction_table_id WHERE transaction_status='payment' ORDER BY time_started DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }

  function rate_view_order_queue(){
    $query = "SELECT DISTINCT menu.food_id, menu.food_name, transaction_number, pic_1 FROM transaction_order inner join menu on menu.food_id = transaction_order.food_id inner join transaction on transaction.transaction_number = transaction_order.transaction_id inner join res_table on res_table.table_id = transaction_order.table_id WHERE transaction_order.order_status = 3 AND res_table.table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1, $this->table_id);
    $stmt->execute();

    return $stmt;
 }

  function view_order_queue(){
    $query = "SELECT DISTINCT table_number, transaction_number FROM transaction inner join transaction_order on transaction_order.transaction_id = transaction.transaction_number inner join res_table on res_table.table_id = transaction.transaction_table_id WHERE  order_status = 2 ORDER BY time_started DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }

   function view_order_queue_kitchen(){
    $query = "SELECT DISTINCT table_number, transaction_number FROM transaction inner join transaction_order on transaction_order.transaction_id = transaction.transaction_number inner join res_table on res_table.table_id = transaction.transaction_table_id WHERE transaction_status='preparing' AND order_status = 2 ORDER BY time_started DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }
  function view_order_queue_items_add_on(){
    $query = "SELECT add_on_name, quantity,trans_order FROM add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id WHERE add_on_order.transaction_id= ? AND order_status = '2'  ORDER BY add_on_name DESC";
    $stmt4 = $this->conn->prepare($query);
     $stmt4->bindparam(1, $this->transaction_number);
    $stmt4->execute();

    return $stmt4;
 }

   function view_note_count(){
    $query = "SELECT * FROM order_note WHERE transaction_number= ?";
    $stmt4 = $this->conn->prepare($query);
     $stmt4->bindparam(1, $this->transaction_number);
    $stmt4->execute();

    return $stmt4;
 }

   function review_order_queue_items_add_on(){
    $query = "SELECT add_on_name, quantity FROM add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id WHERE add_on_order.transaction_id= ? AND order_status = '3'  ORDER BY add_on_name DESC";
    $stmt4 = $this->conn->prepare($query);
     $stmt4->bindparam(1, $this->transaction_number);
    $stmt4->execute();

    return $stmt4;
 }

    function review_order_queue_items_add_on_billing(){
    $query = "SELECT add_on_name, quantity FROM add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id WHERE add_on_order.transaction_id= ? AND order_status = '4'  ORDER BY add_on_name DESC";
    $stmt4 = $this->conn->prepare($query);
     $stmt4->bindparam(1, $this->transaction_number);
    $stmt4->execute();

    return $stmt4;
 }

  function review_order_queue_items(){
    $query = "SELECT food_name, quantity,trans_order FROM transaction_order inner join menu on menu.food_id = transaction_order.food_id WHERE transaction_id= ? AND order_status = '3'  ORDER BY food_name DESC";
    $stmt3 = $this->conn->prepare($query);
     $stmt3->bindparam(1, $this->transaction_number);
    $stmt3->execute();

    return $stmt3;
 }

   function review_order_queue_items_billing(){
    $query = "SELECT food_name, quantity,trans_order FROM transaction_order inner join menu on menu.food_id = transaction_order.food_id WHERE transaction_id= ? AND order_status = '4'  ORDER BY food_name DESC";
    $stmt3 = $this->conn->prepare($query);
     $stmt3->bindparam(1, $this->transaction_number);
    $stmt3->execute();

    return $stmt3;
 }

  function view_order_queue_items(){
    $query = "SELECT food_name, quantity,trans_order,food_category_id,order_id FROM transaction_order  inner join menu on menu.food_id = transaction_order.food_id inner join food_category on food_category.category_id = menu.food_category_id  WHERE transaction_id= ? AND order_status = 2 AND category_type = 'kitchen'   ORDER BY food_name DESC";
    $stmt3 = $this->conn->prepare($query);
     $stmt3->bindparam(1, $this->transaction_number);
    $stmt3->execute();
    return $stmt3;
 }


   function view_order_queue_items_barista(){
    $query = "SELECT food_name, quantity,trans_order,food_category_id,order_id FROM transaction_order  inner join menu on menu.food_id = transaction_order.food_id inner join food_category on food_category.category_id = menu.food_category_id WHERE transaction_id= ? AND order_status = 2 AND category_type = 'barista'   ORDER BY food_name DESC";
    $stmt3 = $this->conn->prepare($query);
     $stmt3->bindparam(1, $this->transaction_number);
    $stmt3->execute();

    return $stmt3;
 }

  function view_menu_all_category(){
    $query = "SELECT pic_1 FROM menu WHERE food_category_id = ? AND food_status=1";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->category_id);
    $stmt->execute();

    return $stmt;
 }
   function view_menu_all_category_pic(){
    $query = "SELECT pic_1 FROM menu WHERE food_id = ? AND food_status=1";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->food_id);
    $stmt->execute();

    return $stmt;
 }

    function Unoccupied_tables(){
    $query = "SELECT * FROM res_table WHERE table_status= 'Unoccupied' AND status = 1  AND table_number != 'Take-out'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }

     function Unoccupied_tables_qr(){
    $query = "SELECT * FROM res_table WHERE table_status= 'Unoccupied' AND status = 1  AND (table_number != 'Take-out' OR table_number != 'Temporary') ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
 }
    function view_menu_all_food_item(){
    $query = "SELECT * FROM menu WHERE food_id = ? AND food_status=1";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->food_id);
    $stmt->execute();

    return $stmt;
 }

     function view_menu_all_food_item_edit(){
    $query = "SELECT * FROM menu inner join transaction_order on transaction_order.food_id = menu.food_id WHERE order_id = ?";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->order_id);
    $stmt->execute();

    return $stmt;
 }

      function view_menu_all_food_item_edit_add_on(){
    $query = "SELECT * FROM add_on inner join add_on_order on add_on_order.add_on_id = add_on.add_on_id WHERE add_order_id = ?";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->add_order_id);
    $stmt->execute();

    return $stmt;
 }


     function add_on_selector(){
    $query = "SELECT * FROM add_on inner join add_on_menu on add_on.add_on_id = add_on_menu.add_on_id inner join menu on menu.food_id = add_on_menu.food_id inner join transaction_order on transaction_order.food_id = menu.food_id    WHERE order_id = ?";
    $stmt = $this->conn->prepare($query);
     $stmt->bindparam(1, $this->order_id);
    $stmt->execute();

    return $stmt;
 }
 function count_row_menu(){
 
    // select query
      $query = "SELECT  COUNT(*) as total_rows FROM menu      
            WHERE food_category_id = ? AND food_status=1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
    $stmt->bindparam(1, $this->category_id);
 
     $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

             function add_to_cart_add_on(){
        $query = "INSERT into  add_on_order
      SET  add_on_id=?, quantity=? , table_id = ?,order_status = 1, transaction_id = 0, trans_order = 0";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->add_on_id);
        $stmt->bindparam(2, $this->quantity);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

                 function add_to_cart_add_on_new(){
        $query = "INSERT into  add_on_order
      SET  add_on_id=?, quantity=? , table_id = ?,order_status = 1, transaction_id = 0, trans_order = 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->add_on_id);
        $stmt->bindparam(2, $this->quantity);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

                 function update_ip(){
        $query = "INSERT into  ip_checker
      SET  ip_number=?,ip_status = 'blocked'";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->ip_number);

          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

                     function add_ip(){
        $query = "INSERT into  ip_checker
      SET  ip_number=?,ip_status = 'allowed'";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->ip);

          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

             function add_to_cart_add(){
        $query = "INSERT into  transaction_order
      SET  food_id=?, quantity=? , table_id = ?, transaction_id = ?,order_status = 1,trans_order = 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->food_id);
        $stmt->bindparam(2, $this->quantity);
        $stmt->bindparam(3, $this->table_id);
        $stmt->bindparam(4, $this->transaction_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

               function add_to_cart(){
        $query = "INSERT into  transaction_order
      SET  food_id=?, quantity=? , table_id = ?,order_status = 1, transaction_id = 0, trans_order = 0";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->food_id);
        $stmt->bindparam(2, $this->quantity);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
           
    }


        function add_add_on(){
        $query = "INSERT into  add_on
      SET  add_on_name=? , add_on_price = ?,add_on_status = 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->add_on_name);
        $stmt->bindparam(2, $this->add_on_price);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
           
    }


        function add_add_menu(){
        $query = "INSERT into  add_on_menu
      SET  food_id=?, add_on_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->food_id);
        $stmt->bindparam(2, $this->add_on_id);

          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
           
    }



        function add_add_menu_on(){
        $query = "INSERT into  add_on
      SET  add_on_name=?, add_on_price = ?, add_on_type = ?, add_on_status = 1 ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->add_on_name);
        $stmt->bindparam(2, $this->add_on_price);
        $stmt->bindparam(3, $this->add_on_type);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
           
    }

                   function add_to_cart_take(){
        $query = "INSERT into  transaction_order
      SET  food_id=?, quantity=? , table_id = ?,order_status = 1, transaction_id = 0";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->food_id);
        $stmt->bindparam(2, $this->quantity);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
           
    }

               function add_transaction(){
        $query = "INSERT into  transaction
      SET   transaction_status = 'preparing' ,payment_status = 'Unpaid',transaction_number=?, transaction_total_price = ?, transaction_table_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->transaction_total_price);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

                   function add_transaction_cus(){
        $query = "INSERT into  transaction
      SET   transaction_status = 'preparing' ,payment_status = 'Unpaid',transaction_number=?, transaction_total_price = ?, transaction_table_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->transaction_total_price);
        $stmt->bindparam(3, $this->tale_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
}
                               function add_note(){
        $query = "INSERT into  order_note
      SET   transaction_number = ?, content = ?, cont_status = 1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->order_note);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }
    function update_transaction_order(){
        $query = "UPDATE  transaction_order
      SET  order_status=2 , transaction_id = ? WHERE table_id = ? AND order_status = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

        function update_transaction_order_cus(){
        $query = "UPDATE  transaction_order
      SET  order_status=2 , transaction_id = ?, table_id = ? WHERE table_id = ? AND order_status = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->tale_id);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

        function update_transaction_order_add_on(){
        $query = "UPDATE  add_on_order
      SET  order_status=2 , transaction_id = ? WHERE table_id = ? AND order_status = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

            function update_transaction_order_add_on_cus(){
        $query = "UPDATE  add_on_order
      SET  order_status=2 , transaction_id = ?,table_id = ? WHERE table_id = ? AND order_status = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->transaction_number);
        $stmt->bindparam(2, $this->tale_id);
        $stmt->bindparam(3, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

      function update_transaction_order_add(){
        $query = "UPDATE  transaction_order
      SET  order_status=2  WHERE transaction_id = ? AND order_status = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->transac_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

        function update_transaction_add(){
        $query = "UPDATE  transaction
      SET  transaction_status= 'preparing'  WHERE transaction_number = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->transac_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

        function update_transaction_order_add_on_add(){
        $query = "UPDATE  add_on_order
      SET  order_status=2 , transaction_id = ? WHERE table_id = ? AND order_status = 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->tran_id);
        $stmt->bindparam(2, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }


    function edit_my_cart(){
        $query = "UPDATE  transaction_order
      SET  quantity=? WHERE order_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->quantity);
        $stmt->bindparam(2, $this->order_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }

    function edit_my_cart_add_on(){
        $query = "UPDATE  add_on_order
      SET  quantity=? WHERE add_order_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->quantity);
        $stmt->bindparam(2, $this->add_order_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }       
    }


    function update_table(){
        $query = "UPDATE  res_table
      SET  table_status='Occupied' WHERE table_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->table_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }      
    }

        function update_table_cus(){
        $query = "UPDATE  res_table
      SET  table_status='Occupied' WHERE table_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->tale_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }      
    }
    public function total_price_add_on(){
 
    // select query
      $query = "SELECT  SUM(add_on_order.quantity * add_on.add_on_price) as total_rows       
            FROM add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id WHERE table_id = ? AND order_status = 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
   
  
     $stmt->bindParam(1, $this->table_id);
     $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

    public function total_price_add_on_bill(){
 
    // select query
      $query = "SELECT  SUM(add_on_order.quantity * add_on.add_on_price) as total_rows       
            FROM add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id WHERE transaction_id = ? AND order_status = 3";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
   
  
     $stmt->bindParam(1, $this->transaction_id);
     $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

    public function total_price(){
 
    // select query
      $query = "SELECT  SUM(transaction_order.quantity * menu.food_price) as total_rows       
            FROM transaction_order inner join menu on menu.food_id = transaction_order.food_id WHERE table_id = ? AND order_status = 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
   
  
     $stmt->bindParam(1, $this->table_id);
     $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}


    public function total_price_bill(){
 
    // select query
      $query = "SELECT  SUM(transaction_order.quantity * menu.food_price) as total_rows       
            FROM transaction_order inner join menu on menu.food_id = transaction_order.food_id WHERE transaction_id = ? AND order_status = 3";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
   
  
     $stmt->bindParam(1, $this->transaction_id);
     $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}
    public function total_price_add(){
 
    // select query
      $query = "SELECT  SUM(transaction_order.quantity * menu.food_price) as total_rows       
            FROM transaction_order inner join menu on menu.food_id = transaction_order.food_id WHERE table_id = ? AND order_status = 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
   
  
     $stmt->bindParam(1, $this->table_id);
     $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

       function delete_my_cart(){
        $query = "DELETE FROM transaction_order
      WHERE  order_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->order_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }

       function delete_my_cart_add_on(){
        $query = "DELETE FROM add_on_order
      WHERE  add_order_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->add_order_id);
          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }


               function create_account(){
        $query = "INSERT into  user_accounts
      SET  firstname=?, lastname=? , username = ? , password = ? ,account_status = 1, usertype = ? ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->firstname);
        $stmt->bindparam(2, $this->lastname);
        $stmt->bindparam(3, $this->username);
        $stmt->bindparam(4, $this->password);
        $stmt->bindparam(5, $this->usertype);
       


          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }
        function view_table() {
        $query = "SELECT * FROM res_table WHERE status = 1 AND table_number != 'Take-out'";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->execute();
        return $stmt2;
    }

            function view_table_transfer() {
        $query = "SELECT * FROM res_table WHERE status = 1 AND table_number != 'Take-out' AND table_number != 'Temporary'";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->execute();
        return $stmt2;
    }

           function take_out_checker() {
        $query = "SELECT * FROM res_table WHERE status = 1 AND table_id = ?";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(1, $this->table_id);
        $stmt2->execute();
        return $stmt2;
    }
function increment(){
 
    // query to read all user records, with limit clause for pagination
    $query = "SELECT increment_number         
            FROM increment_counter ORDER BY date_add DESC LIMIT 1 
            ";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
    // execute query
    $stmt->execute();
 
    // return values
    return $stmt;

}


                  function inc(){
        $query = "INSERT into  increment_counter
      SET  increment_number=?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1, $this->increment_number);
       


          if($result = $stmt->execute()){
            return true;
                }

                else{
         return false;
            }
      
    
            
    }
             function transfer_checker() {
        $query = "SELECT * FROM res_table WHERE status = 1 AND table_number = ?";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(1, $this->table_number);
        $stmt2->execute();
        return $stmt2;
    }

                 function inc_checker() {
        $query = "SELECT * FROM increment_counter WHERE  increment_number = ?";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(1, $this->increment_number);
        $stmt2->execute();
        return $stmt2;
    }

       function view_table_order() {
        $query = "SELECT transaction_number, table_id , table_status FROM transaction inner join res_table on transaction.transaction_table_id = res_table.table_id WHERE res_table.table_id = ? AND table_status = 'Occupied'";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(1, $this->table_number);
        $stmt2->execute();
        return $stmt2;
    }

       function view_table_order_check() {
        $query = "SELECT transaction_number, table_id , table_status FROM transaction inner join res_table on transaction.transaction_table_id = res_table.table_id WHERE res_table.table_id = ? AND table_status = 'Occupied' AND (transaction_status = 'preparing' OR transaction_status = 'serving')";
        $stmt2 = $this->conn->prepare($query);
        $stmt2->bindParam(1, $this->table_number);
        $stmt2->execute();
        return $stmt2;
    }
        function select_table() {
        $query = "SELECT * FROM res_table  WHERE  table_id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->table_id);
        $stmt->execute();
        return $stmt;
    }


            function select_table_bail_out() {
        $query = "SELECT * FROM transaction_order  WHERE  transaction_id = ? AND  order_status = 2 ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->transaction_number);
        $stmt->execute();
        return $stmt;
    }





          function select_table_add() {
        $query = "SELECT table_id FROM transaction_order WHERE  transaction_id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->transac_id);
        $stmt->execute();
        return $stmt;
    }

           function select_transac() {
        $query = "SELECT * FROM transaction  WHERE  transaction_number = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->table_id);
        $stmt->execute();
        return $stmt;
    }
             function select_transac_add() {
        $query = "SELECT * FROM transaction_order  WHERE  transaction_id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->transaction_id);
        $stmt->execute();
        return $stmt;
    }

  public function all_category_view_archive($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               food_category
               
            WHERE
                category_name LIKE ? AND category_status = 0 
            ORDER BY
                category_name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
} 
 public function my_view2($from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id
               
            WHERE
               order_status = 1 AND table_id = ? 
            ORDER BY
                add_on_name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->table_id);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}
 public function my_view($from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               transaction_order inner join menu on menu.food_id = transaction_order.food_id
               
            WHERE
               order_status = 1 AND table_id = ? 
            ORDER BY
                food_name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->table_id);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}


 public function my_view_table(){
 
    // select query
    $query = "SELECT
                *
            FROM
               transaction_order inner join menu on menu.food_id = transaction_order.food_id inner join res_table on res_table.table_id = transaction_order.table_id
               
            WHERE
               transaction_id = ? AND res_table.table_id = ? AND table_status = 'Occupied' 
            ORDER BY
                food_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->transaction_number);
    $stmt->bindparam(2, $this->table_id);

 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function my_view_table_check(){
 
    // select query
    $query = "SELECT
                *
            FROM
               transaction_order inner join menu on menu.food_id = transaction_order.food_id 
               
            WHERE
               transaction_id = ?  AND (order_status = 2 OR order_status = 3)
            ORDER BY
                food_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->transaction_number);


 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function my_view_table_add_on(){
 
    // select query
    $query = "SELECT
                *
            FROM
               add_on inner join add_on_order on add_on_order.add_on_id = add_on.add_on_id 
               
            WHERE
               add_on_order.transaction_id = ? AND (order_status = 2 OR order_status = 3)
            ORDER BY
                add_on_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->transaction_number);

 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function my_count(){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
               transaction_order inner join menu on menu.food_id = transaction_order.food_id
               
            WHERE
               order_status = 1 AND table_id = ? 
            ORDER BY
                food_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->table_id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function my_count2(){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
               add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id
               
            WHERE
               order_status = 1 AND table_id = ? 
            ORDER BY
                add_on_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindparam(1, $this->table_id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_category_view($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               food_category
               
            WHERE
                category_name LIKE ? AND category_status = 1 
            ORDER BY
                category_name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_user_view_archive($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               user_accounts
               
            WHERE
                (firstname LIKE ? OR lastname LIKE ? OR usertype LIKE ?) AND account_status = 0 AND user_id != ?
            ORDER BY
                firstname ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $search_term);
    $stmt->bindparam(4, $this->user_id);
    $stmt->bindParam(5, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(6, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_user_view($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               user_accounts
               
            WHERE
                (firstname LIKE ? OR lastname LIKE ? OR usertype LIKE ?) AND account_status = 1 AND user_id != ?
            ORDER BY
                firstname ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $search_term);
    $stmt->bindparam(4, $this->user_id);
    $stmt->bindParam(5, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(6, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_table_view_archive($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               res_table
               
            WHERE
                table_number LIKE ? AND status = 0 
            ORDER BY
                table_number ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_table_view($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               res_table
               
            WHERE
                table_number LIKE ? AND status = 1 
            ORDER BY
                table_number ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_food_list_view_archive($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               menu
               
            WHERE
                food_name LIKE ? AND food_status = 0
            ORDER BY
                food_name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_food_list_view($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                *
            FROM
               menu
               
            WHERE
                food_name LIKE ? AND food_status = 1 AND food_category_id = ? 
            ORDER BY
                food_name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindparam(2,$this->category_id);
    $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

 public function all_food_list_count_archive($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                menu
               
            WHERE
                food_name LIKE ? AND food_status = 0   
            ORDER BY
                food_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_food_list_count($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                menu
               
            WHERE
                food_name LIKE ? AND food_status = 1 AND food_category_id = ?  
            ORDER BY
                food_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindparam(2,$this->category_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function add_list_count(){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                add_on inner join add_on_menu on add_on_menu.add_on_id = add_on.add_on_id 
               
           WHERE 
           add_on_menu.food_id = ? AND add_on.add_on_status = 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
     $stmt->bindparam(1,$this->food_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_user_count_archive($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                user_accounts
               
             WHERE
                (firstname LIKE ? OR lastname LIKE ? OR usertype LIKE ?) AND account_status = 0 AND user_id != ?
            ORDER BY
                firstname ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $search_term);
    $stmt->bindparam(4, $this->user_id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_user_count($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                user_accounts
               
             WHERE
                (firstname LIKE ? OR lastname LIKE ? OR usertype LIKE ?) AND account_status = 1 AND user_id != ?
            ORDER BY
                firstname ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $search_term);
    $stmt->bindparam(4, $this->user_id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_category_count_archive($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                food_category
               
            WHERE
                category_name LIKE ? AND category_status = 0
            ORDER BY
                category_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_category_count($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                food_category
               
            WHERE
                category_name LIKE ? AND category_status = 1
            ORDER BY
                category_name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_table_count_archive($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                res_table
               
            WHERE
                table_number LIKE ? AND status = 0
            ORDER BY
                table_number ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

 public function all_table_count($search_term){

    // select query
    $query = "SELECT
                 COUNT(*) as total_rows
             FROM
                res_table
               
            WHERE
                table_number LIKE ? AND status = 1
            ORDER BY
                table_number ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

   function check_category(){
    $query = "SELECT * FROM food_category WHERE category_name =? ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->category_name);
    $stmt->execute();

    return $stmt;
 }

    function check_table(){
    $query = "SELECT * FROM res_table WHERE table_number =? ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->table_number);
    $stmt->execute();

    return $stmt;
 }




          function add_category(){
        $query = "INSERT INTO food_category
      SET  category_name=?, category_description = ? , category_type = ?, category_status = 1
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->category_name);
        $stmt->bindparam(2, $this->category_description);
        $stmt->bindparam(3, $this->category_type);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
    
            
    }

    function add_table(){
        $query = "INSERT INTO res_table
      SET  table_number=?, table_status = 'Unoccupied', status = 1
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->table_number);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
    
            
    }

    function add_food(){
        $query = "INSERT INTO menu
      SET  food_name=?, food_description = ? ,food_price = ? ,food_category_id = ? ,pic_1 = ? ,pic_2 = ? , food_status = 1
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->food_name);
        $stmt->bindparam(2, $this->food_description);
        $stmt->bindparam(3, $this->food_price);
        $stmt->bindparam(4, $this->food_category_id);
        $stmt->bindparam(5, $this->pic_1);
        $stmt->bindparam(6, $this->pic_2);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
    
            
    }


    function select_category(){
    $query = "SELECT * FROM food_category  WHERE category_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->category_id);
    $stmt->execute();
        return $stmt;
  
}

    function select_table_number(){
    $query = "SELECT * FROM res_table  WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->table_id);
    $stmt->execute();
        return $stmt;
  
}

    function select_food_item(){
    $query = "SELECT * FROM menu  WHERE food_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->food_id);
    $stmt->execute();
        return $stmt;
  
}
    function select_tran_id(){
    $query = "SELECT * FROM transaction_order  WHERE order_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->order_id);
    $stmt->execute();
        return $stmt;
  
}

    function select_add_on(){
    $query = "SELECT * FROM add_on_menu inner join add_on on add_on_menu.add_on_id = add_on.add_on_id  WHERE food_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->food_id);
    $stmt->execute();
        return $stmt;
  
}

    function select_add_on_list(){
    $query = "SELECT * from add_on WHERE add_on_status = 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
        return $stmt;
  
}

    function delete_category(){
        $query = "DELETE FROM food_category WHERE  category_id=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->category_id);
        if($result = $stmt->execute()){
        return true;
        }else{
        return false;
        }
}

    function delete_food_item(){
        $query = "DELETE FROM menu WHERE  food_id=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->food_id);
        if($result = $stmt->execute()){
        return true;
        }else{
        return false;
        }
}

    function delete_user(){
        $query = "DELETE FROM user_accounts WHERE  user_id=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->user_id);
        if($result = $stmt->execute()){
        return true;
        }else{
        return false;
        }
}

    function delete_table(){
        $query = "DELETE FROM res_table WHERE  table_id=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $this->table_id);
        if($result = $stmt->execute()){
        return true;
        }else{
        return false;
        }
}

    function category_delete_check(){
    $query = "SELECT * FROM menu  WHERE food_category_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->category_id);
    $stmt->execute();
        return $stmt;
  
}

    function add_checker_on(){
    $query = "SELECT * FROM add_on  WHERE add_on_name = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->add_on_name);
    $stmt->execute();
        return $stmt;
  
}

    function food_delete_check(){
    $query = "SELECT * FROM menu  WHERE food_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->food_id);
    $stmt->execute();
        return $stmt;
  
}

    function check_category_name(){
    $query = "SELECT * FROM food_category WHERE category_name =?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->category_name);
    $stmt->execute();
    return $stmt;
 }

     function check_table_number(){
    $query = "SELECT * FROM res_table WHERE table_number =?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->table_number);
    $stmt->execute();
    return $stmt;
 }

      function check_add_on(){
    $query = "SELECT * FROM  add_on inner join add_on_menu on add_on_menu.add_on_id = add_on.add_on_id WHERE food_id =? AND add_on.add_on_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->food_id);
    $stmt->bindparam(2,$this->add_on_id);
    $stmt->execute();
    return $stmt;
 }

       function check_add_on_list(){
    $query = "SELECT add_on_name, add_on_price FROM  add_on WHERE add_on_id =?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->add_on_id);
    $stmt->execute();
    return $stmt;
 }

        function pick_transaction_id(){
    $query = "SELECT transaction_number FROM  transaction WHERE transaction_table_id =? AND transaction_status = 'preparing'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1,$this->temp_id);
    $stmt->execute();
    return $stmt;
 }

     function edit_food(){
    $query = "UPDATE menu SET  food_name=?, food_description= ?, food_price= ?
    WHERE food_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1, $this->food_name);
    $stmt->bindparam(2, $this->food_description);
    $stmt->bindparam(3, $this->food_price);
    $stmt->bindparam(4, $this->food_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
      
    }

    function edit_table(){
    $query = "UPDATE res_table SET  table_number=?
    WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1, $this->table_number);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
      
    }
    function edit_category(){
    $query = "UPDATE food_category SET  category_name=?, category_description= ?
    WHERE category_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindparam(1, $this->category_name);
    $stmt->bindparam(2, $this->category_description);
    $stmt->bindparam(3, $this->category_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
      
    }
    function archive_category(){
 
    $query = "UPDATE food_category SET category_status = 0  WHERE category_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->category_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function activate_category(){
 
    $query = "UPDATE food_category SET category_status = 1  WHERE category_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->category_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function activate_user(){
 
    $query = "UPDATE user_accounts SET account_status = 1  WHERE user_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->user_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


    function activate_table(){
 
    $query = "UPDATE res_table SET status = 1  WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->table_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function activate_food(){
 
    $query = "UPDATE menu SET food_status = 1  WHERE food_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->food_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function archive_user(){
 
    $query = "UPDATE user_accounts SET account_status = 0  WHERE user_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->user_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function transfer_table_orders(){
 
    $query = "UPDATE res_table SET table_status = 'Occupied'  WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->transfer_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function update_transfer_table_orders(){
 
    $query = "UPDATE res_table SET table_status = 'Unoccupied'  WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->temp_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function transfer_table_orders_table(){
 
    $query = "UPDATE transaction SET transaction_table_id = ?  WHERE transaction_table_id = ? AND transaction_status = 'preparing' ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->transfer_id);
    $stmt->bindParam(2, $this->temp_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function transfer_table_orders_table_orders(){
 
    $query = "UPDATE transaction_order SET table_id = ?  WHERE transaction_id =? ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->transfer_id);
    $stmt->bindParam(2, $this->transaction_number);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function finish_order(){
 
    $query = "UPDATE transaction SET transaction_status = 'serving'  WHERE transaction_number = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


    function finish_order_pay(){
 
    $query = "UPDATE transaction SET transaction_status = 'payment', transaction_total_price = ? WHERE transaction_number = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->transaction_total_price);
    $stmt->bindParam(2, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


    function finish_transaction_order(){
 
    $query = "UPDATE transaction SET transaction_status = 'finished', payment_status = 'Paid', time_finished = ?  WHERE transaction_number = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_date);
    $stmt->bindParam(2, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function restore_order(){
 
    $query = "UPDATE transaction SET transaction_status = 'preparing'  WHERE transaction_number = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function restore_order_item(){
 
    $query = "UPDATE transaction_order  SET order_status = 2  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function restore_order_item_barista(){
 
    $query = "UPDATE transaction_order inner join menu on menu.food_id = transaction_order.food_id inner join food_category on food_category.category_id = menu.food_category_id SET order_status = 2  WHERE transaction_id = ? AND category_type = 'barista'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function restore_order_item_kitchen(){
 
    $query = "UPDATE transaction_order inner join menu on menu.food_id = transaction_order.food_id inner join food_category on food_category.category_id = menu.food_category_id SET order_status = 2  WHERE transaction_id = ? AND category_type = 'kitchen'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function finish_order_item(){
 
    $query = "UPDATE transaction_order inner join menu on menu.food_id = transaction_order.food_id inner join food_category on food_category.category_id = menu.food_category_id  SET order_status = 3  WHERE transaction_id = ? AND category_type ='kitchen'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function remove_order_item(){
 
    $query = "DELETE FROM transaction_order   WHERE order_id = ? ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->remove_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

   function finish_order_item_barista(){
 
    $query = "UPDATE transaction_order inner join menu on menu.food_id = transaction_order.food_id inner join food_category on food_category.category_id = menu.food_category_id SET order_status = 3  WHERE transaction_id = ? AND order_status = 2 AND category_type ='barista' ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function remove_order_item_barista(){
 
    $query = "DELETE FROM transaction_order   WHERE order_id = ? ";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->order_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function finish_order_item_pay(){
 
    $query = "UPDATE transaction_order SET order_status = 4  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function finish_order_item_transaction(){
 
    $query = "UPDATE transaction_order SET order_status = 5  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function restore_order_item_add_on(){
 
    $query = "UPDATE add_on_order SET order_status = 2  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function restore_order_item_add_on_barista(){
 
    $query = "UPDATE add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id SET order_status = 2  WHERE transaction_id = ? AND add_on_type = 'barista'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function restore_order_item_add_on_kitchen(){
 
    $query = "UPDATE add_on_order inner join add_on on add_on.add_on_id = add_on_order.add_on_id SET order_status = 2  WHERE transaction_id = ? AND add_on_type = 'kitchen'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function finish_order_item_add_on(){
 
    $query = "UPDATE add_on_order SET order_status = 3  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function finish_order_item_add_on_pay(){
 
    $query = "UPDATE add_on_order SET order_status = 4  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function restore_table_seat(){
 
    $query = "UPDATE res_table SET table_status = 'Unoccupied'  WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->table_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function finish_order_item_add_on_transaction(){
 
    $query = "UPDATE add_on_order SET order_status = 5  WHERE transaction_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->finish_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
    function archive_table(){
 
    $query = "UPDATE res_table SET status = 0  WHERE table_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->table_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function archive_food_item(){
 
    $query = "UPDATE menu SET food_status = 0  WHERE food_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->food_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

    function block_ip(){
 
    $query = "UPDATE ip_checker SET ip_status = 'Blocked'  WHERE ip_number = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->table_id);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


    function unblock_ip(){
 
    $query = "INSERT INTO ip_checker SET ip_status = 'allowed', ip_number = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->ip_number);
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}
}