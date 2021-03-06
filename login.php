<?php 
    session_start();
    include_once "pdo_verbinding.php";

    $border_color = array("#767575a9", "#767575a9");
    $box_shadow = array("0 0 0 #4f4f4f", "0 0 0 #4f4f4f");

    if (isset($_SESSION["permissionToEdit"]) && $_SESSION["permissionToEdit"] == true) { //als je al ingelogd bent hoef je niet meer op deze pagina te komen
        header("Location: profile_page.php");
    }

    if (isset($_POST["login-knop"])) {  

        if (!empty($_POST["username"])) {
        
        } else {
            $border_color[0] = "red";
            $box_shadow[0] = "0 0 3px red";
        }

        if (!empty($_POST["password"])) {

        } else {
            $border_color[1] = "red";
            $box_shadow[1] = "0 0 3px red";
        }

        if (!empty($_POST["username"]) && !empty($_POST["password"])) {  //als de knop is geklikt en de velden username en password zijn niet leeg dan:
            try {
                $username = $_POST["username"];
                $password = $_POST["password"]; 


                $sql = "SELECT * FROM user WHERE username like :username";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([":username" => $username]);
                $row = $stmt->fetch();         //haal alles uit user waar username gelijk is aan username

                $count = $stmt->rowCount();
                if ($count > 0) {
                    $existingPasswordFromDb = $row["password"];

                    if (password_verify($password, $existingPasswordFromDb)) {  //als password gelijk is aan password in de db maak allemaal sessions variabelen die je op de volgende pagina's nodig zult hebben
                        
                        $personsRole = $row["role"];                          
                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $existingPasswordFromDb;
                        $_SESSION["permissionToEdit"] = true;
                        $_SESSION["personsRole"] = $personsRole;
                        $_SESSION["ownUsername"] = $username;
                        $_SESSION["ownRole"] = $personsRole;

        
                        header("Location: profile_page.php");  //redirect naar volgende pagina
                        
                    }
                }
            } catch(Exception $e) {
                
            } 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Sign in</title>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div class="box-login">
                <a class="inloggen" href="">Sign in</a>
                <a class="inloggen" href="registreer.php">Sign up</a>
                <form action="" method="post">
                    <h2>Welcome back!</h2>
                    <p>Log in to your account.</p>
                    <input type="text" placeholder="Username" name="username" class="input-algemeen input-veld-username" style= "border-color: <?php echo $border_color[0]; ?>;  box-shadow: <?php echo $box_shadow[0]; ?>;">
                    <br>
                    <input type="password" placeholder="Password..." name="password" class="input-algemeen input-veld-password" style= "border-color: <?php echo $border_color[0]; ?>;  box-shadow: <?php echo $box_shadow[0]; ?>;">
                    <br>
                    <input type="submit" name="login-knop" value="Sign in" class="login-knop">
                    <h3><a href="registreer.php">Create account</a></h3>
                </form>
            
            </div>
        </div>
    </div>
</body>
</html>