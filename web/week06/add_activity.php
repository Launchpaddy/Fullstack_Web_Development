<?php
session_start();

require('dbConnect.php');
$db = get_db();

$activity = htmlspecialchars($_POST['activity']);
// $date     = htmlspecialchars($_POST['date']);
// $place    = htmlspecialchars($_POST['place']);
// $duration = htmlspecialchars($_POST['duration']);
// $quality  = htmlspecialchars($_POST['quality']);
// $id       = htmlspecialchars($_POST['id']);



 $query = "INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id) VALUES (:name, :day, :place, :duration, :quality, :id);";

 $query2 "INSERT INTO activities (name) VALUES (:name);"



$stmt = $db->prepare($query2);

$stmt->bindValue(":name",     $activity, PDO::PARAM_STR);
$stmt->bindValue(":day",      $date, PDO::PARAM_STR);
$stmt->bindValue(":place",    $place, PDO::PARAM_STR);
$stmt->bindValue(":duration", $duration, PDO::PARAM_INT);
$stmt->bindValue(":quality",  $quality, PDO::PARAM_INT);
$stmt->bindValue(":id",       $id, PDO::PARAM_INT);


$stmt->execute();




header('location:activities.php');
//header("location:$newpage");
// die();


?>