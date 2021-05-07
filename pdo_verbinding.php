<?php
$host = "localhost";
$dbname = "pdo_testing";
$user = "root";
$password = "";
//set DSN Data Source Name  hiermee kun je met db verbinden
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
//maak instance
$pdo = new PDO($dsn, $user, $password);
