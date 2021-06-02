<?php 
    include_once "pdo_verbinding.php";

    // $_POST = array();
    // $_POST["userName"] = "Samson";
    // print_r($_POST);

    if (isset($_POST["userName"])) {

        try {
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
                echo " ";
            } else {
                echo $userName;
            }
            
            exit();
        } catch(Exeption) {
            echo "problem in php code";
        }
        
    }



?>