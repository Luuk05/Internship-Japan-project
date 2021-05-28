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
                    <h3>I am a:</h3>
                    <select name="role" id="role" class="input-algemeen input-veld-role">
                        <option value="intern">Intern</option>
                        <option value="company">Company</option>
                        <option value="education">Education</option>
                    </select>
                    <hr>
                    <input type="email" placeholder="Email" name="email" class="input-algemeen">
                    <div id="names">
                        <input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft">
                        <input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft">
                    </div>
                    <input type="date" placeholder="Date of birth" name="dateofbirth" class="input-algemeen input-helft">
                    <br>
                    <select name="nationalityid" id="nationality" class="input-algemeen input-helft">
                        <option value="" disabled selected>Nationality</option>
                        <option value="">Etwas anderes</option>
                    </select>
                    <hr>
                    <select name="countryid" id="country" class="input-algemeen input-helft">
                        <option value="" disabled selected>Country</option>
                        <option value="">Etwas anderes</option>
                    </select>
                    <input type="text" placeholder="Adress" name="streetadress" class="input-algemeen">
                    <div id="input-postal-city">
                        <input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft">
                        <input type="text" placeholder="City" name="city" class="input-algemeen input-helft">
                    </div>
                    <hr>
                    <input type="text" placeholder="Study" name="study" class="input-algemeen">
                    <input type="text" placeholder="Field of studies" name="fieldofstudies" class="input-algemeen">
                    <input type="text" placeholder="Graduated from" name="graduatedfrom" class="input-algemeen">
                    <select name="currentlystudent" id="" class="input-algemeen input-helft">
                        <option value="" disabled selected>Currently student?</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <select name="seekinginternship" id="" class="input-algemeen input-helft">
                        <option value="" disabled selected>Seeking internship?</option>
                        <option value="yes on-site">Yes, on-site</option>
                        <option value="yes remote">Remote</option>
                        <option value="yes temporarily remote">Temporarily remote</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                    <select name="openforrealemplyoment" id="" class="input-algemeen input-helft">
                        <option value="" disabled selected>Open for real employment?</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    
                    <br>
                    <select name="languages" id="" class="input-algemeen input-helft">
                        <option value="" disabled selected>Languages</option>
                        <option value="">Etwas anderes</option>
                    </select>
                    <hr>
                    <textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-profile-text"></textarea>
                    <input type="text" placeholder="Profile image link" name="profileimage" class="input-algemeen">
                    <input type="text" placeholder="Profile Video link" name="profilevideo" class="input-algemeen">
                    <input type="text" placeholder="Social media link &emsp; e.g. LinkedIn" name="socialmedia" class="input-algemeen">
                   
                   
                    <br>
                    <input type="submit" name="login-knop" value="Sign in" class="registreer-knop">
                </form>
            
                <script> 
                        x = document.getElementById("role");
                        if (x.value == "intern") {
                            
                        }

                        x.onchange = function() {
                            
                        };

                </script>
            </div>
        </div>
    </div>
</body>
</html>