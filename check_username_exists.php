<?php 
    include_once "pdo_verbinding.php";


    if (isset($_POST["userName"])) {

       
        $userName = $_POST["userName"];

        $stmt = $pdo->query("SELECT * FROM user"); 
        $stmt->execute();
    
        $rows = $stmt->fetchAll();
                            
        $userNameExists = false;
    
        foreach($rows as $row) {
            // echo $row["username"];
            if ($row["username"] == $userName) {
                $userNameExists = true;
                break;
            }
        }
    
        if ($userNameExists) {
            echo "Exists";
        } else {
            echo $userName;
        }   
    }



?>