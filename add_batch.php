<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $name = $_POST['name'];

    $s = "SELECT * from batch where batch_name = '$name'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo"Batch Name already taken";
    }
    else{
        $reg = "INSERT INTO batch(batch_name) VALUES ('$name')";
        mysqli_query($con, $reg);
        echo"Registration Successful";
    }
?>