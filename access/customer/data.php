       <?php 
      $stmt= $user->inc_checker();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
        extract($row);
        if($t_id != $increment_number){
          echo'<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Access blocked.</h4>
  <p>This page is inaccessible due to incorrect workflow. Please contact technical support for your queries and problems.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div>';

        }

        else{
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
      <li class="nav-item " style="margin-right: 5px;">
        <a class="nav-link btn btn-outline-warning " href="category?i=<?php echo $t_id;?>">Category View</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link btn btn-warning " href="home?i=<?php echo $t_id;?>">All Menu View</a>
      </li>
    </ul>
    <?php
   
    echo "
    <form class='form-inline my-2 my-lg-0' action='home?i=".$t_id."' method='POST'>";
      
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
      echo'
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="s" id="srch-term" {$search_value}/>
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form> ';
    ?>
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
           $search_term=isset($_POST['s']) ? $_POST['s'] : '';
      $stmt2= $user->view_menu_all_category_select_take_out($search_term); 
       $total_rows=$user->search_count($search_term);
       if($total_rows > 0){
           while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        
                    extract($row2);
             echo '   <div class="column">
     <article class="card view_object" view_id="'.$food_id.'" table_id="'.$t_id.'" data-toggle="tooltip" data-placement="top" title="View">
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
  <div class="col-md-10"><img  style ="width:100%;max-height:120px; "src="../../uploads/'.$pic_2.'"></div>
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
          echo'<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">No results found.</h4>
  <p>The menu item you searched does not exist. Enter existing menu item and try again.</p>
  <hr>
  <p class="mb-0">Please go back to previous page or dashboard to exit this page.</p>
</div>
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