<?php 
include_once "register_logic.php";
?>
<div class="register">
    <div  class="form">
        <div class="wrapper" style="margin: 0 auto;">
           <center><p>Please fill in your credentials to register account.</p></center>
           <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-row">
                <p style="font-size: 12px; font-family: Arial;"><i>(For Female Students: Use MAIDEN NAME if appclicable)</i></p>
              </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="firstname">*First Name</label>
                    <input type="text" name="firstname" class="form-control" required >
                 
                    
                  </div>

                  <div class="col-md-6">
                  <label for="firstname">*Last Name</label>
                    <input type="text" name="lastname" class="form-control"  required>
                  
                      
                  </div>
                  
                </div>
            
                  <div class="form-row">
                <p style="font-size: 12px; font-family: Arial;"><i>(Create a unique username)</i></p>
              </div>
                    <div class="form-row">
                  <div class="col-md-6">
                     <label for="username">*Username</label>
                    <input type="text" name="username" pattern=".{6,}" title="Atleast 6 characters." class="form-control" required >
               
                   

                  </div>
                  <div class="col-md-6">
                  
                  </div>
               
                  
                </div>
             
                  <div class="form-row">
                <p style="font-size: 12px; font-family: Arial;"><i>(Create a strong password to secure account)</i></p>
              </div>
                  <div class="form-row">
                  <div class="col-md-6">
                    <label for="password">*Password</label>
                     <input type="password" name="password"  pattern=".{6,}" title="Atleast 6 characters." class="form-control" required >
           
                    

                  </div>
                  <div class="col-md-6">
                       <label for="password">*Confirm Password</label>
                      <input type="password" name="re_password"  pattern=".{6,}" title="Atleast 6 characters." class="form-control" required >
                    <br>
                 
                  </div>
               
                  
                </div>
            
                <div class="form-row">
                  <div class="col-md-10"></div>
                   <div class="col-md-2">
                       <button style="float: right;" type="submit"  class="btn btn-secondary btn-circle btn-x3"><i class="fa fa-plus"></i> Create Account</button>
                   </div>
                  
                </div>
               

</form>
</div>
</div>
</div>
