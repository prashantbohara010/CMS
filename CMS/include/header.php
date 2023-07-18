<!DOCTYPE html>
<html>
<head>
<title>Header</title>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.main.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Clinic Management System</h5>
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
        <?php
if (isset($_SESSION['admin'])){
    $user = $_SESSION['admin'];
    echo '
    <li class="nav-item text-white"><a href="#" class="nav-link text-white">'.$user.'</a></li>
    <li class="nav-item text-white"><a href="#" class="nav-link text-white">Logout</a></li>';
} else {
    echo '
    <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
    <li class="nav-item text-white"><a href="" class="nav-link text-white">Doctor</a></li>
    <li class="nav-item text-white"><a href="" class="nav-link text-white">Patient</a></li>';
}
?>


        </ul>
    </nav>

</body>

</html>