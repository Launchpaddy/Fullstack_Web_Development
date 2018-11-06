<?php

session_start();

require('dbConnect.php');
$db = get_db();

 $name        = htmlspecialchars($_GET['name']);
 $performance = htmlspecialchars($_GET['performance']);
 $fun         = htmlspecialchars($_GET['fun']);
 $health      = htmlspecialchars($_GET['health']);
// $activity_id = htmlspecialchars($_GET['activity_id']);


 $sport_id = $_GET['sport_id'];

//

 //echo $sport_id;

// $query = 'SELECT * FROM activities WHERE sport_id=:s_id';

$stmt = $db->prepare("SELECT id FROM activities WHERE sport_id=:s_id;");
$stmt1 = $db->prepare("SELECT activitie_id FROM performance");

$stmt->bindValue(':s_id', $sport_id);
// $stmt1->bindValue(":activity_name", $activity, PDO::PARAM_STR);


$stmt->execute();
$stmt1->execute();

$activties = $stmt->fetchAll(PDO::FETCH_ASSOC);
$performances = $stmt1->fetchAll(PDO::FETCH_ASSOC);






foreach ($activities as $activity) {
   echo $activity['id'];
   foreach ($performances as $performance ) {

      if ($activity['id'] == $performance['activitie_id']) {
         header("location:looptestcrap.php");
         die();
      }
   }

}




 $query = "
 INSERT INTO performance (name, performance_level, fun_level, health, activitie_id)
VALUES (:name, :performance, :fun, :health, :activity_id);";

//  $query2 = "INSERT INTO activities (name, sport_id) VALUES (:name, :id);"



$stmt = $db->prepare($query);

$stmt->bindValue(":name",         $name, PDO::PARAM_STR);
$stmt->bindValue(":performance",  $performance, PDO::PARAM_INT);
$stmt->bindValue(":fun",          $fun,    PDO::PARAM_INT);
$stmt->bindValue(":health",       $health, PDO::PARAM_INT);
$stmt->bindValue(":activity_id",  33,  PDO::PARAM_INT);

//  echo "$id";


$stmt->execute();

//header("location:activities.php?sport_id=$sport_id");

die();


?>
