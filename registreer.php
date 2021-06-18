<?php 
    session_start();
    include_once "pdo_verbinding.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_register.css">
    <title>Sign up</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div id="box-login">
                <a class="inloggen" href="login.php">Sign in</a>
                <a class="inloggen" href="">Sign up</a>
                <form action="" method="post">
                    <h2>Welcome!</h2>
                    <p>Create your free account.</p>
                    <input type="text" placeholder="Username" name="username" id="username" class="input-algemeen">  
                    <input type="password" placeholder="Password" name="password" id="password" class="input-algemeen">
                    <input type="password" placeholder="Repeat password" name="repeat_password" id="repeat-password" class="input-algemeen">   
                    <select name="role" id="role" class="input-algemeen input-veld-role">
                        <option value="">Register as:</option>
                        <option value="intern">Intern</option>
                        <option value="company">Company</option>
                        <option value="education">Education</option>
                    </select>
                    <hr>


                    <input type="submit" name="registreer-knop" value="Sign in" class="registreer-knop" id="submit-button">
                    <p id="account-gemaakt"></p>
                </form>
            </div>
        </div>
    </div>
    <script src="js/validatie_registreer.js"></script>
</body>
</html>