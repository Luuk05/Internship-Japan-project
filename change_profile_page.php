<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    } 

    if (!isset($_SESSION["permissionToEdit"]) || $_SESSION["permissionToEdit"] != true) {
        if (isset($_SESSION["adminPermission"])) {
            $_SESSION["permissionToEdit"] = false;
        } else {
            header("Location: profile_page.php");
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
    <link rel="stylesheet" href="css/style_change_profile_page.css">
    <title>Your profile page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
    <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div id="box-profile">
                <form action="" method="post">
                    <?php echo "<h2>Modify your account</h2>"; ?>
                    <input type="text" placeholder="Username" name="username" id="username" class="input-algemeen">  
                    <input type="password" placeholder="Password" name="password" id="password" class="input-algemeen">
                    <input type="password" placeholder="Repeat password" name="repeat_password" id="repeat-password" class="input-algemeen">   
                    <hr>
                    <?php 
                        if ($_SESSION["permissionToEdit"] || $_SESSION["adminPermission"]) {
                            
                            if ($_SESSION["personsRole"] == 1) {
                                include_once "gegevens_intern.php";

                            } else if ($_SESSION["personsRole"] == 2) {
                                include_once "gegevens_company.php";


                            } else {
                                include_once "gegevens_education.php";

                                
                            }
                        } 
                    
                    ?>

                    <input type="submit" value="Save changes" id="submit-button">
                    <p id="data-veranderd"></p>
                </form>
            </div>
        </div>
    </div>
    <script src="js/validatie_userprofile.js"></script>
</body>
</html>