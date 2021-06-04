<?php
try {
    $host = "localhost";
    $dbname = "internship_japan_db";
    $user = "root";
    $password = "";
    //set DSN Data Source Name  hiermee kun je met db verbinden
    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
    //maak instance
    $pdo = new PDO($dsn, $user, $password);
} catch(Exception) {
    echo "Error";
}

