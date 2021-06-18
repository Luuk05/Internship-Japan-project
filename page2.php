<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["filter-knop"])) {
        $border_color = "#767575";
        $box_shadow = "0 0 2px #4f4f4f";

        if (!empty($_POST["study"]) && strlen(trim($_POST['study'])) > 0) {
            $study = trim($_POST["study"]);
            $location = trim($_POST["locatie"]);
    
            $_SESSION["study"] = $study;
            $_SESSION["location"] = $location;
            header("Location: page2.php");
        } else {
            $border_color = "red";
            $box_shadow = "0 0 3px red";
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
    <link rel="stylesheet" href="css/style_page2.css">
    <title>Zoekresultaten</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
        <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div class="filter-box">
                <h1>Filter</h1>
                <form action="" method="post">
                    <input type="text" placeholder="Opleiding..." name="study" class="filter-input-algemeen" style= "border-color: <?php echo $border_color; ?>;  box-shadow: <?php echo $box_shadow; ?>;">
                    <br>
                    <input type="text" placeholder="Locatie..." name="location" class="filter-input-algemeen">
                    <br>
                    <input type="submit" name="filter-knop" value="Filter" class="filter-knop">
                </form>
            </div>
            <div id="resultaten-box">
                <?php 
                    if (empty($_SESSION["study"])) {
                    } else {
                        $study = $_SESSION["study"];
                        $location = $_SESSION["location"];
                        
                        
                        $sql = "SELECT * FROM company WHERE position like :position AND city like :city";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([":position" => "%" . $study . "%", ":city" => "%" . $location . "%"]);
                        $rows = $stmt->fetchAll();
        
                        foreach($rows as $row) {
                            echo "<div class='resultaat-boxen' value='" . $row["user_id"] . "'>
                                    <img src='images/placeholder-100x100.png' alt='img'>
                                    <div class='textbox'>
                                        <h1>" . $row["position"] . "</h1>
                                        <h2>" . $row["companyname"] . "</h2>
                                        <h3>" . $row["city"] . "</h3>
                                        <p>" . $row["positiontext"] . "</p>
                                    </div> 
                                </div>";
                        }        
                    }
        
                    
                ?>          
            </div>
        </div>
    </div>
    <script src="js/error_geen_resultaten_page2.js"></script>
    <script src="js/check_clicked_resultaat.js"></script>
</body>
</html>