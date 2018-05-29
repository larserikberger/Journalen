<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

header('Location: /lars_berger_journal');
require_once 'db.php';

$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $pdo->prepare("INSERT INTO USERS (username, password) VALUES (:username, :password)");
$statement->execute([
    ":username" => $_POST["username"],
    ":password" => $hashed
]);

?>