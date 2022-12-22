  <center><div class="login" id="login">
 
        <div class="wrapper" >

          <br>
           <center><h2 style="color: white;">Login with James Wright Account</h2></center>
           <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
               <span class="help-block"><?php echo $username_error; ?></span>
                <span class="help-block"><?php echo $password_error; ?></span>
                <div class="form-group <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                   
                    <input style="width: 100%; color: white;" type="text" name="username" placeholder="Username"class="form-control transparent-input" value="<?php echo $username; ?>">
                   
                </div>    
                <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                 
                    <input style="width: 100%; color: white;" type="password" placeholder="Password"name="pass_word" class="form-control transparent-input">
                   
                </div>
                              
                                    <br>

                <div class="form-group">
                    <center><button type="submit"  class="btn btn-warning btn-block"> Login</button></center>
                </div>

             
               
              
            
       
              
</form>
       
       
         </div>

         </div>

