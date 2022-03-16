<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $name = $_POST['name'];
    $focus = $_POST['focus'];
    $warmup = $_POST['warmup'];
    $drill = $_POST['drill'];

    $s = "SELECT * from plan where plan_name = '$name'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo"Plan Name already taken";
    }
    else{
        $reg = "INSERT INTO plan(plan_name, focus, warmup, drills) VALUES ('$name', '$focus', '$warmup', '$drill')";
        mysqli_query($con, $reg);
        echo"Plan Added";
    }
?>