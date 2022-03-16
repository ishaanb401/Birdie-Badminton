<html>
    <head>
        <title>Login and Registration Form Design</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="login-page">
            <div class="form">
                <form class="register-form" action="registration.php" method="post">
                    <input type="text" placeholder="Name" name="user" class="form-control" required >
                    <input type="email" placeholder="Email" name="email" class="form-control" required >
                    <input type="text" placeholder="Password" name="password" class="form-control" required >
                    <button type="submit" class="btn btn-primary">Create</button>
                    <p class="message">Already Registered? <a href="#">Login</a></p>
                </form>
    
                <form class="login-form" action="validation.php" method="post">
                    <input type="email" placeholder="Email" name="email" class="form-control" required/>
                    <input type="password" placeholder="Password" class="form-control" name="password" required/>
                    <select name="identity" id="identity" required class="form-control">
                        <option value="Coach">Coach</option>
                        <option value="Student">Student</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="message">Not Registered? <a href="#"> Register</a></p>
                </form>
            </div>
        </div>

        <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>

        <script>
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        </script>
    </body>
</html>