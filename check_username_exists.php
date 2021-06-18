<?php 
    include_once "pdo_verbinding.php";


    if (isset($_POST["userName"])) {
       
        $userName = $_POST["userName"];

        $stmt = $pdo->query("SELECT * FROM user"); 
        $stmt->execute();
        $rows = $stmt->fetchAll();
                            
        $userNameExists = false;
    
        foreach($rows as $row) {
            if ($row["username"] == $userName) {
                $userNameExists = true;
                break;
            }
        }
    
        if ($userNameExists) {
            echo "Username already exists";
        } else {
            echo $userName;
        }   
    }
?>