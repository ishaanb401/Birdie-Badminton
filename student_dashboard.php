<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>

<html>
    <head>
        <title> Student Dashboard </title>
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
                <li class="active"><a href="past_plan_student.php">View Past Plans</a></li>
                <li><a href="next_plan.php">View Upcoming Plan</a></li>
                <li><a href="change_password.html">Change Password</a></li>
            </ul>    
        </div>

        
        <a class="float-right" href="logout.php"> LOGOUT </a>
        <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
        

    </body>
</html>