  <?php 
session_start();

// Include 
include "../config/database.php";
include "../classes/login.php";


$database = new Database();
$db = $database->getConnection();

$login = new Login($db);

if($_POST){


  
  $user_name = $_POST['username'];
  $pass_word = $_POST["password"];
  $re_password = $_POST["re_password"];
         $login->username = $_POST['username'];
        $stmt = $login->user_data();
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
                    $login->firstname= $_POST['firstname'];
                    $login->lastname = $_POST['lastname'];
                    $login->username =  $_POST['username'];
                    $pass_h= $_POST['password'];
                    $password_hash = password_hash($pass_h, PASSWORD_DEFAULT);
                    $login->password = $password_hash;
                 if ($login->create_account()){
                  echo "<div class='alert alert-success'>Account successfully registered. You may now login your account</div>
                    <meta http-equiv='refresh' content='2;url=login' />
                  ";


                }

                else{

                  echo "<div class='alert alert-danger'>Account unsuccessfully registered.</div>";

                }


             }

        }
          
          





     

  

   
}
  ?>