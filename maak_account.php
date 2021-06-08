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

    // echo "iets1";
    $sql = "INSERT INTO `user`(`username`, `password`, `role`) VALUES (:username, :password, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $userName, "password" => $passWord, "role" => $role]);
  
    // echo "iets2";
    $sql = "SELECT * FROM user WHERE username like :username AND password like :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $userName, ":password" => $passWord]);
    $row = $stmt->fetch();

    $user_id = $row["user_id"];
    // echo $user_id;
    $standard_id = 252;
    $sql = "INSERT INTO $roleName(user_id, country_id, nationality_id) VALUES (:userid, :countryid, :nationalityid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":userid" => $user_id, ":countryid" => $standard_id, ":nationalityid" => $standard_id]);

    
    echo "Account made";
} else {
    echo "101";
    header("Location: registreer.php");
}

?>