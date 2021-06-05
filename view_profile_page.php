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

    $sql = "SELECT * FROM $role WHERE username like :username">
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $_SESSION["username"]]);
    $row = $stmt->fetch();


    
    
    ?>
    
    
    <div id="general-data">
        <div id="full-name">
            <h4 class = "left">Full name:</h4> 
            <p class = "left">Luuk Janssen</p>
        </div>
        <br>
        <div id="email">
            <h4 class = "left">Email:</h4> 
            <p class = "left">0190487@student.banaan.com</p>
        </div>
        <br>
        <div id="date-of-birth">
            <h4 class = "left">Age:</h4> 
            <p class = "left">04-04-2000</p>
        </div>
        <br>
        <div id="city">
            <h4 class = "left">city:</h4> 
            <p class = "left">Nijmegen</p>
        </div>
        <br>
        <div id="nationality">
            <h4 class = "left">Nationality:</h4> 
            <p class = "left">The Netherlands</p>
        </div>
    </div>

    <div class="space"></div>
    
    <div id="about-data">
        <div id="profile-text">
            <h3 class = "left">About me:</h3> 
            <p class = "left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi aperiam, iusto facilis similique accusantium fugiat explicabo, eos, enim ipsum reiciendis optio qui rem. Expedita dolores quibusdam quos! Voluptas, laboriosam dolore.</p>
        </div>
    </div>

    <div class="space"></div>

    <div id="study-data">
        <div id="study">
            <h4 class = "left">Study:</h4> 
            <p class = "left">Software developer</p>
        </div>
        <br>
        <div id="field-of-studies">
            <h4 class = "left">Field of studies:</h4> 
            <p class = "left">PHP, Java, Web3</p>
        </div>
        <br>
        <div id="graduated-from">
            <h4 class = "left">Graduated from:</h4> 
            <p class = "left">Pax christi college druten</p>
        </div>
        <br>
        <div id="currently-student">
            <h4 class = "left">Currently student:</h4> 
            <p class = "left">Yes</p>
        </div>
        <br>
        <div id="seeking-internship">
            <h4 class = "left">Seeking for internship:</h4> 
            <p class = "left">Yes, remote</p>
        </div>
        <br>
        <div id="open-for-real-employment">
            <h4 class = "left">Open for real employment:</h4> 
            <p class = "left">Yes</p>
        </div>
    </div>

</div>