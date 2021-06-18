<?php 
    include_once "pdo_verbinding.php";


    if (isset($_POST["userName"])) {  // als er post username bestaat dan kijk of de username al bestaat
       
        $userName = $_POST["userName"];

        $stmt = $pdo->query("SELECT * FROM user"); 
        $stmt->execute();
        $rows = $stmt->fetchAll();
                            
        $userNameExists = false;
    
        foreach($rows as $row) {   //loop door alle rows heen en vergelijk usernames
            if ($row["username"] == $userName) {
                $userNameExists = true;
                break;
            }
        }
    
        if ($userNameExists) {   //geef speciale tekst weer als username al bestaat, anders gewoon de username
            echo "Username already exists";  
        } else {
            echo $userName;
        }   
    }
?>