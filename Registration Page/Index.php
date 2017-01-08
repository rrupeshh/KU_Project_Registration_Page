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

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>www.Sajiloshiksha.com</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    
    <body>
        <div id="wrapper">
            <div id="header">
                <img src="logo.png" style="height: 100px;">
                Sajilo Shiksha
                
                <span id="searchbox">
                    <input type="search" placeholder="Search ..." onkeydown="if(event.keyCode == 13) alert('You Searched ' + this.value);">
                </span>
                
                <div id="style01" title="Login" onclick="alert('You Click Login button')">L</div>
            </div>
            
            <div id="side-section">
                Notification:
                <br>
                <?php echo $errormessage; ?>
            </div>
            
            <div id="main-section">
                
                <div id="signupheader">Sign Up for free!</div>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <table id="register-table">
                        <tr>
                            <td>First Name: </td>
                            <td>
                                <input type="text" name="firstname" autocomplete="off" autofocus="on" placeholder="First Name ...">
                            </td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td>
                                <input type="text" name="lastname" autocomplete="off" placeholder="Last Name ...">
                            </td>
                        </tr>
                        <tr>
                            <td>Email Address: </td>
                            <td>
                                <input type="text" name="email" autocomplete="off" placeholder="Email Address ...">
                            </td>
                        </tr>
                        <tr>
                            <td>Re-Enter Email: </td>
                            <td>
                                <input type="text" name="emailagain" autocomplete="off" placeholder="Re-Enter Email ...">
                            </td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td>
                                <input type="password" name="password" autocomplete="off" placeholder="Choose a password ...">
                            </td>
                        </tr>
                        <tr>
                            <td>Re-Enter Password: </td>
                            <td>
                                <input type="password" name="passwordagain" autocomplete="off" placeholder="Re-Enter a password ...">
                            </td>
                        </tr>
                        <tr>
                            <td>Your Post: </td>
                            <td>
                                <input type="radio" name="userpost" value="Teacher">&nbsp;Teacher
                                &nbsp;&nbsp;
                                <input type="radio" name="userpost" value="Student">&nbsp;Student
                            </td>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td>
                                <input type="text" name="username" autocomplete="off" placeholder="Choose username ...">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Register">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div> 
    </body>
</html>