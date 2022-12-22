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

            <a href="home" class="bg-light list-group-item list-group-item-action ">
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

            <a href="review_order" class="bg-light list-group-item list-group-item-action active">
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

      <div class="form-row">
        <div class="col-md-0"></div>
        <div class="col-md-12" id="data_view"></div>
        <div class="col-md-0"></div>
      </div>
         <div class="row" id="result">
     
          <?php 
          $stmt2= $user->review_order_queue();
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
                   $stmt3= $user->review_order_queue_items();
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
                   $stmt4= $user->review_order_queue_items_add_on();
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

                    </article>

              </div>
              '; 
                
            }
          ?>


</div>
</div>
</div>
    </div><!-- Main Col END -->
</div><!-- body-row END -->




   </body>
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


  </script>
   
