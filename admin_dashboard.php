<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

?>

<html>
    <head>
        <title> Coach Dashboard </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <style type="text/css">
            h1{
                padding: 0;
                margin: 0;
                font-size: 5em;
                text-align: center;
                position: absolute;
                top: 70%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="menu-bar">
            <ul>
                <li class="active"><a href="#">Manage Plans</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="create_plan.html">Create Plan</a></li>
                            <li><a href="assign_plan.php">Assign Plan</a></li>
                            <li><a href="past_plan_coach.php">View Past Plans</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Manage Batches</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="create_batch.html">Add Batch</a></li>
                            <li><a href="assign_batch.php">Assign Batch</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="create_coach.html">Manage Coaches</a></li>
                <li><a href="password.php">Change Password</a></li>
            </ul>    
        </div>

        
        <a class="float-right" href="logout.php"> LOGOUT </a>
        <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
        

    </body>
</html>