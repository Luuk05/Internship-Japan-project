<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (!isset($_SESSION[""])) {
        $_SESSION["opleiding"] = "";
        $_SESSION["locatie"] = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
    <title>Zoekresultaten</title>
</head>
<body>
    <div class="container-1">
        <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div class="filter-box">
                <h1>Filter</h1>
                <form action="" method="post">
                    <input type="text" placeholder="Opleiding..." name="opleiding" class="filter-input-algemeen">
                    <br>
                    <input type="text" placeholder="Locatie..." name="locatie" class="filter-input-algemeen">
                    <br>
                    <input type="submit" name="filter-knop" value="Filter" class="filter-knop">
                </form>
            </div>
            <div class="resultaten">
                <?php 
                    if (empty($_SESSION["opleiding"])) {

                    } else {
                        $opleiding = $_SESSION["opleiding"];
                        $locatie = $_SESSION["locatie"];

                        // $sql = "SELECT * FROM posts2 WHERE opleiding like :opleiding AND locatie like :locatie";
                        // $stmt = $pdo->prepare($sql);
                        // $stmt->execute([":opleiding" => "%" . $opleiding . "%", ":locatie" => "%" . $locatie . "%"]);
            
                        // foreach($stmt as $row) {
                        //     echo 
                        //         "<div class='resultaat-boxen'>
                        //             <img src='images/placeholder-100x100.png' alt='img'>
                        //             <div class='textbox'>
                        //                 <h1>"; echo $row["opleiding"]; echo "</h1>
                        //                 <h2>"; echo $row["bedrijf"]; echo "</h2>
                        //                 <h3>"; echo $row["locatie"]; echo "</h3>
                        //                 <p>"; echo $row["body"]; echo "</p>
                        //             </div> 
                        //         </div>";
                        // }
                    }
        
                    
                ?>
                <div class="resultaat-boxen">
                    <img src="images/placeholder-100x100.png" alt="img">
                    <div class="textbox">
                        <h1>Software developer niveau 4<!--Opleiding. tekst tekst tekst--></h1>
                        <h2>Google inc. Alphabet B.v. <!--Bedrijfsnaam. tekst tekst tekst--></h2>
                        <h3>Locatie</h3>
                        <p>Tekst tekst tekst voorbeeld voorbeeld<!--Informatie over het bedrijf en wat ze zoeken. tekst tekst tekst--></p>
                    </div> 
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>