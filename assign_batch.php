<!DOCTYPE html>
<html lang="en">

<?php
    $mysqli = new mysqli('localhost', 'root', '123456', 'userregistration');

    $resultSet = $mysqli->query("SELECT batch_name FROM batch");
?>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Ishaan Bhargava">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autocomplete Search Box</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
                <form action="assign.php" method="POST" class="form-inline p-3">
                    <input type="text" name="search" id="search" class="form-control form-contol-lg rounded-0 border-info" placeholder="Search..."  style="width: 100%;">
                    <div class="col-md-8">
                        <div class="list-group" id="show-list">
                            <a href="#" class="list-group-item list-group-item-action border-1"></a>
                        </div>
                    </div>

                    <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
                        <select name="batches">
                            <?php
                                while($rows = $resultSet->fetch_assoc()){
                                    $batch_name = $rows['batch_name'];
                                    echo "<option value='$batch_name'>$batch_name</option>";
                                }
                            ?>
                        </select>
                    </div> 

                    <button type="submit" class="btn btn-primary">Assign</button>
                </form>
            </div>
        </div>
        

        
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#search").keyup(function(){
                var searchText = $(this).val();
                if(searchText != ''){
                    $.ajax({
                        url:'search.php',
                        method:'post',
                        data:{query:searchText},
                        success:function(response){
                            $("#show-list").html(response);
                        }
                    });
                }
                else{
                    $("#show-list").html('');
                }
            });
            $(document).on('click', 'a', function(){
                $("#search").val($(this).text());
                $("#show-list").html('');
            });
        });
    </script>
</body>
</html>