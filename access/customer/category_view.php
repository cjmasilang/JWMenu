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
  width: 20%;
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

            <a  class="bg-light list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-utensils fa-fw mr-3"></span>
                    <span class="menu-collapsed">Menu</span>
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

if (isset($_GET["i"]) && isset($_GET['category']) ) {
    $t_id = $_GET["i"];  
    $category_id = $_GET['category'];
  $user->table_id =  $t_id;
  $user->category_id =  $category_id;

          if ($t_id != $_SESSION["increment"]) {
      echo'<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow. Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div>';
      }

      else{ 
  $user->increment_number = $t_id;
      $stmt= $user->inc_checker();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
        extract($row);
        ?>
<div class="form-row">
    <div class="col-md-0"></div>
     <div class="col-md-12">
         
         <nav class="navbar navbar-light bg-light justify-content-between">
  <a style="font-size: 0.9rem;" href="menu_view?table=<?php echo $t_id;?>" class="navbar-brand"></a>
    <a style="color: black;" href="my_order?table=<?php echo $t_id;?>" class="btn btn-warning my-2 my-sm-0" type="submit"><i class="fas fa-shopping-cart"></i> My Order</a>

</nav>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" style="margin-right: 5px;">
        <a class="nav-link btn btn-warning " href="category?i=<?php echo $t_id;?>">Category View</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link btn btn-outline-warning " href="home?i=<?php echo $t_id;?>">All Menu View</a>
      </li>
    </ul>

  </div>
</nav>

     </div>
      <div class="col-md-0"></div>
</div>

<div class="form-row">
  <div class="col-md-0"></div><div class="col-md-12" id="data_view"></div><div class="col-md-0"></div>
</div>
<hr>

                    <div class="row">
           
                <?php 
          $total_rows = $user->count_row_menu();
          if($total_rows > 0){
          $stmt2= $user->view_menu_all_category_select();
           while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        extract($row2);

             echo '   <div class="column">
                    <article class="card view_object" view_id="'.$food_id.'" table_id="'.$t_id.'" data-toggle="tooltip" data-placement="top" title="View">
                      <div>
                           ';
     $user->food_id = $food_id;
     $user->table_id = $t_id;
      $total_rows2 = $user->badge_count_2();
      if($total_rows2 > 0){
        echo'<h5><span class="badge badge-danger">'.$total_rows2.'</span></h5>';
      }

      else{


      }

     echo'
 <div>              
<div class="form-row">
<div class="col-md-1"> </div>
  <div class="col-md-10"><img  style ="width:100%;max-height:220px; "src="../../uploads/'.$pic_2.'"></div>
  <div class="col-md-1"> </div>
</div>
<hr>
<div class="form-row">
  <div class="col-md-0"></div>
  <div class="col-md-12">
      <p class="titl"><a style="text-decoration:none; color: black;" class="main-link" >'.$food_name.'</a></p>

  </div>
  <div class="col-md-0"></div>
</div>
                      
    
                        
                    </article>
              </div>
      
              '; 
                
            }
          }
          else{
                echo "<div class='alert alert-warning' role='alert'>";
                      echo "This category has no available food item. Select another category.";
                      echo "</div>" ;
          }

          ?>


</div>

<?php

      }

      else{
echo'<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow. Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div>';

      }
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


</div>
</div>
    </div><!-- Main Col END -->
</div><!-- body-row END -->
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

         $(document).on('click','.view_object',function(){
    var view_id = $(this).attr('view_id');
    var table_id = $(this).attr('table_id');
    console.log(view_id, table_id);

    $.ajax({
        url: 'view_item.php',
        method: 'POST',
        data:{view_id:view_id,table_id:table_id},

        success:function(data){
            $('#divBodyModal5').html(data);
            $('#updateModal5').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});
  </script>
   
