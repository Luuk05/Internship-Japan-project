<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["user_id"])) {
        $user_id = $_POST["user_id"];
        $sql = "SELECT * FROM user WHERE user_id like :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":user_id" => $user_id ]);
        $row = $stmt->fetch();

        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["personsRole"] = $row["role"];
            
            echo "profile_page.php";
        } 
    } else {
        // header("Location: page2.php");
    }


?>