<?php
session_start();

require('dbConnect.php');
$db = get_db();

$sport = $_POST['sport'];
$id    = $_POST['id'];



 $query = "INSERT INTO sports(name, user_id) VALUES (:sport, :id);";



$stmt = $db->prepare($query);
$stmt->bindValue(":sport", $sport, PDO::PARAM_STR);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);


$stmt->execute();




header('location:homepage.php');
//header("location:$newpage");
//die();


// ?>
