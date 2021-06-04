<?php 
    include_once "pdo_verbinding.php";
    session_start();

    if (isset($_SESSION["username"])) {
        echo $_SESSION["personsRole"];
    } else {
        echo "0";
    }


?>