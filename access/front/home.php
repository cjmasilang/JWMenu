<?php
include_once "header.php";
include_once "connection.php";

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
    width: 60px;
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
a.active{
    background-color : #d1d1d1 !important;
    border: none;
}

.card {
  font-family: "PT Serif", serif;

  width: 100%;
  height: 100%;
  background: white;
  border-radius: 16px;
  padding: 1.5rem 1.5rem;
  box-sizing: border-box;
  transition: 0.2s;
  margin: 10px;
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}





  .column {
  float: left;
  width: 25%;
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

.finish_object{

  position: absolute;
  bottom: 10px;
  right: 30px;

}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
   
   
  }
}
</style>
<body>
<?php include_once "navigation.php";?>
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
                    <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed"></span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col p-4">
      <div class="form-row">
        <div class="col-md-0"></div>
        <div class="col-md-12" id="data_view"></div>
        <div class="col-md-0"></div>
      </div>
         <div class="row" id="result">
     
          <?php 
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
                        <div class="form-row">
  <div class="col-md-6">
  <H3 ><b>Total Price:</b></H3></div>
  </div>
  <div class="col-md-6"> <h5><p style="color: red;"><span>&#8369;</span>'.$transaction_total_price.'</p> </h5>
</div>

                     <hr>
                      <a class="btn btn-warning finish_object button_size" table_id = "'.$table_id.'" finish_id="'.$transaction_number.'"> Finish Order </a>
                    </article>

              </div>
              '; 
                
            }
          ?>


</div>

    </div><!-- Main Col END -->
</div><!-- body-row END -->
<!--finishModal -->
<div class="modal fade" id="updateModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2">Order Finished</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- -->
      <div id="divBodyModal4">

      </div>
    </div>
  </div>
</div>
   </body>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
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

 // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1c6335e562830e626580', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel3');
    channel.bind('my-event3', function(data) {

      //alert(JSON.stringify(data));
    $.ajax({url: "queue.php", success: function(result){
    $("#result").html(result);
     playAudio();

  }});
   
    });

  function playAudio() {
      var x = new Audio('../../sound/alert3.wav');
      x.play();
  }


      $(document).on('click','.finish_object',function(){
    var finish_id = $(this).attr('finish_id');
    var table_id = $(this).attr('table_id');
    console.log(finish_id, table_id);

    $.ajax({
        url: 'finish_order.php',
        method: 'POST',
        data:{finish_id:finish_id, table_id:table_id},

        success:function(data){
            $('#divBodyModal4').html(data);
            $('#updateModal4').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

  </script>
   
