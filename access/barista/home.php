<?php
include_once "header.php";
include_once "connection.php";

?>
<style>
  /*body {
  background: linear-gradient(315deg, #f39f86 0%, #f9d976 74%);

  background-size: 400% 400%;
  animation: gradient 15s ease infinite;
  height: 100vh;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
*/
#body-row {
    margin-left:0;
    margin-right:0;
   /*background-image: url('../../images/background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;*/
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
.note_object{

  position: absolute;
  bottom: 10px;

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
                    <span class="fas fa-list-alt fa-fw mr-3"></span>
                    <span class="menu-collapsed"></span>
                </div>
            </a>

            <a href="review_order" class="bg-light list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-tasks fa-fw mr-3"></span>
                    <span class="menu-collapsed"></span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <div class="col p-4">
      <div class="form-row">
        <div class="col-md-0"></div>
        <div class="col-md-12" id="data_view"><h4>Order Queue</h4></div>
        <div class="col-md-0"></div>
      </div>
         <div class="row" id="result">
     
          <?php 
          $stmt2= $user->view_order_queue();
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
                   $stmt3= $user->view_order_queue_items_barista();
                     while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                  extract($row3);

                  echo '  
                   <center><div class="form-row"> ';
                   if($trans_order == 0){
                    echo'
                       <div class="col-md-6">'.$food_name.'</div>
                    <div class="col-md-3">x '.$quantity.'</div>
                    <div class="col-md-3"><button type="button" class="btn btn-danger btn-sm remove_button" remove_id="'.$order_id.'"><i class="fas fa-times"></i></button></div>';
                   }

                   else{
                    echo'
                       <div class="col-md-6"><span class="badge badge-danger">New</span>'.$food_name.'</div>
                    <div class="col-md-3">x '.$quantity.'</div>
                    <div class="col-md-3"><button type="button" class="btn btn-danger btn-sm remove_button" remove_id="'.$order_id.'"><i class="fas fa-times"></i></button></div>';

                   }
                   echo'
                  
                    
                  </div></center>
                  <br>
 <hr>
                  ';

                }
                  $user->transaction_number = $transaction_number;
                   $stmt5= $user->view_note_count();
                     $row5 = $stmt5->fetch(PDO::FETCH_ASSOC); 
                     if($row5 > 0){
                     echo'
                    
                      <a class="btn btn-outline-danger note_object" note_id="'.$transaction_number.'"> Note </a>';
                     }
                     else{

                     }  


                    echo'
                 
                      <a class="btn btn-warning finish_object button_size" finish_id="'.$transaction_number.'"> Done </a>
                    </article>

              </div>
              '; 
                
            }
          ?>


</div>



                   



    </div><!-- Main Col END -->
</div><!-- body-row END -->
<!--removeModal -->
<div class="modal fade" id="updateModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2">Order Finished</h5>
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

<!--noteModal -->
<div class="modal fade" id="updateModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel2">Order Notes by Customer</h5>
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

    var channel = pusher.subscribe('my-channel2');
    channel.bind('my-event2', function(data) {

      //alert(JSON.stringify(data));
    $.ajax({url: "queue.php", success: function(result){
    $("#result").html(result);
      playAudio();

  }});
   
    });

        var channel2 = pusher.subscribe('my-channel4');
    channel2.bind('my-event4', function(data) {

      //alert(JSON.stringify(data));
    $.ajax({url: "queue.php", success: function(result){
    $("#result").html(result);


  }});
   
    });

  function playAudio() {
      var x = new Audio('../../sound/alert2.wav');
      x.play();
  }
    $(document).on('click','.finish_object',function(){
    var finish_id = $(this).attr('finish_id');
    var userID = $(this).attr('userID');
    console.log(finish_id, userID);

    $.ajax({
        url: 'finish_order.php',
        method: 'POST',
        data:{finish_id:finish_id, userID:userID},

        success:function(data){
            $('#divBodyModal4').html(data);
            $('#updateModal4').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

        $(document).on('click','.remove_button',function(){
    var remove_id = $(this).attr('remove_id');
    var userID = $(this).attr('userID');
    console.log(remove_id, userID);

    $.ajax({
        url: 'remove_order.php',
        method: 'POST',
        data:{remove_id:remove_id, userID:userID},

        success:function(data){
            $('#divBodyModal4').html(data);
            $('#updateModal4').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

    $(document).on('click','.note_object',function(){
    var note_id = $(this).attr('note_id');
    console.log(note_id);

    $.ajax({
        url: 'note_order.php',
        method: 'POST',
        data:{note_id:note_id},

        success:function(data){
            $('#divBodyModal5').html(data);
            $('#updateModal5').modal('show');
            //$('#addModal').modal('hide');
        }
    });
});

    var mins = 1;

 // calculate the seconds (don't change this! unless time progresses at a         different speed for you...)
var secs = mins * 0;
var timeout;

function countdown() {
  timeout = setTimeout('Increment()', 1000);
}


function colorchange(minutes, seconds)
{
 if(minutes.value =="14" && seconds.value =="59")
 {
    minutes.style.color="black";
    seconds.style.color="black";
 }
 else if(minutes.value =="15" && seconds.value =="00")
 {
    minutes.style.color="red";
    seconds.style.color="red";
 }

}

function Increment() {
  if (document.getElementById) {
    minutes = document.getElementById("minutes");
    seconds = document.getElementById("seconds");
    // if less than a minute remaining

    if (seconds > 0) {
    seconds.value = secs;

    } else {
      minutes.value = getminutes();
      seconds.value = getseconds();
    }
    colorchange(minutes,seconds);

    secs++;
    if (secs > 1800) {
      clearTimeout(timeout);
      return;
    }
    countdown();
  }
}

function getminutes() {
  // minutes is seconds divided by 60, rounded down
  mins = Math.floor(secs / 60);
  return ("0" + mins).substr(-2);
}

function getseconds() {
  // take mins remaining (as seconds) away from total seconds remaining
  return ("0" + (secs - Math.round(mins * 60))).substr(-2);
}
  </script>
   
