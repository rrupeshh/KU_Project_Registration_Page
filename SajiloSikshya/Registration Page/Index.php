<?php require('Header.php') ?>
<?php require('connect.php') ?>  
<?php require('Register.php') ?> 
            <div id="style01" title="Login" ><a href = "Login.php">L</a></div>   
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