<?php 
    include_once "pdo_verbinding.php";

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }

    // echo $_SESSION["personsRole"];
    // echo $_SESSION["ownRole"];
    // exit();
?>
<div id="view-page">
    <?php 
    try {
        $sql = "SELECT * FROM user WHERE username like :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":username" => $_SESSION["username"]]);
        $row = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            $user_id = $row["user_id"];

            if ($_SESSION['personsRole'] == 1) {
                $role = "intern";
            } else if ($_SESSION['personsRole'] == 2) {
                $role = "company";
            } else {
                $role = "education";
            }
    
            $sql = "SELECT * FROM $role WHERE user_id like :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([ ":user_id" => $user_id ]);
            $row = $stmt->fetch();

            if ($role == "intern") {
                $date_of_birth = new DateTime($row["date_of_birth"]);
                $currentTime = new DateTime();
                $difference = $currentTime->diff($date_of_birth);
                $age = $difference->y;

                $sql2 = "SELECT * FROM `country` WHERE `country_id` like :country_id";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute(["country_id" => $row["nationality_id"]]);
                $row2 = $stmt2->fetch();
                $nationality = $row2["countryname"];
                
                if (isset($row["currently_student"]) && $row["currently_student"] == 1) {
                    $currentlyStudent = "Yes";
                } else {
                    $currentlyStudent = "No";
                }
                    
                if (isset($row["openfor_real_employment"]) && $row["openfor_real_employment"] == 1) {
                    $openForRealEmployment = "Yes";
                } else {
                    $openForRealEmployment = "No";
                }

                echo '<div id="img">
                    <img src="https://via.placeholder.com/150" alt="">
                    </div>

                    <div id="about-data">
                        <h3 class = "left">About me:</h3> 
                        <p class = "left">' . $row["profiletext"] . '</p>
                    </div>
                
                    <div class="clear"></div>
                    <hr>
                    
                    <div id="general-data">
                        <div id="full-name" class="no-wrap">
                            <p class = "left"><h4 class = "left">Full name:</h4>' . $row["firstname"] . " " . $row["surname"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="email" class="no-wrap">
                            <p class = "left"><h4 class = "left">Email:</h4>' . $row["email"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="date-of-birth" class="no-wrap">
                            <p class = "left"><h4 class = "left">Age:</h4>' . $age . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="city" class="no-wrap">
                            <p class = "left"><h4 class = "left">City:</h4>' . $row["city"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="nationality" class="no-wrap">
                            <p class = "left"><h4 class = "left">Nationality:</h4>' . $nationality . '</p>
                        </div>
                    </div>
                    
                    <div id="study-data">
                        <div id="study" class="no-wrap">
                            <p class = "left"><h4 class = "left">Study:</h4>' . $row["study"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="field-of-studies" class="no-wrap"> 
                            <p class = "left"><h4 class = "left">Field of studies:</h4>' . $row["field_of_studies"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="graduated-from" class="no-wrap">
                            <p class = "left"><h4 class = "left">Graduated from:</h4>' . $row["graduated_from"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="currently-student" class="no-wrap"> 
                            <p class = "left"><h4 class = "left">Currently student:</h4>' . $currentlyStudent . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="seeking-internship" class="no-wrap"> 
                            <p class = "left"><h4 class = "left">Seeking for internship:</h4>' . $row["seeking_internship"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="open-for-real-employment" class="no-wrap">
                            <p class = "left"><h4 class = "left">Open for real employment:</h4>' . $openForRealEmployment . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="video-link" class="no-wrap">
                            <p class = "left"><h4 class = "left">Video link:</h4>' . $row["video"] . '</p>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    <br>';
            } else if ($role == "company") {
                $sql2 = "SELECT * FROM `country` WHERE `country_id` like :country_id";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute(["country_id" => $row["country_id"]]);
                $row2 = $stmt2->fetch();
                $nationality = $row2["countryname"];


                echo '<div id="img">
                    <img src="https://via.placeholder.com/150" alt="">
                        logo
                    </div>

                    <div id="about-data">
                        <h3 class = "left">About us:</h3> 
                        <p class = "left">' . $row["profiletext"] . '</p>
                    </div>
                
                    <div class="clear"></div>
                    <hr>
                    
                    <div id="general-data">
                        <div id="company-name" class="no-wrap">
                            <p class = "left"><h4 class = "left">Company name:</h4>' . $row["companyname"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="contact-person-name" class="no-wrap">
                            <p class = "left"><h4 class = "left">contact person name:</h4>' . $row["contactperson"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="email" class="no-wrap">
                            <p class = "left"><h4 class = "left">Contact person email:</h4>' . $row["email_contactperson"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="city" class="no-wrap">
                            <p class = "left"><h4 class = "left">City:</h4>' . $row["city"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="country" class="no-wrap">
                            <p class = "left"><h4 class = "left">Country:</h4>' . $row2["countryname"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="webstite" class="no-wrap">
                            <p class = "left"><h4 class = "left">Company website:</h4>' . $row["website"] . '</p>
                        </div>
                        <div id="video-link" class="no-wrap">
                            <p class = "left"><h4 class = "left">Video link:</h4>' . $row["video"] . '</p>
                        </div>
                    </div>
                    
                    <div id="position-data">
                        <div id="study" class="no-wrap">
                            <p class = "left"><h4 class = "left">Looking for postion:</h4>' . $row["position"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="field-of-studies" class="no-wrap"> 
                            <p class = "left"><h4 class = "left">What we need:</h4>' . $row["positiontext"] . '</p>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    <br>';
            } else {
                $sql3 = "SELECT * FROM `country` WHERE `country_id` like :country_id";
                $stmt3 = $pdo->prepare($sql3);
                $stmt3->execute(["country_id" => $row["country_id"]]);
                $row3 = $stmt3->fetch();
                $nationality = $row3["countryname"];


                echo '<div id="img">
                    <img src="https://via.placeholder.com/150" alt="">
                        logo
                    </div>

                    <div id="about-data">
                        <h3 class = "left">About us:</h3> 
                        <p class = "left">' . $row["profiletext"] . '</p>
                    </div>
                
                    <div class="clear"></div>
                    <hr>
                    
                    <div id="general-data">
                        <div id="education-name" class="no-wrap">
                            <p class = "left"><h4 class = "left">Education name:</h4>' . $row["companyname"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="contact-person-name" class="no-wrap">
                            <p class = "left"><h4 class = "left">contact person name:</h4>' . $row["contactperson"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="email" class="no-wrap">
                            <p class = "left"><h4 class = "left">Contact person email:</h4>' . $row["email_contactperson"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="city" class="no-wrap">
                            <p class = "left"><h4 class = "left">City:</h4>' . $row["city"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="country" class="no-wrap">
                            <p class = "left"><h4 class = "left">Country:</h4>' . $row3["countryname"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="webstite" class="no-wrap">
                            <p class = "left"><h4 class = "left">Company website:</h4>' . $row["website"] . '</p>
                        </div>
                        <div id="video-link" class="no-wrap">
                            <p class = "left"><h4 class = "left">Video link:</h4>' . $row["video"] . '</p>
                        </div>
                    </div>
                    
                    <div id="position-data">
                        <div id="study" class="no-wrap">
                            <p class = "left"><h4 class = "left">Looking for postion:</h4>' . $row["position"] . '</p>
                        </div>
                        <div class="clear"></div>
                        <div id="field-of-studies" class="no-wrap"> 
                            <p class = "left"><h4 class = "left">What we need:</h4>' . $row["positiontext"] . '</p>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    <br>';
            }
        } else {
            echo "<h5>Page not loading. Log out and log in to see if it works again</h5>";
        }
    } catch(Exception $e) {
        
    }


    
    
    ?>
    
    
</div>