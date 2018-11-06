<?php

session_start();

require('dbConnect.php');
$db = get_db();
$sport_name = $_SESSION['sport_name'];

// we have a big form but this is a simple page that took me a week to get to compile
$activity =          htmlspecialchars($_POST['activity']);
$date     =          htmlspecialchars($_POST['date']);
$place    =          htmlspecialchars($_POST['place']);
$duration =          htmlspecialchars($_POST['duration']);
$quality  =          htmlspecialchars($_POST['quality']);
$sport_id =          htmlspecialchars($_POST['sport_id']);
$performance_level = htmlspecialchars($_POST['performance']);
$fun_level =         htmlspecialchars($_POST['fun']);
$health =            htmlspecialchars($_POST['health']);


 $query = "INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id, performance_level, fun_level, health) VALUES (:name, :day, :place, :duration, :quality, :sport_id, :performance, :fun, :health);";


$stmt = $db->prepare($query);

$stmt->bindValue(':name',              $activity, PDO::PARAM_STR);
$stmt->bindValue(':day',               $date,     PDO::PARAM_STR);
$stmt->bindValue(':place',             $place,    PDO::PARAM_STR);
$stmt->bindValue(':duration',          $duration, PDO::PARAM_INT);
$stmt->bindValue(':quality',           $quality,  PDO::PARAM_INT);
$stmt->bindValue(':sport_id',          $sport_id, PDO::PARAM_INT);
$stmt->bindValue(':performance', $performance_level, PDO::PARAM_INT);
$stmt->bindValue(':fun',         $fun_level,         PDO::PARAM_INT);
$stmt->bindValue(':health',            $health,      PDO::PARAM_INT);

$stmt->execute();

// this page needs some info to work right
header("location:activities.php?sport_id=$sport_id&sport_name=$sport_name");
die();

?>
