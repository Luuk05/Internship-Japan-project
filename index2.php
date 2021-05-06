<?php
    session_start();

    if (!empty($_POST["zoek-knop"])) {
        $border_color = "#767575";
        $box_shadow = "0 0 2px #4f4f4f";

        if (!empty($_POST["opleiding"])) {
            $opleiding = $_POST["opleiding"];
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
    <link rel="stylesheet" href="css/style_index2.css">
    <title>Internship Japan</title>
</head>
<body>
    <div class="container-1">
        <nav>
            <ul>
                <!-- <img src="images/internshiplogo.png" alt="Intership Japan"> -->
                <li><a href="">For Employers</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">F.A.Q.</a></li>
            </ul>
            <button>Sign in/up</button>
        </nav>
        <div class="container-2">
            <div class="box1">
                <form action="" method="post">
                    <h2>Search:</h2>
                    <input type="text" placeholder="Opleiding..." name="opleiding" class="input-veld-opleiding input-algemeen" style= "border-color: <?php echo $border_color; ?>;  box-shadow: <?php echo $box_shadow; ?>;">
                    <br>
                    <input type="text" placeholder="Locatie..." name="locatie" class="input-veld-locatie input-algemeen">
                    <br>
                    <input type="submit" name="zoek-knop" value="Search!" class="search-knop">
                
                    <div class="sign-box">
                        <h3>Sign in</h3>
                        <div class="line"></div>
                        <h3>Sign up</h3>
                    </div>
                    <h2 class="voorgestelde-stages-header">Voorgestelde stages:</h2>
                    <div class="voorgestelde-stages">
                        <input type="submit" name="knopvoorstel1" value="Knop-voorstel-stage" class="voorstel-stage-knop">
                        <input type="submit" name="knopvoorstel2" value="Knop-voorstel-stage" class="voorstel-stage-knop">
                        <input type="submit" name="knopvoorstel3" value="Knop-voorstel-stage" class="voorstel-stage-knop">
                    </div>
                </form> 
            </div>
            <div class="box2">
                <div class="recente-stages-balk">
                    <h2>Recent opportunities:</h2>
                </div>
                <div class="lege-ruimte"></div>
                <div class="alle-stages">
                    <div class="recente-stage-plek">
                        <img src="images/placeholder-100x100.png" alt="">
                        <div class="textbox">
                            <h1>Software developer niveau 4<!--Opleiding. tekst tekst tekst--></h1>
                            <h2>Google inc. Alphabet B.v. <!--Bedrijfsnaam. tekst tekst tekst--></h2>
                            <p>Tekst tekst tekst voorbeeld voorbeeld<!--Informatie over het bedrijf en wat ze zoeken. tekst tekst tekst--></p>
                        </div>
                    </div>
                    <div class="recente-stage-plek">
                        <img src="images/placeholder-100x100.png" alt="">
                        <div class="textbox">
                            <h1>Software developer niveau 4<!--Opleiding. tekst tekst tekst--></h1>
                            <h2>Google inc. Alphabet B.v. <!--Bedrijfsnaam. tekst tekst tekst--></h2>
                            <p>Tekst tekst tekst voorbeeld voorbeeld<!--Informatie over het bedrijf en wat ze zoeken. tekst tekst tekst--></p>
                        </div>
                    </div>
                    <div class="recente-stage-plek">
                        <img src="images/placeholder-100x100.png" alt="">
                        <div class="textbox">
                            <h1>Software developer niveau 4<!--Opleiding. tekst tekst tekst--></h1>
                            <h2>Google inc. Alphabet B.v. <!--Bedrijfsnaam. tekst tekst tekst--></h2>
                            <p>Tekst tekst tekst voorbeeld voorbeeld<!--Informatie over het bedrijf en wat ze zoeken. tekst tekst tekst--></p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>

