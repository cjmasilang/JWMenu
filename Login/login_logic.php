<?php
// Initialize the session
session_start();

// Include 
include "../config/database.php";
include "../classes/login.php";


$database = new Database();
$db = $database->getConnection();

$login = new Login($db);

// Define variables and initialize with empty values
$username = $Password = "";
$username_error = $password_error = "";
 
// Processing form data when form is submitted
if($_POST){
 
    // Check if userName is empty
    if(empty(trim($_POST["username"]))){
        $username_error = "<span style='color: red'>Please enter your username or password</span>";
    } else{
        $username = trim($_POST["username"]);
    }


    // Check if password is empty
    if(empty(trim($_POST["pass_word"]))){
        $password_error = "<span style='color: red'>.</span>";
    } 
    else{
        $Password = trim($_POST["pass_word"]);
    }
    
    // Validate credentials
    if(empty($username_eror) && empty($password_error)){
        // Set parameters
        $login->username = $username;
        // Store result
        $stmt = $login->user_data();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            extract($row);

          if(password_verify($Password, $row["password"])){
                   
                     $stmt2 = $login->increment();
                         $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                         extract($row2);
                         $inc_number = $increment_number + 1;
        
                        session_start();
                    
          
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["popup"] = 1;
                    $_SESSION["user_id"] = $user_id;
                    $_SESSION["username"] = $username;     
                    $_SESSION["firstname"] = $firstname; 
                    $_SESSION["lastname"] = $lastname;  
                    $_SESSION["password"] = $password;    
                    $_SESSION["usertype"] = $usertype;                        
                    $_SESSION["account_status"]= $account_status;
                    $_SESSION["increment"]= $inc_number;                
                    // Redirect user to welcome page
                   
                 
                     if($usertype == "admin"){

                        header("location: ../access/admin/home");
                    }

                     elseif($usertype == "employee"){

                        header("location: ../access/employee/home");
                    }

                      elseif($usertype == "customer"){
                        
                         $login->increment_number =  $inc_number;
                         $login->inc();
                         
                        header("location: ../access/customer/category?i=".$inc_number."");
                    }
                      elseif($usertype == "kitchen"){

                        header("location: ../access/kitchen/home");
                    }
                      elseif($usertype == "barista"){

                        header("location: ../access/barista/home");
                    }
                      elseif($usertype == "front_desk"){

                        header("location: ../access/front/home");
                    }
                    

        
            // Check if userName exists, if yes then verify password
           
                  
            
            }
            else{
            // Display an error message if password doesn't exist
            $password_error  = "<span style='color: red'>The username or password you entered is incorrect.</span>";
        }   
        }

        else{
            // Display an error message if userName doesn't exist
            $username_error  = "<span style='color: red'>The account you entered does not exist.</span>";
        }          
    }
}
?>