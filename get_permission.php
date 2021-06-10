<?php 
    session_start();
    if (isset($_SESSION["permissionToEdit"])) {
        $permissionToEdit = $_SESSION["permissionToEdit"];
        echo $permissionToEdit;
    }
    
?>