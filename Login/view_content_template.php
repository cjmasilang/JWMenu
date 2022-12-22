<style type="text/css">


.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: linear-gradient(to bottom, rgba(255,0,0,0), rgba(0,0,0,10)); /* Black see-through */
  color: white;
  width: 98.7%;
  transition: .5s ease;
  opacity:1;
  padding: 20px;
  left: 5px;
}

.container_image:hover .overlay {
  opacity: 0;
}


.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container_image:hover .image {
  opacity: 0.5;
}

.container_image:hover .middle {
  opacity: 1;
}
.container_image {
  margin-top: 5px;

}
.text_but {

  color: black;
  font-size: 16px;
  padding: 16px 32px;
}


</style>

<?php
// display the table if the number of users retrieved was greater than zero
if($total_rows>0){

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
            $file_name = $row['pic_1'];
            $destination = '../uploads/' . $file_name ;
            $post_date = $row['date_added'];
            $date_posted = date("m-d", strtotime($post_date));
            $food_id = $row['food_id'];
            

  echo'

<div class="container_image">
<a href="Login/content_view.php?post_id='.$food_id.'" target="_blank">
  <img src="'.$destination.'" alt="picture" style="width:100%; max-height: 480px;" class="image">
  </a>
  <div class="overlay">
     <p class="cap1">'.$row['food_name'].'</p>
     <p class="cap2"><i class="far fa-clock"></i> '. $date_posted.'</p>
  </div>

    <div class="middle">
    <div class="text_but">View Post</div>
  </div>
</div>
';

}
 
// tell the user there are no selfies
else{
     echo "<br>";
      echo "<br>";
       echo "<br>";
    echo "<div class='alert alert-danger'>
        <strong>No Data found.</strong>
    </div>";
}
?>