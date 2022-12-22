<?php
include_once "login_import.php";
include_once "login_logic.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href='../images/logo.png'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>James Wright</title>
<style>
  :root {
  --right-bg-color: rgba(43, 43, 43, 0.8);
  --right-button-hover-color: rgba(92, 92, 92, 0.3);
  --right-bg-color: rgba(43, 43, 43, 0.8);
}
#body1 {
  background: url('../images/background.jpg') center center no-repeat;
  background-size: cover;
}

#body1:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--right-bg-color);
} 

.nav-link {
  display: block;
  height: 3rem;
  margin-left: 2px;
  width: 15rem;
  text-align: center;
  border: #fff solid 0.1rem;

  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;
  color: #fff; 
  font-size: 20px;
  font-family: Arial;
} 
.nav-link:hover {
  background-color: var(--right-button-hover-color);
  border-color: gray;
}
.login{
  padding-left: 20px;
  padding-right: 20px;
  height: 100%;

}

  .transparent-input{
       background-color:rgba(0,0,0,0) !important;
       border: #fff solid 0.1rem;
       height: 3rem;
        width: 15rem;
    }

    .form-control:focus {

  border-color: orange;
  outline: none;
}
</style>
</head>
<body id="body1" >
  <nav class="navbar fixed-top navbar-expand-lg navbar-light ">
  <div class="container-fluid">
  <a class="navbar-brand" href="../index"><img style="height: 80px; width:100px;" src="../images/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
   

   
    </ul>
    <div class="navbar-nav my-2 my-lg-0">
         <li class="nav-item active">
        <a  style="color: white;" class="nav-link" href="../index">Home</a>
      </li>
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="../Login/about">About</a>
      </li>
    </div>
  </div>
  </div>
  </nav>
<div class="form-row" style="padding-top: 200px;">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <?php
      include_once "login_form.php";
    ?>

  </div>
  <div class="col-md-4"></div>
</div>
</body>
</html>
<script type="text/javascript">

</script>