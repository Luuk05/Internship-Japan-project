<?php 
    session_start();

    if (isset($_SESSION["permissionToEdit"]) && $_SESSION["permissionToEdit"] == true) {
        $_SESSION = array();
        header("Location: login.php");
    }

    header("Location: login.php");

?>