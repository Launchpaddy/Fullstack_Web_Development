<?php

session_start();

require('dbConnect.php');
$db = get_db();

//$sport_id = $_SESSION['sport_id'];

$activity = htmlspecialchars($_GET['activity']);
$date     = htmlspecialchars($_GET['date']);
$place    = htmlspecialchars($_GET['place']);
$duration = htmlspecialchars($_GET['duration']);
$quality  = htmlspecialchars($_GET['quality']);
$id       = htmlspecialchars($_GET['id']);



 $query = "
 INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id)
 VALUES (:name, :day, :place, :duration, :quality, :id);";

//  $query2 = "INSERT INTO activities (name, sport_id) VALUES (:name, :id);"



$stmt = $db->prepare($query);

$stmt->bindValue(":name",     $activity, PDO::PARAM_STR);
$stmt->bindValue(":day",      $date,     PDO::PARAM_STR);
$stmt->bindValue(":place",    $place,    PDO::PARAM_STR);
$stmt->bindValue(":duration", $duration, PDO::PARAM_INT);
$stmt->bindValue(":quality",  $quality,  PDO::PARAM_INT);
$stmt->bindValue(":id",       $id,       PDO::PARAM_INT);
//  echo "$id";


$stmt->execute();




header('location:activities.php');
//header("location:$newpage");
die();


?>

<!DOCTYPE html>
<html>
<head>
   <title>testing</title>
</head>
<body>
   <h1><?php echo $sport_id?></h1>

</body>
</html>