<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $plan = $_POST['plan'];
    $batch = $_POST['batch'];
    $date = $_POST['date'];

    $s = "SELECT * FROM plan_assignment WHERE assignment_date = '$date'";
    $result = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($result);

    if($row['batch_id'] != null){
        echo "Batch already assigned";
    }
    else{
        $req = "SELECT * FROM batch WHERE batch_name = '$batch'";
        $q = mysqli_query($con, $req);
        $qt = mysqli_fetch_assoc($q);

        $req1 = "SELECT * FROM plan WHERE plan_name = '$plan'";
        $q1 = mysqli_query($con, $req1);
        $qt1 = mysqli_fetch_assoc($q1);

        $batch_id = intval($qt['batch_id']);
        $plan_id = intval($qt1['plan_id']);

        $assign = "INSERT INTO plan_assignment(assignment_date, batch_id, plan_id) VALUES ('$date', '$batch_id', '$plan_id')";
        mysqli_query($con, $assign);

        echo "Plan Assigned";
    }
?>