<?php
include("include/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS Homepage</title>
    <style>
        .home {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            
        }

        .home .image {
            flex: 1 1 45rem;
            order: 1
        }

        .home .image img {
            width: 100%;
        }

        .home .content {
            flex: 1 1 45rem;
            order: 2;
            font-size: 3rem; 
            
        }
    </style>
</head>

<body>
   <!--home section starts-->
   <div class="home">
        <div class="image">
            <img src="img/Doctors.png" alt="Doctor Image">
        </div>
        <div class="content">
            <h3>Stay safe, stay healthy</h3>
            <h3>We Care for you.</h3>
           
        </div>
    </div>
    <!--home section ends-->
</body>
</html>
