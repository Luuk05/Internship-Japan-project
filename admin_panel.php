<?php 
    session_start();        //start sessie zodat pagina variabelen naar de andere pagina gestuurd kunnen worden
    include_once "pdo_verbinding.php";      ///maak verbinding met pdo zodat je CRUD kunt uitvoeren op database

    if (isset($_POST["search-button"])) { 
        if ($_POST["role"] != "") {
            $role = $_POST["role"];
            $_SESSION["roleForAdmin"] = $role; //andere session naam zodat het niet in de knoei kan komen metde rest van de sessions
        
            header("Location: admin_panel_zoek.php");  //stuur door als de knop gedrukt word en de role niet leeg is met andere woorden niet geselecteerd
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> <!-- link naar font van google -->
    <link rel="stylesheet" href="css/style_admin_panel.css">  <!-- connectie met css  -->
    <title>Your profile page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!-- jquery verbinding -->
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div id="box-search">
                <form id="form" action="" method="post">
                    <h2>Admin panel</h2>
                    <select name="role" id="role" class="input-algemeen">
                        <option value="">Search for:</option>
                        <option value="intern">Intern</option>
                        <option value="company">Company</option>
                        <option value="education">Education</option>
                    </select>
                    <br>
                    <br>
                    <div class="center">
                        <input type="submit" name="search-button" id="search-button" value="Search" class="search-knop">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>