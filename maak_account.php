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

    $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);


    $sql = "INSERT INTO `user`(`username`, `password`, `role`) VALUES (:username, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $userName, "password" => $hashedPassword, "role" => $role]);
  
    $sql = "SELECT * FROM user WHERE username like :username AND password like :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $userName, ":password" => $hashedPassword]);
    $row = $stmt->fetch();

    $user_id = $row["user_id"];
    $standard_id = 252;

    if ($roleName == "intern") {
        $sql = "INSERT INTO $roleName(user_id, country_id, nationality_id) VALUES (:userid, :countryid, :nationalityid)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":userid" => $user_id, ":countryid" => $standard_id, ":nationalityid" => $standard_id]);
    } else {
        $sql = "INSERT INTO $roleName(user_id, country_id) VALUES (:userid, :countryid)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":userid" => $user_id, ":countryid" => $standard_id]);
    }
    

    
    echo "Account made";
} else {
    echo "Error";
    header("Location: registreer.php");
}

?>