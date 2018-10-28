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
$sport_id = htmlspecialchars($_GET['sport_id']);
$activity_id = htmlspecialchars($_GET['activity_id']);



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
$stmt->bindValue(":id",       $sport_id, PDO::PARAM_INT);
//  echo "$id";


$stmt->execute();




// header("location:activities.php?sport_id=$id");
// die();


?>

<!DOCTYPE html>
<html>
<head>
   <title>testing</title>
</head>
<body>
   <h1>
      <?php echo $activity
      ?>

   </h1>
<form action="add_performance.php" method="GET">
    <div class="container">


    <input type="hidden" name="name" value="<?php echo $activity?>">

   <input type="number" placeholder="Enter Performance Level" name="performance" required>
   <input type="number" Placeholder="Enter Fun Level" name="fun" required>

    <input type="number" Placeholder="Health Level" name="health" required>

    <input type="hidden" name="activity_id" value="<?php echo $activity_id?>" >
    <input type="hidden" name="sport_id" value="<?php echo $sport_id?>" >


    <button type="submit">Add new Activity</button>

  </div>

 </form>

</body>
</html>