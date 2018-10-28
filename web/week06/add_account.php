<?php
session_start();

require('dbConnect.php');
$db = get_db();

$username = htmlspecialchars($_POST['username']);
$_SESSION['username'] = $username;

$password = htmlspecialchars($_POST['password']);
$_SESSION['password'] = $password;

$displayName = htmlspecialchars($_POST['displayName']);
$_SESSION['displayName'] = $displayName;
//$_SESSION['logedIn'] = true;

$query = "INSERT INTO users(username, password, display_name) VALUES (:username, :password, :displayName);";





$stmt = $db->prepare($query);
$stmt->bindValue(":username", $username, PDO::PARAM_STR);
$stmt->bindValue(":password", $password, PDO::PARAM_STR);
$stmt->bindValue(":displayName", $displayName, PDO::PARAM_STR);


$stmt->execute();

//$newpage = "login.php";
header('location:login.php');
//header("location:$newpage");
die();

?>
