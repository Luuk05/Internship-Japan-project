<?php
try {
    $host = "localhost";
    $dbname = "internship_japan_db";
    $user = "root";
    $password = "";  //variabelen die ik nodig heb voor de verbinding naar db
    
    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;   //set DSN Data Source Name  hiermee kun je met db verbinden
    $pdo = new PDO($dsn, $user, $password);  //maak instance
} catch(Exception) {
    echo "Error";
}

