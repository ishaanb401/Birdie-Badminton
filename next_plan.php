<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $cDate = date('Y-m-d');

    $sname = $_SESSION['username'];

    $req = "SELECT * FROM student WHERE student_name = '$sname'";
    $q = mysqli_query($con, $req);
    $qt = mysqli_fetch_assoc($q);
    $batch_id = intval($qt['batch_id']);

    $req1 = "SELECT * FROM plan_assignment WHERE batch_id = '$batch_id' AND datediff(assignment_date, '$cDate') >= 0
    ORDER BY datediff(assignment_date, '$cDate') ASC LIMIT 1";
    $q1 = mysqli_query($con, $req1);
    $num = mysqli_num_rows($q1);
    $qt1 = mysqli_fetch_assoc($q1);
    $plan_id = intval($qt1['plan_id']);

    if($num == 0){
        $pname = "No Plan Assigned Yet";
        $pfocus = "TBD";
        $pwarmup = "TBD";
        $pdrills = "TBD";
        $plikes = "NA";
    }
    else{
        $req2 = "SELECT * FROM plan WHERE plan_id = '$plan_id'";
        $q2 = mysqli_query($con, $req2);
        $qt2 = mysqli_fetch_assoc($q2);
        $pname = strval($qt2['plan_name']);
        $pfocus = strval($qt2['focus']);
        $pwarmup = strval($qt2['warmup']);
        $pdrills = strval($qt2['drills']);
        $plikes = strval($qt2['likes']);
    }

    if($plikes == null){
        $plikes = "0";
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Next Plan</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <ul>
                <li><a href="#name">Plan Name</a></li>
                <li><a href="#focus">Plan Focus</a></li>
                <li><a href="#warmup">Warmup</a></li>
                <li><a href="#drills">Drills</a></li>
                <li><a href="#likes">View Likes</a></li>
                <li><a href="#like">Like this Plan</a></li>
            </ul>
        </nav>
        <section id="name">
            <h1><?php echo $pname; ?></h1>
        </section>
        <section id="focus">
            <h1>Focus</h1>
            <p><?php echo $pfocus; ?></p>
        </section>
        <section id="warmup">
            <h1>Warmup</h1>
            <p><?php echo $pwarmup; ?></p>
        </section>
        <section id="drills">
            <h1>Drills</h1>
            <p><?php echo $pdrills; ?></p>
        </section>
        <section id="likes">
            <h1>Likes: <?php echo $plikes; ?></h1>
        </section>
        <section id="like">
            <?php
                $a = "UPDATE plan SET likes = likes + 1 WHERE plan_name = '$pname'";
                mysqli_query($con, $a);
            ?>
        </section>
    </div>
</body>
</html>        