<?php 
    $con = new mysqli("localhost", "root", "123456", "userregistration");
    if($con->connect_error){
        die("Failed to connect!".$con->connect_error);
    }
    if(isset($_POST['query'])){
        $inpText = $_POST['query'];
        $query = "SELECT student_name FROM student WHERE student_name LIKE '%$inpText%'";
        $result = $con->query($query);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['student_name']."</a>";
            }
        }
        else{
            echo "<p class = 'list-group-item border-1'>No Record</p>";
        }
    }
?>