<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'journal';


$dsn = 'mysql:host='. $host .';dbname='. $dbname;


$pdo = new PDO($dsn, $user, $password);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
PDO::FETCH_ASSOC);
?>