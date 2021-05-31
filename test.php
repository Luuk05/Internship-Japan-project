<?php 
    if (isset($_POST["name"])) {
        $username = $_POST["name"];
        $password = $_POST["password"];

        $data = array($username, $password);
        $dataJSON = json_encode($data);


        echo $dataJSON;
    }

        
    
?>