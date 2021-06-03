<?php 
include_once "pdo_verbinding.php";

if (isset($_POST["userName"])) {
    $userName = $_POST["userName"];
    $passWord = $_POST["passWord"];
    $roleAndInformation = $_POST["roleAndInformation"];

    $sql = "INSERT INTO `user`(`username`, `password`, `role`) VALUES (:username, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $userName, "password" => $passWord, "role" => $roleAndInformation[0]]);
    //maken dat je nu ook de rest van de info maken maar eerst de primary key van de user table in de foreign key van de intern maken
    //dus iets van $foreignKey = select primarykey from users where $username is username. Maar dan veiliger
    
    echo "gelukt";
} else {
    header("Location: registreer.php");
}

?>