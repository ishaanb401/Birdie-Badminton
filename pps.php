<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '123456');

    mysqli_select_db($con, 'userregistration');

    $plan_name = $_POST['plan'];

    $req = "SELECT * FROM plan WHERE plan_name = '$plan_name'";
    $q = mysqli_query($con, $req);
    $qt = mysqli_fetch_assoc($q);
    $pname = strval($qt['plan_name']);
    $pfocus = strval($qt['focus']);
    $pwarmup = strval($qt['warmup']);
    $pdrills = strval($qt['drills']);
    $plikes = strval($qt['likes']);

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
                $a = "UPDATE plan SET likes = likes + 1 WHERE plan_name = '$plan_name'";
                mysqli_query($con, $a);
            ?>
        </section>
    </div>
</body>
</html>