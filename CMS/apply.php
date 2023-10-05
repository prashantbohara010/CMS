<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("include/connection.php");

if (isset($_POST['apply'])){
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)){
        $error['apply'] = "Enter Firstname";
    } elseif(empty($surname)){
        $error['apply'] = "Enter Surname";
    } elseif(empty($username)){
        $error['apply'] = "Enter Username";
    } elseif(empty($email)){
        $error['apply'] = "Enter Email Address";
    } elseif(empty($gender)){
        $error['apply'] = "Enter Gender";
    } elseif(empty($phone)){
        $error['apply'] = "Enter Phone Number";
    } elseif(empty($country)){
        $error['apply'] = "Enter Country";
    } elseif(empty($password)){
        $error['apply'] = "Enter Password";
    } elseif(empty($confirm_password)){
        $error['apply'] = "Confirm Password does not match";
    }

    if(count($error)==0){
        $query = "INSERT INTO doctors (firstname, surname, username, email, gender, phone, country, password, salary, data_reg, status, profile)
                  VALUES ('$firstname', '$surname', '$username', '$email', '$gender', '$phone', '$country', '$password', '0', NOW(), 'Pending', 'doctor.jpg')";

        $result = mysqli_query($connect, $query);

        if($result){
            echo "<script>alert('You have successfully applied')</script>";
            header("Location: doctorlogin.php");
            exit();
        } else {
            echo "<script>alert('Failed: " . mysqli_error($connect) . "')</script>";
        }
    }
}

if(isset($error['apply'])){
    $s = $error['apply'];
    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
} else {
    $show = "";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Apply Now!!!</title>
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
        
        <h1>Apply Now!!!</h1>
        <div>
            <?php echo $show; ?>
        </div>
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="fname" autocomplete="off"placeholder="Enter firstname" class="form-control" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']?>" required>
        </div>

        <div class="form-group">
            <label>Surname</label>
            <input type="text" name="sname" autocomplete="off"placeholder="Enter Surname" class="form-control" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']?>" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="uname" autocomplete="off"placeholder="Enter Username" class="form-control" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" autocomplete="off"placeholder="Enter Email Address" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>" required>
        </div>

        <div class="form-group">
            <label>Select Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="phone" autocomplete="off"placeholder="Enter Phone Number" class="form-control" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']?>" required>
        </div>

        <div class="form-group">
            <label>Select Country</label>
            <select name="country">
                <option value="">Select Country</option>
                <option value="Nepal">Nepal</option>
                <option value="India">India</option>
                <option value="China">China</option>
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

        <input type="submit" class="btn" name="apply" value="Apply Now">
        <br> <br>
        <p>I already have an account <a href="doctorlogin.php">Click here</a></p>
    </form>
    </div>
</body>

</html>