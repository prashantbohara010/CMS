<?php
include("include/connection.php");

if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if (empty($fname)) {
        $error['ac'] = "Enter Firstname";
    } else if (empty($sname)) {
        $error['ac'] = "Enter Surname";
    } else if (empty($uname)) {
        $error['ac'] = "Enter Username";
    } else if (empty($email)) {
        $error['ac'] = "Enter Email";
    } else if (empty($phone)) {
        $error['ac'] = "Enter Phone Number";
    } else if ($gender == "") {
        $error['ac'] = "Enter Your Gender";
    } else if ($country == "") {
        $error['ac'] = "Enter Your Country";
    } else if (empty($password)) {
        $error['ac'] = "Enter Password";
    } else if ($con_pass != $password) {
        $error['ac'] = "Both passwords do not match";
    }

    if (count($error) == 0) {
        $query = "INSERT INTO patient (firstname, surname, username, email, phone, gender, country, password, date_reg, profile) VALUES ('$fname', '$sname', '$uname', '$email', '$phone', '$gender', '$country', '$password', NOW(), 'patient.jpg')";

        $res = mysqli_query($connect, $query);
        if ($res) {
            header("Location: patientlogin.php");
            exit();
        } else {
            echo "<script>alert('Failed to insert data into the database')</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>
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
        
        <h1>Create Account</h1>
        <!-- <div>
            <?php echo $show; ?>
        </div> -->
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="fname" autocomplete="off"placeholder="Enter firstname" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Surname</label>
            <input type="text" name="sname" autocomplete="off"placeholder="Enter Surname" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="uname" autocomplete="off"placeholder="Enter Username" class="form-control"  required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" autocomplete="off"placeholder="Enter Email Address" class="form-control"  required>
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="phone" autocomplete="off"placeholder="Enter Phone Number" class="form-control"  required>
        </div>

        <div class="form-group">
            <label>Select Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <br><br>


        <div class="form-group">
            <label>Select Country</label>
            <select name="country">
                <option value="">Select Country</option>
                <option value="Nepal">Nepal</option>
                <option value="Usa">USA</option>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" class="form-control" autocomplete="off"
            placeholder="Enter Password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="con_pass" class="form-control" autocomplete="off"
            placeholder="Enter Confirm Password" required>
        </div>

        <input type="submit" class="btn" name="apply" value="Create Acc">
        <br> <br>
        <p>I already have an account <a href="patientlogin.php">Click Here</a></p>
    </form>
    </div>
</body>

</html>