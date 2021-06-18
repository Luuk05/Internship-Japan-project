<?php 
    session_start();       //start sessie zodat pagina variabelen naar de andere pagina gestuurd kunnen worden
    include_once "pdo_verbinding.php";   ///maak verbinding met pdo zodat je CRUD kunt uitvoeren op database

    if (!isset($_SESSION["roleForAdmin"])) {  //als de sessie (door andere pagina gemaakt) niet is bestaat dan stuur door naar andere pagina
        header("Location: admin_panel.php");
    }

    $role = $_SESSION["roleForAdmin"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_admin_panel_zoek.css">
    <title>Zoekresultaten</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
        <div class="container-2">
            <div id="resultaten-box">
                <?php 
                    $sql = "SELECT * FROM $role WHERE 1"; 
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();        
                    $rows = $stmt->fetchAll();     //haal alles uit database waar de role intern, company of education is 

                    $counter = 0;
                    foreach($rows as $row) {  //tel alle rows en laat zien hoeveel results er dus zijn
                        $counter++;
                    }
                    echo "<div class='center'><h3>" . $counter . " results</h3></div>";
                    echo "<br>";

                    if ($role == "intern") {  //check role want bij de ene role moet je andere info weergeven als bij de andere
                        foreach($rows as $row) {  //loop door alle rows heen. laat ondersaande waardes zien en zet value: user_id. Dit is voor als op de div word gelikt dat de pagina redirect naar de profiel pagina van dat user id en dus van die user
                            echo "<div class='resultaat-boxen' value='" . $row["user_id"] . "'>
                                    <img src='images/placeholder-100x100.png' alt='img'>
                                    <div class='textbox'>
                                        <h1>Full name: " . $row["firstname"] . " " . $row["surname"] . "</h1>
                                        <h2>Email: " . $row["email"] . "</h2>
                                        <h3>Study: " . $row["study"] . "</h3>
                                        <p>City: " . $row["city"] . "</p>
                                    </div> 
                                </div>";
                        }

                    } else if ($role == "company") { 
                        foreach($rows as $row) {
                            echo "<div class='resultaat-boxen' value='" . $row["user_id"] . "'>
                                    <img src='images/placeholder-100x100.png' alt='img'>
                                    <div class='textbox'>
                                        <h1>Company name: " . $row["companyname"] . "</h1>
                                        <h2>Name contactperson: " . $row["contactperson"] . "</h2>
                                        <h3>Email contactperson: " . $row["email_contactperson"] . "</h3>
                                        <p>City of company: " . $row["city"] . "</p>
                                    </div> 
                                </div>";
                        }
                    } else {
                        foreach($rows as $row) {
                            echo "<div class='resultaat-boxen' value='" . $row["user_id"] . "'>
                                    <img src='images/placeholder-100x100.png' alt='img'>
                                    <div class='textbox'>
                                        <h1>Education name: " . $row["educationname"] . "</h1>
                                        <h2>Name contactperson: " . $row["contactperson"] . "</h2>
                                        <h3>Email contactperson: " . $row["email_contactperson"] . "</h3>
                                        <p>City of education: " . $row["city"] . "</p>
                                    </div> 
                                </div>";
                        }
                    }        
                ?>

            </div>
        </div>
    </div>
    <script src="js/check_clicked_admin_zoek.js"></script> 
</body>
</html>