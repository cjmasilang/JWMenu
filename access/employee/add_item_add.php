 <?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){

	 $user->order_id = $_POST['add_id'];
   $stmt = $user->select_tran_id();
   $id= $_POST['add_id'];
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   extract($row);
  

echo "<form method='POST' id='viewForm'>
     <center>
     <br>";


echo"
<div class='form-row' style='display:none;'>
  <div class='col-md-2'></div>
  <div class='col-md-8'>              
  <input type='text' class='form-control' value='".$table_id."'  name='table_id' required>

  </div>
  <div class='col-md-2'></div>
</div>

<div class='form-row'>
  <div class='col-md-2'></div>
  <div class='col-md-8'>";
  echo'              
           <Select class="form-control" name="add_on_id" required>
                  <option value="" disabled selected>Select Add-on...</option> 
                  ';
                  $user->order_id = $_POST['add_id'];
                   $stmt= $user->add_on_selector();
                   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    
                     echo '<option value="'.$add_on_id.'" >'.$add_on_name.' - <span>&#8369;</span>'.$add_on_price.'</option>';
                 }
                
              echo "
                </Select>
  </div>
  <div class='col-md-2'></div>
</div>
<br>
<div class='form-row'>
  <div class='col-md-3'></div>
  <div class='col-md-6'>
              <div class='input-group'>
                                    <span class='input-group-btn'>
                                        <button type='button' class='btn btn-danger btn-number  quantity-left-minus'  data-type='minus' data-field='' >
                                          <i class='fas fa-minus'></i>
                                        </button>
                                    </span>
                                    <input style='text-align:center;'' type='text' id='quantity' name='quantity' class='form-control input-number' value='1' min='1' max='100'>
                                    <span class='input-group-btn'>
                                        <button type='button' class='btn btn-dark btn-number quantity-right-plus' data-type='plus' data-field=''>
                                            <i class='fas fa-plus'></i>
                                        </button>
                                    </span>
                                </div>
  </div>
  <div class='col-md-3'></div>
</div>
<hr>
<br>
<div class='form-row'>
  <div class='col-md-2'></div>
  <div class='col-md-8'>              
  <button type='submit' class='btn btn-warning btn-block' style='float: right;' ><i class='fas fa-plus'></i> Add</button>  
  </div>
  <div class='col-md-2'></div>
</div>
<br>
<br>
     </center>
      </form>";

   
}
?>
<script type="text/javascript">
  


  $(document).ready(function(){

var quantity=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});  

  $('#viewForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'add_check_add.php',
        method: 'POST',
        data:$('#viewForm').serialize(),

        success:function(data){
            $('#updateModal6').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},1000);
        }
    });
});
</script>

