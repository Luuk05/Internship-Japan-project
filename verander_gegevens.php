<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["newData"])) {  //als er nieuwe data word gestuurd van de change_profile_page.php dan doe het volgende
        if ($_SESSION["permissionToEdit"] == true || $_SESSION["adminPermission"] == true) {
            $newData = $_POST["newData"];

            if ($_SESSION["personsRole"] == 1) {
                $role = "intern"; 
            } else if ($_SESSION["personsRole"] == 2) {
                $role = "company";
            } else {
                $role = "education";
            }


            $counter = 0;
            foreach($newData as $key => $value) {  //loop door associative array
                if ($value != "" && strlen(trim($value)) > 0) { //als de waarde niet niks is en er geen spaties zijn dan:
                    $sql = "SELECT * FROM user WHERE username like :username";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([":username" => $_SESSION["username"]]);  //selecteer alles van de user waarbij username zelfde is als session username
                    $row = $stmt->fetch();
                    $user_id = $row["user_id"]; //onthoud user_id


                    if ($key == "username") {  //bij username en password moet er net iets anders worden gedaan
                        $sql = "UPDATE `user` SET $key = :value where user_id = $user_id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([":value" => $value]);

                    } else if ($key == "password") {
                        $hashedPassword = password_hash($value, PASSWORD_DEFAULT);

                        $sql = "UPDATE `user` SET $key = :value where user_id = $user_id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([":value" => $hashedPassword]);

                    } else {  // hiervoor heb ik de $key een juiste naam gegeven zodat de data op de juiste plek in de database komt te staan 
                        $sql = "UPDATE $role SET $key = :value where user_id = $user_id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([":value" => $value]);
                    }
                } else {
                    $counter++; // als value niets is hoeft er niets veranderd te worden.
                }
            }
            if ($counter == count($newData)) { //als counter gelijk aan de lengte van de array is er dus niets veranderd
                echo "No data changed";  
            } else {
                echo "Changed data succesfull";
            }
        }
        
        
    
    } else {
        echo "Error";
        header("Location: login.php");
    }


?>