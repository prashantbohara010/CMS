<?php
include("include/connection.php");

if (isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    
    $error = array();
    $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $qq = mysqli_query($connect, $q);
    $row = mysqli_fetch_array($qq);
    
    if (empty($uname)) {
        $error['login'] = "Enter Username";
    } elseif (empty($password)){
        $error['login'] = "Enter Password";
    } elseif ($row['status'] == "Pending"){
        $error['login'] = "Please wait for the admin to confirm";
    } elseif ($row['status'] == "rejected"){
        $error['login'] = "Try again later";
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res)){
            echo "<script>alert('Done')</script>";
            $_SESSION['doctor'] = $uname;
        } else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}

if (isset($error['login'])){
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
    $show = "";
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Doctor Login</title>
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
<div class="container">
    <form method="post">
        
        <h1>Doctor Login</h1>
        <div>
            <?php echo $show; ?>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="uname" autocomplete="off"placeholder="Enter username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="passowrd">Password</label>
            <input type="password" name="pass" class="form-control" autocomplete="off" required>
        </div>

        <input type="submit" class="btn" name="login" value="Login">
        <br> <br>
        <p>I don't have an account <a href="apply.php">Apply Now!!!</a></p>
    </form>
    </div>
</body>

</html>