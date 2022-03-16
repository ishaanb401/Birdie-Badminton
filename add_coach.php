<?php
    session_start();
    header('location:create_coach.html');

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $name = $_POST['user'];
    $pass = $_POST['password'];
    $mail = $_POST['email'];

    

    $s = "SELECT * from coach where email = '$mail'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo "Coach already registered";
    }
    else{
        $reg = "INSERT INTO coach(coach_name, email, password) VALUES ('$name', '$mail', '$pass')";
        mysqli_query($con, $reg);
    }
?>