<?php
$host = "localhost";
$dbname = "test";
$user = "root";
$password = "";
//set DSN Data Source Name  hiermee kun je met db verbinden
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
//maak instance
$pdo = new PDO($dsn, $user, $password);
