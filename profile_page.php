<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        // exit();
    } 

    if (!isset($_SESSION["permissionToEdit"])) {
        $_SESSION["permissionToEdit"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_profile_page.css">
    <title>Your profile page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div id="box-profile">
                <form id="form" action="" method="post">
                    <h2>View this page</h2>
                    <?php 
                    include_once "view_profile_page.php";
                    if ($_SESSION["permissionToEdit"]) {
                        echo '<script>document.getElementById("form").innerHTML += \'<div id="page-width"><div id="center-button"><input type="submit" value="Modify account" name="redirect-button" id="redirect-button" class="no-wrap"></div></div>\';</script>';
                    
                        if (isset($_POST["redirect-button"])) {
                            header("Location: change_profile_page.php");
                        }
                    } 
                    
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>