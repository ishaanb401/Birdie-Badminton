<?php
    session_start();
    #header('location:assign_batch.php');

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $name = $_POST['search'];
    $batch = $_POST['batches'];

    $s = "SELECT * FROM student WHERE student_name = '$name'";
    $result = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($result);

    if($row['batch_id'] != null){
        echo "Batch already assigned";
    }
    else{
        $req = "SELECT * FROM batch WHERE batch_name = '$batch'";
        $q = mysqli_query($con, $req);
        $qt = mysqli_fetch_assoc($q);

        $batch_id = intval($qt['batch_id']);

        $assign = "UPDATE student SET batch_id = $batch_id WHERE student_name = '$name'";
        mysqli_query($con, $assign);

        echo "Batch Assigned";
    }
    


?>