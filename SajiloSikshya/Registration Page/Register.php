<?php 
    session_start();
?>
<?php require('connect.php'); ?>

<?php

    // Defining the variables
    
    $firstname = $lastname = $email = $emailagain = $password = $passwordagain = $userpost = $username = "";
    $errormessage = "";

    if( isset($_POST['submit']) ) {
        $firstname = test_input($_POST['firstname']);
        $lastname = test_input($_POST['lastname']);
        $email = test_input($_POST['email']);
        $emailagain = test_input($_POST['emailagain']);
        $password = test_input($_POST['password']);
        $passwordagain = test_input($_POST['passwordagain']);
        $userpost = @$_POST['userpost'];
        $username = test_input($_POST['username']);
        
        if( !empty($email) ) {
            
            if( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                $errormessage = "Not Valid!";
            } else {
                
                if( $email == $emailagain ) {
                    
                    if( !empty($password) ) {
                        
                        if( $password == $passwordagain ) {
                            
                            $newpassword = md5($password);
                            
                            if( !empty($userpost) ) {
                                
                                if( !preg_match("/^[a-z0-9._]*$/i",$username) ) {
                                    $errormessage = "Username not valid!";
                                } else {
                                    
                                    if( $firstname && $lastname ) {
                                        
                                        $query = mysqli_query($con,"SELECT * FROM register WHERE username = '$username'");
                                        
                                        if( mysqli_num_rows($query) == 0 ) {
                                            $sql = "INSERT INTO register VALUES (NULL,'$firstname','$lastname','$email','$newpassword','$userpost','$username')";
                                        
                                            $insert = mysqli_query($con,$sql);

                                            if(!$insert) {
                                                echo "Couldn't insert";
                                            } else {
                                                $errormessage = "Registered!";
                                                
                                                header('Location: Index.php');
                                            }
                                        } else {
                                            $errormessage = "User Already Registered!";
                                        }
                                        
                                    } else {
                                        $errormessage = "Fill Up the Name fields";
                                    }
                                    
                                }
                                
                            } else {
                                $errormessage = "Choose Your post!";
                            }
                            
                        } else {
                            $errormessage = "Password Do not match!";
                        }
                        
                    } else {
                        $errormessage = "Password Empty!";
                    }
                    
                } else {
                    $errormessage = "Email Not matched!";
                }
                
            }
            
        } else {
            $errormessage = "Empty EMail";
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

