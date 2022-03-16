<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $identity = $_POST['identity'];

    if($identity == "Coach"){
        $s = "SELECT * from coach where email = '$mail' && password = '$pass'";
        $login_q = "SELECT coach_name FROM coach where email = '$mail'";
        $q = mysqli_query($con, $login_q);
        $name = mysqli_fetch_assoc($q);
        $name_string = $name['coach_name'];
    }
    else{
        $s = "SELECT * from student where email = '$mail' && password = '$pass'";
        $login_q = "SELECT student_name FROM student where email = '$mail'";
        $q = mysqli_query($con, $login_q);
        $name = mysqli_fetch_assoc($q);
        $name_string = $name['student_name'];
    }

    

    $result = mysqli_query($con, $s);
    


    $num = mysqli_num_rows($result);

    if($num == 1){
        $_SESSION['username'] = $name_string;
        if($identity == "Coach"){
            if($mail == "sameer.subhedar99@gmail.com"){
                header('location:admin_dashboard.php');
            }
            else{
                header('location:coach_dashboard.php');
            }
        }
        else{
            header('location:student_dashboard.php');
        }
    }
    else{
        header('location:login.php');
        echo "Fail";
    }
?>