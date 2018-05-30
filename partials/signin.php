<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require_once ('session_start.php');
require_once 'db.php';

header('Location: /lars_berger_journal/');

$statement = $pdo->prepare(
  "SELECT * FROM users 
  WHERE username = :username"
);
$statement->execute([
  "username" => $_POST["username"]
]);

$user = $statement->fetch();

if (password_verify($_POST["password"], $user["password"])) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $username['username'];
    $_SESSION['userID'] = $user['userID'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
} else {
    header('Location: /index.php?message=login failed');
}

