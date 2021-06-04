<?php 
    include_once "pdo_verbinding.php";

    $border_color = array("#767575a9", "#767575a9");
    $box_shadow = array("0 0 0 #4f4f4f", "0 0 0 #4f4f4f");

    if (isset($_POST["login-knop"])) {

        if (!empty($_POST["username"])) {
            $username = $_POST["username"];

        } else {
            $border_color[0] = "red";
            $box_shadow[0] = "0 0 3px red";
        }

        if (!empty($_POST["password"])) {
            $password = $_POST["password"]; 

        } else {
            $border_color[1] = "red";
            $box_shadow[1] = "0 0 3px red";
        }

        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
            $sql = "SELECT * FROM users WHERE username like :username AND password like :password";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([":username" => $username, ":password" => $password]);

            $count = $stmt->rowCount();
            if ($count > 0) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;

                header("Location: profile_page.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Lato&display=swap" rel="stylesheet">
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