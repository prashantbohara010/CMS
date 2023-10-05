<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Patient Profile</title>
</head>

<body>
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-mid-12">
            <div class="row">
                <div class="col-mid"-2 style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-mid-10">
                    <div class="col-mid-12">
                        <div class="row">
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>