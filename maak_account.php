<?php 
include_once "pdo_verbinding.php";

if (isset($_POST["userName"])) {
    $userName = $_POST["userName"];
    $passWord = $_POST["passWord"];
    $role = $_POST["role"];

    $sql = "INSERT INTO `user`(`username`, `password`, `role`) VALUES (:username, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $userName, "password" => $passWord, "role" => $role]);
  
    
    echo "Account maken gelukt";
} else {
    echo "";
    header("Location: registreer.php");
}

?>