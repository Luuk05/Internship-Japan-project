<?php 
    session_start();
    if (isset($_SESSION["permissionToEdit"])) {  //gebruiker krijgt hier acces
        $permissionToEdit = $_SESSION["permissionToEdit"];
        echo $permissionToEdit;
    }
    
?>