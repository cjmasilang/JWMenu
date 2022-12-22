<?php
include_once "login_import.php";
include "../config/database.php";
include "../classes/login.php";
$database = new Database();
$db = $database->getConnection();

$login = new Login($db);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href='../images/logo.png'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>James Wright</title>
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: .9;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("../images/background.jpg");
  min-height: 100%;
}

.bgimg-2 {
  background-image: url("../images/second_back.jpg");
  min-height: 400px;
}

.bgimg-3 {

    background-image: url("../images/third.jpg");
  min-height: 400px;
}

.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;

}

.caption span.border {
  background-color: #111;
  color: #fff;
  padding: 20px;
  font-size: 25px;
  letter-spacing: 10px;
}


.button_log:hover  {
  background-color: gray;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Lato", sans-serif;
  color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
  .bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: scroll;
  }
}
nav.three {
 margin-bottom: 5px;
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
.content_view {
 margin-bottom: 5px;
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
#cont {

  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-expand-lg navbar-light bg-light three">
  <div class="container">
  <a class="navbar-brand" href="../index"><img style="height: 80px; width:90px;" src="../images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
   

   
    </ul>
    <div class="navbar-nav my-2 my-lg-0">
         <li class="nav-item">
        <a class="nav-link" href="login">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about">About</a>
      </li>
    </div>
  </div>
  </div>

</nav>

<div class="bgimg-1">

    <div class="caption">
<h3 style="color: white;">Welcome to James Wright Cafe!</h3>
<br>
  <span class="border" style="background-color:transparent;font-size:25px;color: white;"><a id="button_log" style="text-decoration: none; color: white;" href="Login/login">LOGIN</a></span>
  </div>
</div>

<div id="cont" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">


    <p>James Wright offers a complete line of all-natural, affordable and nutritious breads for health-conscious consumers.</p>
  <div class="form-row content_view" >
    <div class="col-xl-8" >


                <?php 
                $stmt = $login->view_content();
                $total_rows=$login->count_new_content();
                
                // include products table HTML template
                include_once "view_content_template.php";
                ?>

  </div>
  <div class="col-xl-4" >
    
   <?php 
                $stmt2 = $login->view_side_content();
                // to identify page for paging   ' . $search_term . '
                $page_url="index.php?";
                $total_rows=$login->count_side_content();
                
                // include products table HTML template
                include_once "view_side_content_template.php";
                ?>
  </div>
</div>



</div>

<div class="bgimg-2">
  <div class="caption">
  <span class="border" style="background-color:transparent;font-size:25px;color: white;">WHAT WE SERVE</span>
  </div>
</div>

<div style="position:relative;">
  <div style="background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
  <p>Scroll up and down to really get the feeling of how Parallax Scrolling works.</p>
  </div>
</div>

<div class="bgimg-3">
  <div class="caption">
  <span class="border" style="background-color:transparent;font-size:25px;color: white;">ABOUT US</span>
  </div>
</div>

<div style="position:relative;">
  <div style="background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
  <p>James Wright offers a complete line of all-natural, affordable and nutritious breads for health-conscious consumers.</p>
  </div>
</div>

<div class="bgimg-1">
  <div class="caption">
  <span class="border">COOL!</span>
  </div>
</div>

</body>
</html>