<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
include("../include/header.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="padding-left: 0; padding-right: 0;">
            <?php
            include("sidenav.php");
            include("../include/connection.php");
            ?>
        </div>

        <div class="col-md-10">
            <h4 class="my-2">Admin Dashboard</h4>
            <div class="col-md-12 my-1">
                <div class="row">
                    <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                        <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-9">
                                <?php
                                $ad=mysqli_query($connect,"SELECT * FROM admin");
                                $num=mysqli_num_rows($ad);
                                ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                <h5 class="text-white">Total Admin</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="admin.php"><i class="fa-solid fa-gear fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                    <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-9">
                                <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                <h5 class="text-white">Total Doctors</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="#"><i class="fa-solid fa-user-doctor fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                    <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-9">
                                <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                <h5 class="text-white">Total Patients</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="#"><i class="fa-solid fa-bed fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                    <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-9">
                                <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                <h5 class="text-white">Total Report</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="#"><i class="fa-regular fa-flag fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                    <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-9">
                                <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                <h5 class="text-white">Total Job Request</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="#"><i class="fa-solid fa-book-open fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                    <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-9">
                                <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                <h5 class="text-white">Total Income</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="#"><i class="fa-solid fa-money-check fa-3x text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
