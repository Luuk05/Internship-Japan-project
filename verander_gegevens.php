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
            if ($value != "") {
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
        

        // if (strlen($updateThis) != 0) {
        //     for ($i = 0; $i < strlen($updateThis); $i++) {
        //         $sql = "UPDATE `intern` SET $updateThis[$i] =  where 1";
        //     }
        // }

    

        //updatethis ook weer als key loopen

        // $sql = "UPDATE `intern` SET `email`=:email,`firstname`=[value-4],`surname`=[value-5] where 1";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute(["username" => $userName, "password" => $passWord, "role" => $role]);

        //UPDATE `intern` SET `email`=[value-3],`firstname`=[value-4],`surname`=[value-5],`street_adress`=[value-6],`postal_code`=[value-7],`city`=[value-8],`date_of_birth`=[value-9],`country_id`=[value-10],`profiletext`=[value-11],`study`=[value-12],`video`=[value-13],`profileimage`=[value-14],`nationality_id`=[value-15],`field_of_studies`=[value-16],`graduated_from`=[value-17],`currently_student`=[value-18],`languages`=[value-19],`social_media`=[value-20],`seeking_internship`=[value-21],`openfor_real_employment`=[value-22] WHERE 1
    
    } else {
        echo "Error";
        header("Location: login.php");
    }


?>