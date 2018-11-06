<?php

session_start();

require('dbConnect.php');
$db = get_db();


$activity = htmlspecialchars($_POST['activity']);
$date     = htmlspecialchars($_POST['date']);
$place    = htmlspecialchars($_POST['place']);
$duration = htmlspecialchars($_POST['duration']);
$quality  = htmlspecialchars($_POST['quality']);
$sport_id = htmlspecialchars($_POST['sport_id']);
$performance_level = htmlspecialchars($_POST['performance']);
$fun_level =         htmlspecialchars($_POST['fun']);
$health =            htmlspecialchars($_POST['health']);
// $activity_id = htmlspecialchars($_POST['activity_id']);



 $query = "INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id, performance_level, fun_level, health) VALUES (:name, :day, :place, :duration, :quality, :sport_id, $performance_level, $fun_level, $health);";

//  $query2 = "INSERT INTO activities (name, sport_id) VALUES (:name, :id);"



$stmt = $db->prepare($query);

$stmt->bindValue(':name',              $activity, PDO::PARAM_STR);
$stmt->bindValue(':day',               $date,     PDO::PARAM_STR);
$stmt->bindValue(':place',             $place,    PDO::PARAM_STR);
$stmt->bindValue(':duration',          $duration, PDO::PARAM_INT);
$stmt->bindValue(':quality',           $quality,  PDO::PARAM_INT);
// $stmt->bindValue(':sport_id',          $sport_id, PDO::PARAM_INT);
// $stmt->bindValue(':performance', $performance_level, PDO::PARAM_INT);
// $stmt->bindValue(':fun',         $fun_level,         PDO::PARAM_INT);
// $stmt->bindValue(':health',            $health,      PDO::PARAM_INT);
// //  echo "$id";


$stmt->execute();

// echo $sport_id;

// now we need to get the id back from the activity we just created


// $query2 = "SELECT id FROM activities WHERE sport_id=:s_id AND name=:activity_name";

// $stmt1 = $db->prepare($query2);

// $stmt1->bindValue(":s_id", $sport_id, PDO::PARAM_INT);
// $stmt1->bindValue(":activity_name", $activity, PDO::PARAM_STR);


// $stmt1->execute();

// // $row = $stmt1->fetch();

// $activity_id = $stmt1->fetch();
header('location:activities.php');
die();

?>


<!-- <!DOCTYPE html>
<html>
<head>
   <title>testing</title>
</head>
<body>
   <h1>


   </h1>
<form action="add_performance.php" method="GET">
    <div class="container">


    <input type="hidden" name="name" value="<php echo $activity?>">

   <input type="number" placeholder="Enter Performance Level" name="performance" required>
   <input type="number" Placeholder="Enter Fun Level" name="fun" required>

    <input type="number" Placeholder="Health Level" name="health" required>

    <input type="hidden" name="activity_id" value="php echo $activity_id?>" >
    <input type="hidden" name="sport_id" value="<php echo $sport_id?>" >


    <button type="submit">Add new Activity</button>

  </div>

 </form>

</body>
</html> -->