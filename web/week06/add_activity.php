<?php

session_start();

require('dbConnect.php');
$db = get_db();


$activity =          $_POST['activity'];
$date     =          $_POST['date'];
$place    =          $_POST['place'];
$duration =          $_POST['duration'];
$quality  =          $_POST['quality'];
$sport_id =          $_POST['sport_id'];
$performance_level = $_POST['performance'];
$fun_level =         $_POST['fun'];
$health =            $_POST['health'];
// $activity_id = htmlspecialchars($_POST['activity_id']);



 // $query = "INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id, performance_level, fun_level, health) VALUES (:name, :day, :place, :duration, :quality, :sport_id, :performance, :fun, :health);";

//  $query2 = "INSERT INTO activities (name, sport_id) VALUES (:name, :id);"



$stmt = $db->prepare('INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id, performance_level, fun_level, health) VALUES (:name, :day, :place, :duration, :quality, :sport_id, :performance, :fun, :health);');

$stmt->bindValue(':name',              $activity, PDO::PARAM_STR);
$stmt->bindValue(':day',               $date,     PDO::PARAM_STR);
$stmt->bindValue(':place',             $place,    PDO::PARAM_STR);
$stmt->bindValue(':duration',          $duration, PDO::PARAM_INT);
$stmt->bindValue(':quality',           $quality,  PDO::PARAM_INT);
$stmt->bindValue(':sport_id',          $sport_id, PDO::PARAM_INT);
$stmt->bindValue(':performance', $performance_level, PDO::PARAM_INT);
$stmt->bindValue(':fun',         $fun_level,         PDO::PARAM_INT);
$stmt->bindValue(':health',            $health,      PDO::PARAM_INT);
//  echo "$id";


$stmt->execute();

// echo $sport_id;

// now we need to get the id back from the activity we just created


// $query2 = "SELECT id FROM activities WHERE sport_id=:s_id AND name=:activity_name";

// $stmt1 = $db->prepare($query2);

// $stmt1->bindValue(":s_id", $sport_id, PDO::PARAM_INT);
// $stmt1->bindValue(":activity_name", $activity, PDO::PARAM_STR);


// $stmt1->execute();

// // $row = $stmt1->fetch();
$sport_name = $_SESSION['sport_name'];

// $activity_id = $stmt1->fetch();
header("location:activities.php?sport_id=$sport_id?sport_name=$sport_name");
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