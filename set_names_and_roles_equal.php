<?php 
    session_start();    
    $_SESSION["username"] = $_SESSION["ownUsername"];  //zet username en role gelijk aan die van ingelogd account
    $_SESSION["personsRole"] = $_SESSION["ownRole"]; 
    echo "Succes";
?>