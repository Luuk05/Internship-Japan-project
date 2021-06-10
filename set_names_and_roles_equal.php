<?php 
    session_start();    
    $_SESSION["username"] = $_SESSION["ownUsername"];
    $_SESSION["personsRole"] = $_SESSION["ownRole"];
    echo "Succes";
?>