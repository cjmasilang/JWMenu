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
    width: 230px;
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
/* Float four columns side by side */
        .box {
 padding-left: 10px;
 padding-right: 10px;
 padding-bottom: 10px;
 padding-top: 10px;
  display: block;
   background-color: white;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
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

            <a href="home" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-tachometer-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                </div>
            </a>



            <a href="order" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-list fa-fw mr-3"></span>
                    <span class="menu-collapsed">Orders</span>
                </div>
            </a>

            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>FILE MAINTENANCE</small>
            </li>
            <!-- /END Separator -->
            <a href="menu" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-th-list fa-fw mr-3"></span>
                    <span class="menu-collapsed">Menu</span>
                </div>
            </a>
            <a href="table" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-table fa-fw mr-3"></span>
                    <span class="menu-collapsed">Tables</span>
                </div>
            </a>
            <a href="register" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-user-plus fa-fw mr-3"></span>
                    <span class="menu-collapsed">Register</span>
                </div>
            </a>
            <a href="manage_user" class="bg-light list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-users-cog fa-fw mr-3"></span>
                    <span class="menu-collapsed">Manage Users</span>
                </div>
            </a>
             <a href="archive" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-archive fa-fw mr-3"></span>
                    <span class="menu-collapsed">Archives</span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
              <a href="profile" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">My Profile</span>
                </div>
            </a>
            <a href="help" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-question fa-fw mr-3"></span>
                    <span class="menu-collapsed">Help</span>
                </div>
            </a>
            <a href="#collapse" data-toggle="sidebar-colapse" class="bg-light list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col p-4">
        <div class="box" id="data_view">
<div class="form-row">
    <div class="col-md-0"></div>
     <div class="col-md-12">
         
         <nav class="navbar navbar-light bg-light ">

          <a style="margin-top: 5px;float: right;" class="btn btn-warning add_button button" data-toggle="modal" data-target="#AddModal" data-toggle='tooltip' data-placement='top' title='Add Category'><i class="fas fa-plus"></i> Add IP
                     </a>

</nav>
     </div>
      <div class="col-md-0"></div>
</div>
                <div class="form-row">
          <div class="col-md-0">
                        
          </div>
          <div class="col-md-12">
             
                <?php
                     $search_term=isset($_GET['s']) ? $_GET['s'] : ''; 
                     $page_title = "You searched for \"{$search_term}\"";
                     $user->user_id = $_SESSION["user_id"];
                  // loop through the user records
                      $stmt = $user->all_user_view($search_term, $from_record_num, $records_per_page);
                      $page_url="manage_user?s={$search_term}&";
                      $total_rows=$user->all_user_count($search_term);

                     include_once "user_template.php";
              ?>
              </div>
          </div>
          <div class="col-md-0"></div>
        </div>
    </div><!-- Main Col END -->
</div><!-- body-row END -->

<!--archiveModal -->
<div class="modal fade" id="updateModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2">Archive User Account</h5>
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

<!--Add Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add network address for website access.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" id="AddForm">
           <table class='table table-borderless'>
  <tbody>
  <tr>
        <td> <label for='table_name'>IP Address</label></td>
        <td><input type='text' class='form-control'  name='ip_number' required=""></td>
       
    </tr>
    <tr>
 
            <td>
            </td>
            <td>
              
              <button type='submit' class='btn btn-secondary' style='float: right;' ><i class="fas fa-plus"></i> Add</button>
              
             <button style='float: right; margin-right:  5px;' type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
            </td>
          </tr>
   
  
  </tbody>
</table>


   
        </form>
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


    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
         $(document).on('click','.delete_object',function(){
    var delete_id = $(this).attr('delete_id');
    var userID = $(this).attr('userID');
    console.log(delete_id, userID);

    $.ajax({
        url: 'archive_user.php',
        method: 'POST',
        data:{delete_id:delete_id, userID:userID},

        success:function(data){
            $('#divBodyModal4').html(data);
            $('#updateModal4').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});


   $('#AddForm').on('submit', function(event){
  

  event.preventDefault();

  $.ajax({  
    
    url:'unblock_ip.php',
    method:'POST',
    data: $('#AddForm').serialize(),
    
    success:function(data){
      $('#AddForm')[0].reset();
      $('#AddModal').modal('hide');
      $('#data_view').html(data);
     setTimeout(function() { window.location=window.location;},2000);

    }


  });


});

  </script>
   
