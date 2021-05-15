<?php 
    include_once "pdo_verbinding.php";



    if (!empty($_POST["login-knop"])) {
        $border_color = "#767575";
        $box_shadow = "0 0 2px #4f4f4f";

        if (!empty($_POST["email"])) {
            $email = $_POST["email"];
            $_SESSION["opleiding"] = $opleiding;
            
            header("Location: page2.php");
        } else {
            $border_color = "red";
            $box_shadow = "0 0 3px red";
        }

        if (!empty($_POST["wachtwoord"])) {
            $wachtwoord = $_POST["wachtwoord"];
            $_SESSION["locatie"] = $locatie;
        } else {
            $border_color = "red";
            $box_shadow = "0 0 3px red";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Sign in</title>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  ?>
        <div class="container-2">
            <div class="box-login">
                <form action="" method="post">
                    <h2>Sign in:</h2>
                    <input type="text" placeholder="E-mail adress..." name="email" class="input-algemeen input-veld-username" style= "border-color: <?php //echo $border_color; ?>;  box-shadow: <?php //echo $box_shadow; ?>;">
                    <br>
                    <input type="password" placeholder="Password..." name="wachtwoord" class="input-algemeen input-veld-password">
                    <br>
                    <input type="submit" name="login-knop" value="Sign in" class="login-knop">
                </form>
            </div>
        </div>
    </div>
</body>
</html>