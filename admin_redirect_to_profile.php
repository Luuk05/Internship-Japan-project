<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["user_id"])) {   //als de post user_id bestaat dan select alles van user where user_id is gelijk aan de gegeven user_id
        $user_id = $_POST["user_id"];
        $sql = "SELECT * FROM user WHERE user_id like :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":user_id" => $user_id ]);
        $row = $stmt->fetch();

        $count = $stmt->rowCount();
        if ($count > 0) {  //als er maar 1 row is gevonden maak dan session variabelen met de juiste benodigheden om als admin toegang te krijgen
            $_SESSION["username"] = $row["username"];
            $_SESSION["personsRole"] = $row["role"];
            $_SESSION["ownUsername"] = $row["username"];
            $_SESSION["ownRole"] =  $row["role"];
            $_SESSION["adminPermission"] = true;

            echo "admin_profile_page.php"; //met Javascript word je dan geridirect naar admin_profile_page.php
        } 
    } else {
        // header("Location: page2.php");
    }


?>