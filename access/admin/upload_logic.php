<?php
    $database = new Database();
    $db = $database->getConnection();
    $user = new user($db);
// Uploads files
if (isset($_POST['post_it'])) {
    // name of the uploaded file
    $filename = $_FILES['first']['name'];
    $filename2 = $_FILES['second']['name'];
    // destination of the file on the server
    $destination = '../../uploads/' . $filename;
    $destination2 = '../../uploads/' . $filename2;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['first']['tmp_name'];
    $size = $_FILES['first']['size'];
    $file2 = $_FILES['second']['tmp_name'];
    $size2 = $_FILES['second']['size'];
    $user->pic_1= $filename;
    $user->pic_2= $filename2;


  if(file_exists($destination) || file_exists($destination2)){
   echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 File already exists. Please rename the file name or upload another file.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
    elseif (!in_array($extension, [ 'png' , 'jpeg' , 'jpg', 'JPG', 'PNG']) || !in_array($extension2, [ 'png' , 'jpeg' , 'jpg', 'JPG', 'PNG']) ) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 File must be an image.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    } 
    elseif ($_FILES['first']['size'] > 100000000  || $_FILES['second']['size'] > 100000000 ) { // file shouldn't be larger than 10Megabyte
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
 File is too large.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    } 
    else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination) &&  move_uploaded_file($file2, $destination2)) {
    $user->food_name = $_POST['food_name'];
    $user->food_description = $_POST['food_description'];
    $user->food_price = $_POST['food_price'];
    $user->food_category_id = $_POST['food_category_id'];
    $category_id = $_POST['food_category_id'];
             $user->add_food();
              
             echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
   File uploaded successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
<meta http-equiv='refresh' content='1;url=menu_list?category=".$category_id."'/>
";     
        }

         else {
                     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
   Failed to upload file.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        }
    }
}
?>