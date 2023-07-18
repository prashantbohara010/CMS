<?php
session_start();
include("include/connection.php");

if (isset($_POST["login"])){
    $username = $_POST["uname"];
    $password = $_POST["pass"];

    $error = array();

    if (empty($username)) {
        $error['admin'] = "Enter Username";
        echo "<script type='text/javascript'>alert('Please enter username')</script>";
        exit();
    } elseif (empty($password)){
        $error['admin'] = "Enter Password";
    }
    
    if (count($error) == 0){
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect, $query);
        
        if (mysqli_num_rows($result) == 1){
            echo "<script>alert('You Have Logged in as an admin')</script>";
            $_SESSION['admin'] = $username;
            header("Location: admin/index.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}
?>





<!DOCTYPE html>
<html>
<head>
<title>Admin Login Page</title>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        min-height: 100vh;
        background: #eee;
        display: flex;
        font-family: sans-serif;
    }
    .container{
        margin: auto;
        width: 500px;
        max-width: 90%;
    }
    .container form{
        width: 100%;
        height: 100%;
        padding: 20px;
        background: white;
        border-radius: 4px;
        box-shadow: 0 8px 16px rgba(0,0,0,.3);
    }
    .container form h1{
        text-align: center;
        margin-bottom: 24px;
        color: #222;
    }
    .container form .form-control{
        width: 100%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border: 1px soldi silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
    }
    .container form .btn{
        margin-left: 50%;
        transform: translateX(-50%);
        width: 120px;
        height: 34px;
        border: none;
        outline: none;
        background: #27a327;
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        color: white;
        transition: .3s;
    }
    .container form .btn:hover{
        opacity: .7;
    }
</style>

</head>

<body>
    <!-- <?php
    include("include/header.php");
    ?> -->
    <!-- <div style="margin-top: 100px; margin-left: 200px;"></div> -->
    <div class="container">
    <form method="post">
        <div class="alert alert-danger">
            <?php

            if (isset($error['admin'])) {

                $show = $erro['admin'];

            }else{
                $show = "";
            }
            echo $show;

            ?>
        </div>
        <h1>Admin Login</h1>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="uname" autocomplete="off"placeholder="Enter username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="passowrd">Password</label>
            <input type="password" name="pass" class="form-control" required>
        </div>

        <input type="submit" class="btn" name="login" value="Login">
    </form>
    </div>
</body>

</html>