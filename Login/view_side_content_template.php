<style type="text/css">
  .pic {
    max-height: 90px;
  }
@media only screen and (max-device-width: 1024px) {
  .pic {
    max-height: 200px;
  }
}

</style>

<?php

// display the table if the number of users retrieved was greater than zero
if($total_rows>0){

   echo "<table class='table table-borderless'>";
 
    // table headers
 
    // loop through the user records
       while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
        extract($row);
            $file_name = $row['pic_1'];
            $destination = '../uploads/' . $file_name ;
            $post_date = $row['date_added'];
            $date_posted = date("m-d", strtotime($post_date));
            $food_id = $row['food_id'];
        // display user details
        echo "<tr>";
           
           
            echo '<td style="width: 50%;">
<div class="container_image">
<a href="Login/content_view.php?food_id='.$food_id.'" target="_blank" >
<img class="pic" src="'.$destination.'" alt="picture"  class="image" style=" width:100%;">
</a>
</div>

                  </td>';
            echo '<td style="width: 50%; font-size: 13px;"><a class="text_title">'.$food_name.'</a><br><br>
            <a class="text_title"><span>&#8369;</span> '.$food_price.'</a>
            <br><br>
            <a class="text_title">'.$date_posted.'</a>
            </td>';

        echo "</tr>";
        }
 
    echo "</table>";

}
 
// tell the user there are no selfies
else{

    echo "<div class='alert alert-danger'>
        <strong>No Data found.</strong>
    </div>";
}
?>



 
   