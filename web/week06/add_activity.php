<?php

session_start();

require('dbConnect.php');
$db = get_db();

//$sport_id = $_SESSION['sport_id'];

$activity = htmlspecialchars($_POST['activity']);
$date     = htmlspecialchars($_POST['date']);
$place    = htmlspecialchars($_POST['place']);
$duration = htmlspecialchars($_POST['duration']);
$quality  = htmlspecialchars($_POST['quality']);
$sport_id = htmlspecialchars($_POST['sport_id']);
//$activity_id = htmlspecialchars($_POST['activity_id']);



 $query = "
 INSERT INTO activities (name, day, place, hour_duration, inviroment_quality, sport_id)
 VALUES (:name, :day, :place, :duration, :quality, :sport_id);";

//  $query2 = "INSERT INTO activities (name, sport_id) VALUES (:name, :id);"



$stmt = $db->prepare($query);

$stmt->bindValue(":name",     $activity, PDO::PARAM_STR);
$stmt->bindValue(":day",      $date,     PDO::PARAM_STR);
$stmt->bindValue(":place",    $place,    PDO::PARAM_STR);
$stmt->bindValue(":duration", $duration, PDO::PARAM_INT);
$stmt->bindValue(":quality",  $quality,  PDO::PARAM_INT);
$stmt->bindValue(":sport_id", $sport_id, PDO::PARAM_INT);
//  echo "$id";


$stmt->execute();

// now we need to get the id back from the activity we just created
$stmt = $db->perpare('SELECT id FROM activities WHERE sport_id=$sport_id');
//$stmt1->bindValue(":s_id", $sport_id, PDO::PARAM_INT);
$stmt->execute();

// $activity_id = $stmt1->fetch();

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
<form action="add_performance.php" method="POST">
    <div class="container">


    <input type="hidden" name="name" value="<?php echo $activity?>">

   <input type="number" placeholder="Enter Performance Level" name="performance" required>
   <input type="number" Placeholder="Enter Fun Level" name="fun" required>

    <input type="number" Placeholder="Health Level" name="health" required>

    <input type="hidden" name="sport_name" value="<?php echo $activity_id?>" >
    <input type="hidden" name="sport_id" value="<?php echo $sport_id?>" >


    <button type="submit">Add new Activity</button>

  </div>

 </form>

</body>
</html>