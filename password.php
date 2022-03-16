<?php
    session_start();
    header('location:change_password.html');

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $name = $_SESSION['username'];

    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['new_pwd'];

    $val = "SELECT * FROM student WHERE student_name = '$name'";
    $result = mysqli_query($con, $val);
    $num = mysqli_num_rows($result);

    

    if($pwd == $pwd2){
        if($num == 1){
            $reg = "UPDATE student SET password = $pwd WHERE student_name = '$name'";
        }
        else{
            $reg = "UPDATE coach SET password = $pwd WHERE coach_name = '$name'";
        }
        mysqli_query($con, $reg);
        echo"Change Successful";
    }
    else{
        echo"Passwords do not match";
    }
?>