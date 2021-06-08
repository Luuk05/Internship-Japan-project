<?php 
    include_once "pdo_verbinding.php";

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }


?>
<div id="view-page">
    <?php 
    $sql = "SELECT * FROM user WHERE username like :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $_SESSION["username"]]);
    $row = $stmt->fetch();
    $user_id = $row["user_id"];

    if ($_SESSION['personsRole'] == 1) {
        $role = "intern";
    } elseif ($_SESSION['personsRole'] == 2) {
        $role = "company";
    } else {
        $role = "education";
    }

    $sql = "SELECT * FROM $role WHERE user_id like :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ ":user_id" => $user_id ]);
    $row = $stmt->fetch();

    if ($stmt->rowCount() > 0) {
        $date_of_birth = new DateTime($row["date_of_birth"]);
        $currentTime = new DateTime();
        $difference = $currentTime->diff($date_of_birth);
        $age = $difference->y;

        //bezig met nationality in te laten zien
        $sql = "SELECT * FROM `internship_japan_db`.`country` WHERE `country_id` = 93 ORDER BY `country_id` DESC";
        $stmt = $pdo->query($sql);
        $stmt->execute();



        echo '<div id="img">
        <img src="https://via.placeholder.com/150" alt="">
        </div>

        <div id="center-about">
            <h3 class = "left">About me:</h3> 
            <p class = "left">' . $row["profiletext"] . '</p>
        </div>
    
        <div class="clear"></div>
        <hr>
        
        <div id="general-data">
            <div id="full-name" class="no-wrap">
                <p class = "left"><h4 class = "left">Full name:</h4>' . $row["firstname"] . " " . $row["surname"] . '</p>
            </div>
            <div id="email" class="no-wrap">
                <p class = "left"><h4 class = "left">Email:</h4>' . $row["email"] . '</p>
            </div>
            <div id="date-of-birth" class="no-wrap">
                <p class = "left"><h4 class = "left">Age:</h4>' . $age . '</p>
            </div>
            <div id="city" class="no-wrap">
                <p class = "left"><h4 class = "left">City:</h4>' . $row["city"] . '</p>
            </div>
            <div id="nationality" class="no-wrap">
                <p class = "left"><h4 class = "left">Nationality:</h4>' . $row["nationality"] . '</p>
            </div>
        </div>
        
        <div id="study-data">
            <div id="study" class="no-wrap">
                <p class = "left"><h4 class = "left">Study:</h4> Software developer</p>
            </div>
            <div id="field-of-studies" class="no-wrap"> 
                <p class = "left"><h4 class = "left">Field of studies:</h4>PHP, Java, Web3</p>
            </div>
            <div id="graduated-from" class="no-wrap">
                <p class = "left"><h4 class = "left">Graduated from:</h4> Pax christi college druten</p>
            </div>
            <div id="currently-student" class="no-wrap"> 
                <p class = "left"><h4 class = "left">Currently student:</h4>Yes</p>
            </div>
            <div id="seeking-internship" class="no-wrap"> 
                <p class = "left"><h4 class = "left">Seeking for internship:</h4>Yes, remote</p>
            </div>
            <div id="open-for-real-employment" class="no-wrap">
                <p class = "left"><h4 class = "left">Open for real employment:</h4> Yes</p>
            </div>
        </div>
        
        <div class="clear"></div>
        <br>';
    }


    
    
    ?>
    
    
</div>