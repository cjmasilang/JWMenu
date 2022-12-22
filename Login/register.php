<?php
include_once "login_import.php";
include_once "register_logic.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href='../images/logo.png'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>James Wright</title>
<style>
          .register {
  display: block;
   height: 100%;
   width: 100%;
   padding-left: 20px;
   padding-right: 20px;
   padding-bottom: 20px;
   background-color: white;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.3);
}

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
  background-repeat: no-repeat;
  background-attachment: fixed;  
}



.caption {
  position: absolute;
  left: 0;
  top: 10%;
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
         <li class="nav-item active">
        <a class="nav-link" href="../index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Login/about">About</a>
      </li>
    </div>
  </div>
  </div>

</nav>
<div class="bgimg-1">

    <div class="caption">
      <div class="form-row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
      include_once "register_form.php";
  ?>
        </div>
        <div class="col-md-2"></div>
      </div>

  </div>
</div>





</body>
</html>