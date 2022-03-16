<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $name = $_POST['user'];
    $pass = $_POST['password'];
    $mail = $_POST['email'];

    

    $s = "SELECT * from student where email = '$mail'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo "Username already taken";
    }
    else{
        $reg = "INSERT INTO student(student_name, email, password) VALUES ('$name', '$mail', '$pass')";
        mysqli_query($con, $reg);
        header('location:login.php');
    }
?>