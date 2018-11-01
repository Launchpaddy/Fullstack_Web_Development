<?php
session_start();

require('dbConnect.php');
$db = get_db();

$sport = $_POST['sport'];
$user_id    = $_POST['user_id'];



 $query = "INSERT INTO sports(name, user_id) VALUES (:sport, :user_id);";



$stmt = $db->prepare($query);
$stmt->bindValue(":sport", $sport, PDO::PARAM_STR);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);


$stmt->execute();




header('location:homepage.php');
//header("location:$newpage");
//die();


// ?>
