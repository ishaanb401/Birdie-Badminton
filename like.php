<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $plan_name = $_POST['plan'];

    $req = "UPDATE plan SET likes = likes + 1 WHERE plan_name = '$plan_name' ";
?>
