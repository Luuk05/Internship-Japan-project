<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["newData"])) {
        $newData = $_POST["newData"];

        if ($session["personsRole"] == 1) {
            $role = "intern"; 
        } else if ($session["personsRole"] == 2) {
            $role = "company";
        } else {
            $role = "education";
        }


        $updateThis = array();
        foreach($newData as $key => $value) {
            if ($newData[$value] != "") {
                $sql = "UPDATE `intern` SET $updateThis[$key] = :value where 1";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$updateThis[$key] => $value]);

            }
        }

        // if (strlen($updateThis) != 0) {
        //     for ($i = 0; $i < strlen($updateThis); $i++) {
        //         $sql = "UPDATE `intern` SET $updateThis[$i] =  where 1";
        //     }
        // }

    

        //updatethis ook weer als key loopen

        $sql = "UPDATE `intern` SET `email`=:email,`firstname`=[value-4],`surname`=[value-5] where 1";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["username" => $userName, "password" => $passWord, "role" => $role]);

        UPDATE `intern` SET `email`=[value-3],`firstname`=[value-4],`surname`=[value-5],`street_adress`=[value-6],`postal_code`=[value-7],`city`=[value-8],`date_of_birth`=[value-9],`country_id`=[value-10],`profiletext`=[value-11],`study`=[value-12],`video`=[value-13],`profileimage`=[value-14],`nationality_id`=[value-15],`field_of_studies`=[value-16],`graduated_from`=[value-17],`currently_student`=[value-18],`languages`=[value-19],`social_media`=[value-20],`seeking_internship`=[value-21],`openfor_real_employment`=[value-22] WHERE 1




    }


?>