<?php 
include_once "pdo_verbinding.php";


if (isset($_POST["userName"])) {
    $userName = $_POST["userName"];
    $passWord = $_POST["passWord"];
    $role = $_POST["role"];

    if ($role == 1) {
        $roleName = "intern";
    } else if ($role == 2) {
        $roleName = "company";
    } else {
        $roleName = "education";
    }

    $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);  //hash password


    $sql = "INSERT INTO `user`(`username`, `password`, `role`) VALUES (:username, :password, :role)"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $userName, "password" => $hashedPassword, "role" => $role]);  //maak een account met gemaakte gegevens van user
  
    $sql = "SELECT * FROM user WHERE username like :username AND password like :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $userName, ":password" => $hashedPassword]);  //vraag alles op van user om op deze manier de user_id van de persoon te krijgen
    $row = $stmt->fetch();

    $user_id = $row["user_id"];  
    $standard_id = 252; //standaard id voor country table

    if ($roleName == "intern") {  //voor intern moet er nog een extra veld bij dus daardoor if else 
        $sql = "INSERT INTO $roleName(user_id, country_id, nationality_id) VALUES (:userid, :countryid, :nationalityid)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":userid" => $user_id, ":countryid" => $standard_id, ":nationalityid" => $standard_id]);
    } else {
        $sql = "INSERT INTO $roleName(user_id, country_id) VALUES (:userid, :countryid)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":userid" => $user_id, ":countryid" => $standard_id]);
    }
    

    
    echo "Account made"; //na alle code echo Account made
} else {
    echo "Error";
    header("Location: registreer.php");
}

?>