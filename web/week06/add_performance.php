
<!--
NOTICE: I AM NO LONGER USING THIS PAGE

I droped my performance table because it was set up as a one to many but i wanted it
to be a one to one realation ship
so i moved the date in perfomance and added it to the activiy table.
 -->
<?php

session_start();

require('dbConnect.php');
$db = get_db();

 $name        = htmlspecialchars($_GET['name']);
 $performance = htmlspecialchars($_GET['performance']);
 $fun         = htmlspecialchars($_GET['fun']);
 $health      = htmlspecialchars($_GET['health']);
 $activity_id = htmlspecialchars($_GET['activity_id']);


 $sport_id = $_GET['sport_id'];

//

 //echo $sport_id;

// $query = 'SELECT * FROM activities WHERE sport_id=:s_id';

$stmt = $db->prepare("SELECT id FROM activities WHERE sport_id=:s_id;");
// $stmt1 = $db->prepare("SELECT activitie_id FROM performance");

$stmt->bindValue(':s_id', $sport_id);
// $stmt1->bindValue(":activity_name", $activity, PDO::PARAM_STR);


$stmt->execute();

$activties = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $performances = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// $stmt1->execute();








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


foreach ($activity_id as $activity) {
   echo $activity;
   foreach ($performances as $performance ) {

      if ($activity == $performance) {
         header("location:looptestcrap.php");
         die();
      }
   }

}



//header("location:activities.php?sport_id=$sport_id");

die();


?>
