<?php
include_once "../../config/core.php";
include '../../config/database.php';
include '../session/check_admin.php'; 
include '../../classes/user.php'; 
  $database = new Database();
  $db = $database->getConnection();
  $user = new user($db); 
?>
<style type="text/css">

</style>

