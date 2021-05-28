<?php 
    include_once "pdo_verbinding.php";

    // $border_color = array("#7675758c", "#7675758c");
    // $box_shadow = array("0 0 1px #4f4f4f", "0 0 1px #4f4f4f");

    // if (isset($_POST["login-knop"])) {

    //     if (!empty($_POST["email"])) {
    //         $email = $_POST["email"];
    //         $_SESSION["email"] = $email;

    //     } else {
    //         $border_color[0] = "red";
    //         $box_shadow[0] = "0 0 3px red";
    //     }

    //     if (!empty($_POST["wachtwoord"])) {
    //         $wachtwoord = $_POST["wachtwoord"];
    //         $_SESSION["wachtwoord"] = $wachtwoord;

    //     } else {
    //         $border_color[1] = "red";
    //         $box_shadow[1] = "0 0 3px red";
    //     }

    //     if (!empty($_POST["email"]) && !empty($_POST["wachtwoord"])) {
    //         // header("Location: page2.php");
    //     }

    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_register.css">
    <title>Sign up</title>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div class="box-login">
                <a class="inloggen" href="login.php">Sign in</a>
                <a class="inloggen" href="">Sign up</a>
                <form action="" method="post">
                    <h2>Welcome!</h2>
                    <p>Create your free account.</p>
                    <input type="text" placeholder="Username" name="username" class="input-algemeen">   <!-- style= "border-color: <?php //echo $border_color[0]; ?>;  box-shadow: <?php //echo $box_shadow[0]; ?>;" -->
                    <input type="password" placeholder="Password" name="wachtwoord" class="input-algemeen">   <!-- style= "border-color: <?php //echo $border_color[1]; ?>;  box-shadow: <?php //echo $box_shadow[1]; ?>;" -->
                    <input type="password" placeholder="Repeat password" name="herhaal_wachtwoord" class="input-algemeen">   <!-- style= "border-color: <?php //echo $border_color[1]; ?>;  box-shadow: <?php //echo $box_shadow[1]; ?>;" -->
                    <select name="role" id="role" class="input-algemeen input-veld-role">
                        <option value="">Register as:</option>
                        <option value="intern">Intern</option>
                        <option value="company">Company</option>
                        <option value="education">Education</option>
                    </select>
                    <hr>
                    <div id="andere-input-velden">
                        <?php include_once "register_inputfields.php";?>
                    </div>


                    <input type="submit" name="login-knop" value="Sign in" class="registreer-knop">
                </form>
            
                <script> 
                       
                </script>
            </div>
        </div>
    </div>
</body>
</html>