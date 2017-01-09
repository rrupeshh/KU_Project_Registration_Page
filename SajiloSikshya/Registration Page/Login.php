<?php 
require('connect.php')
?> 
<?php require('Header.php') ?>
<?php 
    $errormessage = "";
    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: Profile.php');   
    }

    $errormessage="";
    if (isset($_POST) && !empty($_POST)){
        $username =$_POST['username'];
        $password = md5($_POST['password']);
    $sql = "SELECT * FROM register WHERE username='$username' AND password='$password'"; 
    $result = mysqli_query($con,$sql);
    $count =  mysqli_num_rows($result);
    if ($count==1){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        if(isset($_SESSION['username'])){
        header('Location: Profile.php');
        } 
    }
    else{
        $errormessage = "Incorrect Username or Password";
    }
    
    }
?>
     <div id="style02" title="Register" ><a href = "Index.php">R</a></div>
</div>
<div id="side-section">
                Notification:
                <br>
                <p><?php echo $errormessage ?></p>
            </div>

    <div id="main-section1">
        <div id="loginheader"> Log In</div>
        <form action = "Login.php" method = "POST">
            <table id="login-table">
                        <tr>
                            <td>Username: </td>
                            <td>
                                <input type="text" name="username" autocomplete="off" autofocus="on" placeholder="Username" required><br>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Password: </td>
                            <td>
                                <input type="password" name="password" autocomplete="off" placeholder="Password" required><br>
                            </td>
                        </tr>
                        
                         <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Login">
                            </td>
                        </tr>
            </table>
                            
        
        </form>
        
    
    </div>
    </div>
   </body>
</html>
