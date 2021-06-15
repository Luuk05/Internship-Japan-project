<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["newData"]) && $_SESSION["permissionToEdit"] == true) {
        $newData = $_POST["newData"];

        if ($_SESSION["personsRole"] == 1) {
            $role = "intern"; 
        } else if ($_SESSION["personsRole"] == 2) {
            $role = "company";
        } else {
            $role = "education";
        }


        $counter = 0;
        foreach($newData as $key => $value) {
            if ($value != "" && strlen(trim($value)) > 0) {
                $sql = "SELECT * FROM user WHERE username like :username";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([":username" => $_SESSION["username"]]);
                $row = $stmt->fetch();
                $user_id = $row["user_id"];


                if ($key == "username") {
                    $sql = "UPDATE `user` SET $key = :value where user_id = $user_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([":value" => $value]);

                } else if ($key == "password") {
                    $hashedPassword = password_hash($value, PASSWORD_DEFAULT);

                    $sql = "UPDATE `user` SET $key = :value where user_id = $user_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([":value" => $hashedPassword]);

                } else {
                    $sql = "UPDATE $role SET $key = :value where user_id = $user_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([":value" => $value]);
                }
            } else {
                $counter++;
            }
        }
        if ($counter == count($newData)) {
            echo "No data changed";
        } else {
            echo "Changed data succesfull";
        }
        
    
    } else {
        echo "Error";
        header("Location: login.php");
    }


?>