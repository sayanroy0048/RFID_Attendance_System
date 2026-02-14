<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="login-container">
            <div class="login-form"> 
                <form method="POST" action="#">
                    <div class="label-input">
                        <div class="image">

                        </div>
                        <div class="login-heading">Login</div>
                        <label for="username"><svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                         <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>Username</label><br>
                        <input id="username" placeholder="Username" name="Username" type="text"  class="username" required>
                    </div>
                    <div class="label-input">
                        <label for="password"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>Password</lable><br>
                        <input type="password" placeholder="Password" name="Password" class="password" id="password" required>
                    </div>
                    <button class="Login" name="Login">Login</button>
                </form>
            </div>
        </div>
        <?php
            include "function.php";
            if(isset($_POST["Login"])){
                $Username=$_POST["Username"];
                $Password=$_POST["Password"];
                $query="select * from login ;";
                $sql=sql_run($query);
                $array=mysqli_fetch_assoc($sql);
                if($Username==$array["Username"] && $Password==$array["Password"]){
                    $_SESSION['username']=$Username;
                    ?>
                        <div class="successful-massage">
                        <div class="icon">
                            <img src="Right_icon.png" alt="Right_icon">
                        </div>
                        <div class="Thank-you">Thank you !</div>
                        <div class="successfuly-login">You successfuly login .</div>
                        <form method="post" action="#">
                            <div class="div-button">
                                <button name="successful-button" class="successful-button">
                                    Ok
                                </button>
                            </div>
                        </form>
                    
                    </div>

                    <?php

                }
                else{
                    ?>
                        <div class="successful-massage">
                        <div class="icon">
                            <img src="Exclemation_icon.png" alt="Right_icon">
                        </div>
                        <div class="Thank-you">Not found !</div>
                        <div class="successfuly-login">Your Username and Password are not match .</div>
                        <form method="post" action="#">
                            <div class="div-button">
                                <button name="failed-login" class="failed-login">
                                    Ok
                                </button>
                            </div>
                        </form>
                    
                    </div>
                <?php
                }
            }if(isset($_POST["successful-button"])){
                
                redirect("http://localhost//final_project//Dashboard.php");
                // header('location:Admin_pannel.php');
            }
        ?>
    
    </body>
</html>
