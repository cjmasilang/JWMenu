<style type="text/css">
  #viewForm {
    padding-right: 10px;
    padding-left: 10px;

  }
</style>
<?php

  include '../../config/database.php';
   include '../../classes/user.php';

$database= new Database();
$db = $database->getConnection();

$user = new user($db);

if($_POST){
	 $user->order_id = $_POST['edit_id'];
   $stmt = $user->view_menu_all_food_item_edit();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   extract($row);
   $id= $_POST['edit_id'];
   $price = $quantity * $food_price;
echo "<form method='POST' id='viewForm'>
     <center>
     <br>
     <div class='form-row'>
  <div class='col-md-2'><input style='display:none;' type='text' class='form-control'  name='order_id' value='".$id."' required></div>
  <div class='col-md-8'><img  style ='width:230px;height:220px; 'src='../../uploads/".$pic_1."'></div>
  <div class='col-md-2'></div>
</div>
<hr>
<div class='form-row'>
  <div class='col-md-2'></div>
  <div class='col-md-8'><p><i><b>".$food_name."</b></i></p></div>
  <div class='col-md-2'></div>
</div>
<div class='form-row'>
  <div class='col-md-2'></div>
  <div class='col-md-8'><p><b><span>&#8369;</span> ".$price."<b/></p></div>
  <div class='col-md-2'></div>
</div>
<div class='form-row'>
  <div class='col-md-2'></div>
  <div class='col-md-8'><p>".$food_description."</p></div>
  <div class='col-md-2'></div>
</div>
<div class='form-row' style='display:none;'>
  <div class='col-md-2'></div>
  <div class='col-md-8'><p>".$table_id."</p></div>
  <div class='col-md-2'></div>
</div>
<div class='form-row'>
  <div class='col-md-3'></div>
  <div class='col-md-6'>
              <div class='input-group'>
                                    <span class='input-group-btn'>
                                        <button type='button' class='btn btn-danger btn-number  quantity-left-minus'  data-type='minus' data-field='' >
                                          <i class='fas fa-minus'></i>
                                        </button>
                                    </span>
                                    <input style='text-align:center;'' type='text' id='quantity' name='quantity' class='form-control input-number' value='".$quantity."' min='1' max='100'>
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
  <button type='submit' class='btn btn-warning btn-block' style='float: right;' ><i class='fas fa-view'></i> Edit order</button>  
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
  
  $('#viewForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url: 'edit_check.php',
        method: 'POST',
        data:$('#viewForm').serialize(),

        success:function(data){
            $('#updateModal5').modal('hide');
             $('#data_view').html(data);
             setTimeout(function() { window.location=window.location;},2000);
        }
    });
});

  $(document).ready(function(){

var quantitiy=0;
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
</script>

