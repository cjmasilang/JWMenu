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
  font-family: Arial;

  width: 100%;
  height: 100%;
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

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
   
   
  }
}
@media screen and (max-width: 1024px) {
  #view_id {
    font-size: 10px;

   
   
  }
    #bill_id {
    font-size: 10px;

   
   
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

                    <div class="row" id="result">

          <?php 
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
                        <a style="color: black;" class="btn btn-block btn-outline-warning view_object" view_id="'.$table_id.'"> Order</a>


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


</div>
</div>
</div>
    </div><!-- Main Col END -->
</div><!-- body-row END -->
<!--viewModal -->
<div class="modal fade" id="updateModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2"><img style="width: 50px; height: 40px;" src="../../images/logo.png"></h5>
     
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

<!--billModal -->
<div class="modal fade" id="updateModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

      //alert(JSON.stringify(data));
    $.ajax({url: "view_home.php", success: function(result){
    $("#result").html(result);

  }});
   
    });

         $(document).on('click','.view_object',function(){
    var view_id = $(this).attr('view_id');
    console.log(view_id);

    $.ajax({
        url: 'view_table_order.php',
        method: 'POST',
        data:{view_id:view_id},

        success:function(data){
            $('#divBodyModal4').html(data);
            $('#updateModal4').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

    $(document).on('click','.bill_object',function(){
    var bill_id = $(this).attr('bill_id');
    console.log(bill_id);

    $.ajax({
        url: 'bill_table_order.php',
        method: 'POST',
        data:{bill_id:bill_id},

        success:function(data){
            $('#divBodyModal5').html(data);
            $('#updateModal5').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});
  </script>
   
