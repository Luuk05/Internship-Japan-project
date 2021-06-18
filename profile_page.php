<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
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
                    if (isset($_SESSION["permissionToEdit"]) && $_SESSION["permissionToEdit"] == true ) {   //laat view_profile_page.php zien en geef meer buttons weer als de gebruiker ook meer rechten heeft
                        if (isset($_SESSION["ownUsername"]) && $_SESSION["username"] == $_SESSION["ownUsername"]) {
                            
                            
                            echo '<script>document.getElementById("form").innerHTML += \'<input type="submit" value="Modify account" name="redirect-button" id="redirect-button" class="no-wrap"><input type="submit" value="Log out" name="redirect-button" id="logout-button" class="no-wrap">\';

                            $("#redirect-button").click(function(event) {
                                event.preventDefault();

                                window.location.href = "change_profile_page.php";
                            });
    
                            $("#logout-button").click(function(event) {
                                event.preventDefault();

                                $.ajax({
                                    url: "logout.php",
                                    type: "POST",
                                    success: function(data) {
                                        console.log("Logout succes");
                                        window.location.href = "login.php";
                                    }
                                });
                                
                            });
                            
                            </script>';
                        }
                    } 
                    
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>