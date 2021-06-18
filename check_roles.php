<?php 
    include_once "pdo_verbinding.php";
    session_start();

    if (isset($_SESSION["username"])) {  //als de username bestaat dan bestaat de persoons role ook
        echo $_SESSION["personsRole"];
    } else {
        echo "0";
    }


?>