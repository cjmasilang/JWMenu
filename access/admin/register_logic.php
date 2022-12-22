<?php 
if($_POST){
        $user_name = $_POST['username'];
        $pass_word = $_POST["password"];
        $re_password = $_POST["re_password"];
        $user->username = $_POST['username'];
        $stmt = $user->user_data();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){

         extract($row);
              if($row['username'] = $user_name){   
                 echo "<div class='alert alert-danger'>Username already exists. Create a new one.</div>";
          }

        }


        else{

              if($pass_word !== $re_password) {

               echo "<div class='alert alert-danger'>Your password does not match.</div>";
             }

             else{
                    $user->firstname= $_POST['firstname'];
                    $user->lastname = $_POST['lastname'];
                    $user->username =  $_POST['username'];
                    $user->usertype =  $_POST['usertype'];
                    $pass_h= $_POST['password'];
                    $password_hash = password_hash($pass_h, PASSWORD_DEFAULT);
                    $user->password = $password_hash;
                 if ($user->create_account()){
                  echo "<div class='alert alert-success'>Account successfully registered. You may now login your account</div>
                    <meta http-equiv='refresh' content='2;url=register' />
                  ";


                }

                else{

                  echo "<div class='alert alert-danger'>Account unsuccessfully registered.</div>";

                }


             }

        }

}
?>
