<?php
include_once "header.php";
include_once "connection.php";
require __DIR__ . '../../../vendor/autoload.php';
?>
<style>
#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    background-color: white;
    padding: 0;
}
/* Sidebar sizes when expanded and expanded */
.sidebar-expanded {
    width: 150px;
}
.sidebar-collapsed {
    width: 60px;
}

/* Menu item*/
#sidebar-container .list-group a {
    height: 50px;
    color: black;
}

/* Submenu item*/
#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}

/* Separators */
.sidebar-separator-title {
    background-color: white;
    height: 35px;
}
.sidebar-separator {
    background-color: white;
    height: 25px;
}
.logo-separator {
    background-color: white;    
    height: 60px;
}

/* Closed submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
/* Opened submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}

nav.three {
 margin-bottom: 5px;
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
.side {

  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
.card {
 
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}

a.active{
    background-color : #d1d1d1 !important;
    border: none;
}

.main-link::before {
  content: " ";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}


.card {
  font-family: "PT Serif", serif;

  width: 100%;
  height: 200px;
  background: white;
  border-radius: 16px;
  padding: 1rem 1.5rem;
  box-sizing: border-box;
  justify-content: space-between;
  transition: 0.2s;
  margin: 10px;
}





  .column {
  float: left;
  width: 50%;
  padding: 0 10px;
  margin-bottom: 20px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
   
   
  }
}
.card:hover{
  opacity: .5;
}
</style>
<body>
<?php include_once "navigation.php";


?>

<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block side">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->

            <a href="home" class="bg-light list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-utensils fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dine-in</span>
                </div>
            </a>



            <a href="take_out?t=Take-out" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-shopping-bag fa-fw mr-3"></span>
                    <span class="menu-collapsed">Take-out</span>
                </div>
            </a>
            <a href="review_order" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-clipboard-check fa-fw mr-3"></span>
                    <span class="menu-collapsed">Review Order</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
         
            <a  data-toggle="sidebar-colapse" class="bg-light list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col p-4">    
   <?php
 $table_id = isset($_GET['table']) ? $_GET['table'] : die('ERROR: missing ID.');
   $user->table_id =  $table_id;
     $stmt= $user->select_table();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                 if($row > 0){
          extract($row);
                  if($table_number == 'Take-out'){

            echo'<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow. Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div>';
        }

        else{
?>
<div class="form-row">
    <div class="col-md-0"></div>
     <div class="col-md-12">
         
         <nav class="navbar navbar-light bg-light justify-content-between">
  <a style="font-size: 0.9rem;" href="menu_view?table=<?php echo $table_id;?>" class="navbar-brand"><i class="fas fa-arrow-circle-left"></i> Food Category</a>
    <a ></a>

</nav>
     </div>
      <div class="col-md-0"></div>
</div>

<div class="form-row">
    <div class="col-md-0"></div>
     <div class="col-md-12" id="data_view">
      <?php

if (isset($_POST["submit"])) {
    
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
    $user->table_id = $_POST["table_id"];
    $transaction_numb = substr(sha1(mt_rand()),17,11); 
    $user->transaction_number = $transaction_numb;
    $transac = $transaction_numb;
    $table_id = $_POST["table_id"];
    $user->order_note = $_POST["order_note"];
    $transaction_total_price = $_POST["transaction_total_price"]; 

    if($user->update_table() && $user->add_transaction() && $user->update_transaction_order() && $user->update_transaction_order_add_on() && $user->add_note()){
             echo "<div class='alert alert-success alert-dismissable' role='alert'>";
            echo "Order has been confirmed. Your order is now being prepared.";
            echo "</div>
            <meta http-equiv='refresh' content='2;url=home' />
            " ;  
      

  $data2['message'] = $transac. '' .$table_id .''.$transaction_total_price;
  $pusher2->trigger('my-channel2', 'my-event2', $data2);
    }
    else{
              echo "<div class='alert alert-danger alert-dismissable' role='alert'>";
            echo "Unable to confirm order.";
            echo "</div>" ;  
    }
} else {    

}
      ?>
     </div>
      <div class="col-md-0"></div>
</div>

<hr>
<div class="form-row">
  <div class="col-md-0"></div>
  <div class="col-md-12">
                    <?php
                  // loop through the order records
                      $stmt = $user->my_view($from_record_num, $records_per_page);
                      $page_url="my_order";
                      $total_rows=$user->my_count();


                     include_once "order_template.php";

                     $total_price=$user->total_price();
              ?>

  </div>
  <div class="col-md-0"></div>
</div>
<hr>
<div class="form-row">
  <div class="col-md-0"></div>
  <div class="col-md-12">
                    <?php
                  // loop through the order records
                      $stmt = $user->my_view2($from_record_num, $records_per_page);
                      $page_url="my_order";
                      $total_rows2=$user->my_count2();


                     include_once "add_on_template.php";

                     $total_price_add_on=$user->total_price_add_on();
                    
              ?>

  </div>
  <div class="col-md-0"></div>
</div>

<?php 
$total_price_final = $total_price + $total_price_add_on;
   if($total_rows > 0){

  
    echo'
<form method="POST">
    <div class="form-row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2"><H3 ><b>Total Price:</b> <p style="color: red;"><span>&#8369;</span>'.$total_price_final.'.
  00</p> </H3></div>
</div>
<hr>
<form method="POST">
<div class="form-row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="form-group">
    <h5><i class="fas fa-pencil-alt"></i> Note:</h5>
    <textarea class="form-control" id="order_note" name="order_note" rows="3" placeholder="Enter additional instructions here. (e.g. Allergies, Deduction of unwanted ingredients, etc..)"></textarea>
  </div>
  </div>
  <div class="col-md-2"></div>
</div>
<hr>
    <div class="form-row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2"><H3 ><b>Total Price:</b> <p style="color: red;"><span>&#8369;</span>'.$total_price_final.'</p> </H3></div>
</div>
<hr>
<div class="form-row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2">
    

   <input style="display: none;" type="text" name="table_id" value="'.$table_id.'">
   <input style="display: none;" type="text" name="transaction_total_price" value="'.$total_price_final.'">
   <input type="submit" class="btn btn-warning" name="submit" value="Confirm Order">
</form>

  </div>
</div>
';


   }
    else{

    }
?>
<?php
        }

      }

                  else{
                    echo'<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow. Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div>';

      }
?>



    </div><!-- Main Col END -->
</div><!-- body-row END -->
   </body>


<!--view Modal -->
<div class="modal fade" id="updateModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2"><img style="width: 50px; height: 40px;" src="../../images/logo.png"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- -->
      <div id="divBodyModal5">

      </div>
    </div>
  </div>
</div>
<!--view Modal2 -->
<div class="modal fade" id="updateModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2"><img style="width: 50px; height: 40px;" src="../../images/logo.png"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- -->
      <div id="divBodyModal6">

      </div>
    </div>
  </div>
</div>
<!--add Modal -->
<div class="modal fade" id="updateModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2"><img style="width: 50px; height: 40px;" src="../../images/logo.png"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- -->
      <div id="divBodyModal6">

      </div>
    </div>
  </div>
</div>

 <script>
// Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}

         $(document).on('click','.edit_object',function(){
    var edit_id = $(this).attr('edit_id');
    console.log(edit_id);

    $.ajax({
        url: 'edit_item.php',
        method: 'POST',
        data:{edit_id:edit_id},

        success:function(data){
            $('#divBodyModal5').html(data);
            $('#updateModal5').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

            $(document).on('click','.edit_object2',function(){
    var edit_id = $(this).attr('edit_id2');
    console.log(edit_id);

    $.ajax({
        url: 'edit_item2.php',
        method: 'POST',
        data:{edit_id:edit_id},

        success:function(data){
            $('#divBodyModal6').html(data);
            $('#updateModal6').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

              $(document).on('click','.add_object',function(){
    var add_id = $(this).attr('add_id');
    console.log(add_id);

    $.ajax({
        url: 'add_item.php',
        method: 'POST',
        data:{add_id:add_id},

        success:function(data){
            $('#divBodyModal5').html(data);
            $('#updateModal5').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});
  </script>
   
