<?php
session_start();
include("../include/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include("../include/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php include("sidenav.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="my-3">Patient Dashboard</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Profile</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="profile.php">
                                            <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">Book Appointment</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="appointment.php">
                                            <i class="fas fa-calendar-check fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Invoice</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 

                if (isset($_POST['send'])) {
                $title = $_POST['send'];
                $message = $_POST['message'];
                if (empty($title)) {

                    }else if(empty($message)){
                    }else{
                        $user = $_SESSION['patient'];
                        $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

                        $res = mysqli_query($connect,$query);
                        if ($res) {
                            echo "<script>alert('You have sent your Report')</script>";
                        }
                }
            }
                
                
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" rows="3" placeholder="Enter Message"></textarea>
                                    </div>
                                    <input type="submit" name="send" class="btn btn-success my-2" value="Send Report">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
