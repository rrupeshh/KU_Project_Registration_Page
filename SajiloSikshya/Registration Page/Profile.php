<?php include('connect.php');?>
<?php include('Header.php')?>
 <div id="style02" title="Logout" ><a href = "Login.php"><img src="logo2.png" style="height: 60px;"></a></div>
</div>
<div id = "main_body">
        <aside id="left_side">
                <ul class="health_links">
                    <li><a href="#">&gt;&gt; Profile</a></li>
                    <li><a href="#">&gt;&gt; E-Learning</a></li>
                    <li><a href="#">&gt;&gt; Online Test</a></li>
                    <li><a href="#">&gt;&gt; Discussion Forum</a></li>
                    <li><a href="#">&gt;&gt; Downloads</a></li>
                </ul>
            </aside>
    <div id = "body">
                

        <?php 
            session_start();
            $username = $_SESSION['username'];
            if(!$username)
            {
                die('Sorry Invalid Excess');
            }
            else{
                echo "Welcome to Sajilo Sikshya &nbsp;".$_SESSION['username'];
            }
        ?>

    </div>
    <div id = "side">
        <div id = "side_panel1">
            <h2><i>Notices</i></h2>
            
             &gt;Sajilo Sikshya recently updated its UI

        </div>
        <div id = "side_panel2">
             <h2><i>News and Events</i></h2>
            
             &gt;Free PCM online test to be held on coming Saturday 

        </div>
        
    </div>
    
</div>


