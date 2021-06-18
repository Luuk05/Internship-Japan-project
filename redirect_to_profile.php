<?php 
    session_start();
    include_once "pdo_verbinding.php";

    if (isset($_POST["user_id"])) {  //dit is als er op een div word geklikt. javascript stuurt dan een ajax request naar deze pagina
        $user_id = $_POST["user_id"];
        $sql = "SELECT * FROM user WHERE user_id like :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":user_id" => $user_id ]);    //dan word alles geselecteerd van de user waarbij user_id gelijk is aan die van geklikte
        $row = $stmt->fetch();

        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION["username"] = $row["username"];  //vervolgens worden die gegevens van bovenstaande resultaat als session gezet
            $_SESSION["personsRole"] = $row["role"];
            
            echo "profile_page.php";   //en als laatst word er geridirect naar profiel pagina
        } 
    } else {
        // header("Location: page2.php");
    }


?>