<?php 
    include_once "pdo_verbinding.php";

    // $border_color = array("#7675758c", "#7675758c");
    // $box_shadow = array("0 0 1px #4f4f4f", "0 0 1px #4f4f4f");

    // if (isset($_POST["registreer-knop"])) {
    //     if (!empty($_POST["username"])) {
    //         $username = $_POST["username"];
    //     } else {
    //         //rode kleur laten zien
    //     }

    //     if (!empty($_POST["password"])) {
    //         $password = $_POST["password"];
    //     } else {
    //         //rode kleur laten zien
    //     }

    //     if (!empty($_POST["repeat_password"])) {
    //         $repeat_password = $_POST["repeat_password"];
    //     } else {
    //         //rode kleur laten zien
    //     }

    //     if ($_POST["role"] == "intern" || $_POST["role"] == "company" || $_POST["role"] == "education") {
    //         $role = $_POST["role"];

    //         if ($role == "intern") {

    //         } else if ($role == "company") {

    //         } else { //$role == "education"

    //         }

    //     } else {
    //         //rode kleur laten zien
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <input type="text" placeholder="Username" name="username" id="username" class="input-algemeen">   <!-- style= "border-color: <?php //echo $border_color[0]; ?>;  box-shadow: <?php //echo $box_shadow[0]; ?>;" -->
                    <input type="password" placeholder="Password" name="password" id="password"class="input-algemeen">   <!-- style= "border-color: <?php //echo $border_color[1]; ?>;  box-shadow: <?php //echo $box_shadow[1]; ?>;" -->
                    <input type="password" placeholder="Repeat password" name="repeat_password" class="input-algemeen">   <!-- style= "border-color: <?php //echo $border_color[1]; ?>;  box-shadow: <?php //echo $box_shadow[1]; ?>;" -->
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


                    <input type="submit" name="registreer-knop" value="Sign in" class="registreer-knop" id="submit-button">
                </form>
            
                <script>
                       $("#username").on("input", function() {
                            $("#username").removeAttr("style");
                       });
                     
                
                       $("#submit-button").on("click", function(event) {
                            event.preventDefault();
                            if ($("#username").val() != "" ) {
                                console.log("1");
                                var username = $("#username").val();
                                var password = $("#password").val();

                                $.ajax({
                                    url: "test.php",
                                    type: "POST",
                                    data: 
                                        {
                                         "name": username,
                                         "password": password
                                        },
                                    success: function(data) {
                                        myObj = JSON.parse(data);
                                        console.log(myObj[0]);
                                    }, 
                                });
                            } else {
                                $("#username").css("border-color", "red");
                            }
                       });
                </script>
            </div>
        </div>
    </div>
</body>
</html>