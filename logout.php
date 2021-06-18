<?php 
    session_start();

    if (isset($_SESSION["permissionToEdit"]) && $_SESSION["permissionToEdit"] == true) {  //als de persoon uberhaupt is ingelogd:
        $_SESSION = array();   //maak van de session array een lege array
        header("Location: login.php");  // redirect naar login pagina
    }

    header("Location: login.php");

?>