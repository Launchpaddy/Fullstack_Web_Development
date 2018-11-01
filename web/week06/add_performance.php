<?php

session_start();

require('dbConnect.php');
$db = get_db();



 $name        = htmlspecialchars($_POST['name']);
 $performance = htmlspecialchars($_POST['performance']);
 $fun         = htmlspecialchars($_POST['fun']);
 $health      = htmlspecialchars($_POST['health']);
 $activity_id = htmlspecialchars($_POST['activity_id']);

 $sport_id = htmlspecialchars($_POST['sport_id']);



 $query = "
 INSERT INTO performance (name, performance_level, fun_level, health, activitie_id)
 VALUES (:name, :performance, :fun, :health, :activity_id);";

//  $query2 = "INSERT INTO activities (name, sport_id) VALUES (:name, :id);"



$stmt = $db->prepare($query);

$stmt->bindValue(":name",         $name, PDO::PARAM_STR);
$stmt->bindValue(":performance",  $performance, PDO::PARAM_INT);
$stmt->bindValue(":fun",          $fun,    PDO::PARAM_INT);
$stmt->bindValue(":health",       $health, PDO::PARAM_INT);
$stmt->bindValue(":activity_id",  $activity_id,  PDO::PARAM_INT);

//  echo "$id";


$stmt->execute();




header("location:activities.php?sport_id=$sport_id");

die();


?>
