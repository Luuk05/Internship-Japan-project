<?php
    session_start();
    include_once "pdo_verbinding.php";

    $border_color = "#7675758c";
    $box_shadow = "0 0 1px #4f4f4f";
    if (isset($_POST["zoek-knop"])) {
        

        if (!empty($_POST["study"]) && strlen(trim($_POST['study'])) > 0) {
            $study = trim($_POST["study"]);
            $location = trim($_POST["location"]);

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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_index2.css">
    <title>Internship Japan</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-1">
        <?php include_once "nav_bar.php";  //stijl = nav_bar_style.css?>
        <div class="container-2">
            <div class="container-3">
                <div class="input-velden-box">
                    <form action="" method="post">
                        <h2>Search:</h2>
                        <input type="text" placeholder="Study / Position" name="study" class="input-veld-opleiding input-algemeen" style= "border-color: <?php echo $border_color; ?>;  box-shadow: <?php echo $box_shadow; ?>;">
                        <br>
                        <input type="text" placeholder="City" name="location" class="input-veld-locatie input-algemeen">
                        <br>
                        <input type="submit" name="zoek-knop" value="Search!" class="search-knop">
                    
                        <div class="sign-box">
                            <h3><a href="login.php">Sign in</a></h3>
                            <div class="line"></div>
                            <h3><a href="registreer.php">Sign up</a></h3>
                        </div>
                        
                        <h2 class="voorgestelde-stages-header">Voorgestelde stages:</h2>
                        <div class="voorgestelde-stages">
                            <input type="submit" name="knopvoorstel1" value="Software developer" class="voorstel-stage-knop">
                            <input type="submit" name="knopvoorstel2" value="Knop-voorstel-stage" class="voorstel-stage-knop">
                            <input type="submit" name="knopvoorstel3" value="Knop-voorstel-stage" class="voorstel-stage-knop">
                        </div>
                    </form> 
                </div>
                <div class="recente-stages-box">
                    <div class="recente-stages-balk">
                        <h2>Recent opportunities for interns:</h2>
                    </div>
                    <div class="lege-ruimte"></div>

                    <div class="alle-stages">
                        <?php
                            $offsetCounter = 0;
                            $saveRow = array();

                            while ( count($saveRow) != 12 ) {
                                $sql = "SELECT * FROM user WHERE role = 2 ORDER BY user_id DESC LIMIT 1 OFFSET $offsetCounter";
                                $stmt = $pdo->query($sql);
                                $stmt->execute();
                                $row = $stmt->fetch();
                                $user_id = $row["user_id"];
                            
                                $sql = "SELECT * FROM company WHERE user_id = :user_id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([":user_id" => $user_id]);
                                $row = $stmt->fetch();
                            
                                    if ($row["position"] != "") {
                                        if ($row["companyname"] != "") {
                                            if ($row["positiontext"] != "") {
                                                array_push($saveRow, $row["user_id"], $row["position"], $row["companyname"], $row["positiontext"]);
                                            } 
                                        } 
                                    } 
                                $offsetCounter++;
                                if ($offsetCounter == 100) {
                                    break;
                                }
                            }
                            
                            if (count($saveRow) == 12) {
                                for ($i = 0; $i < 12; $i += 4) {
                                    echo '<div class="recente-stage-plek" value=' . $saveRow[$i] . '>
                                    <img src="images/placeholder-100x100.png" alt="">
                                        <div class="textbox">
                                    <h1>' . $saveRow[$i + 1] . '</h1>
                                    <h2>' . $saveRow[$i + 2] . '</h2>
                                        <p>' . $saveRow[$i + 3] . '</p>
                                    </div>
                                </div>';
                                }
                            } else {
                                echo '<div class="recente-stage-plek">
                                            <div class="textbox">
                                                <h3>No recent oppurtunities found. After ' . $offsetCounter . ' tries</h3>
                                            </div>
                                        </div>';
                            }
                        
                        ?>
                        
                    </div> 
                </div>
            </div>
        </div>
        <footer>
                <!-- info over hoeveel interns ensen gerigistreed zijn en hoeveel bedrijven -->
        </footer>
    </div>
    <script src="js/check_recent_opportunities_clicked.js"></script>
</body>
</html>

