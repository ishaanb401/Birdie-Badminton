<?php
    $mysqli = new mysqli('localhost', 'root', '123456', 'userregistration');

    $resultSet = $mysqli->query("SELECT plan_name FROM plan");
    $resultSet1 = $mysqli->query("SELECT batch_name FROM batch");
?>

<html>
    <head>
        <title>Create Plan</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body{
                display: flex;
                height: 100vh;
                justify-content: center;
                align-items: center;
            }

            .container{
                max-width: 700px;
                width: 100%;
                padding: 25px 30px;
                border-radius: 5px;
                background: white;
            }

            .container .title{
                font-size: 25px;
                font-weight: 500;
            }

            .container .title::before{
                content: '';
                position: absolute;
                height: 3px;
                width: 30px;
                background: linear-gradient(135deg, #71b7e6, #9b59b6);
            }

            .container form .plan-details{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                margin: 20px 0 12px 0;
            }

            form .plan-details .input-box{
                margin-bottom: 15px;
                width: calc(100% / 2 - 20px);
            }

            .plan-details .input-box .details{
                display: block;
                font-weight: 500;
                margin-bottom: 5px;
            }

            .plan-details .input-box input{
                height: 45px;
                width: 100%;
                outline: none;
                border-radius: 5px;
                border: 1px solid #ccc;
                padding-left: 15px;
                font-size: 16px;
                border-bottom-width: 2px;
                transition: all 0.3s ease;
            }

            .plan-details .input-box input:focus,
            .plan-details .input-box input:valid{
                border-color: #9b59b6;
            }

            form .button{
                height: 45px;
                margin: 45px 0;
            }

            form .button input{
                height: 100%;
                width: 100%;
                outline: none;
                color: white;
                border: none;
                font-size: 18px;
                font-weight: 500;
                letter-spacing: 1px;
                border-radius: 5px;
                background: linear-gradient(135deg, #71b7e6, #9b59b6);
            }

            form .button input:hover{
                background: linear-gradient(-135deg, #71b7e6, #9b59b6);
            }

            @media (max-width: 584px) {
                .container{
                    max-width: 100%;
                }

                form .user-details .input-box{
                    margin-bottom: 15px;
                    width: 100%;
                }

                .container form .user-details{
                    max-height: 300px;
                    overflow-y: scroll;
                }

                .user-details::-webkit-scrollbar{
                    width: 0;
                }
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="title">Assign Plan</div>
            <form action="ass_plan.php" method="POST">
                <div class="plan-details">
                    <div class="input-box">
                        <span class="details">Plan Name</span>
                        <select name="plan">
                            <?php
                                while($rows = $resultSet->fetch_assoc()){
                                    $plan_name = $rows['plan_name'];
                                    echo "<option value='$plan_name'>$plan_name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Batch Name</span>
                        <select name="batch">
                            <?php
                                while($rows = $resultSet1->fetch_assoc()){
                                    $batch_name = $rows['batch_name'];
                                    echo "<option value='$batch_name'>$batch_name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="date" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Assign Plan">
                </div>
            </form>
        </div>
    </body>
</html>