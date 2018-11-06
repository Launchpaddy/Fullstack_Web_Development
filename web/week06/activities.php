<?php
session_start();

   require('dbConnect.php');
   $db = get_db();

   $sport_id   = $_GET['sport_id'];
   $sport_name = $_GET['sport_name'];
   $_SESSION['sport_name'] = $sport_name;

   if (isset($_SESSION['logedIn'])) {
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $display_name = $_SESSION['display_name'];
   }
   else
   {
      // we should be in the session. if we are not we probaly want to redirect to login
      header('Location: login.php');
      die();
   }

   // // activites table
   $stmt = $db->prepare('SELECT id, name, day, place, hour_duration, inviroment_quality, performance_level, fun_level, health FROM activities WHERE sport_id=:sport_id' );
   $stmt->bindvalue(':sport_id', $sport_id);

   $stmt->execute();

   $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
   <title>Activities</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

  <h1><?php  echo $sport_name?>'s Activities</h1>

  <a href='homepage.php'>Return to Home</a>

 <form action="add_activity.php" method="POST">
    <div class="container">

    <label for="activity"><b>Add Activity</b></label>

   <input type="text"   placeholder="Enter Activity"     name="activity" required>

   <input type="date"   placeholder="Enter Date"         name="date" required>

   <input type="text"   Placeholder="Enter Location"     name="place" required>

   <!-- <input type="number" Placeholder="Duration"           name="duration" required> -->
   <p>Duration Hours 1-10:
    <input type="range" min="1" max="10" value="1" class="slider" name="duration">
   </p>

   <!-- <input type="number" Placeholder="Inviroment Quality" name="quality" required> -->
   <p>Inviroment Quality 1-100:
    <input type="range" min="1" max="100" value="50" class="slider" name="quality">
   </p>

   <!-- <input type="number" Placeholder="Performance Level"  name="performance" required> -->
   <p>Performance Level 1-100:
    <input type="range" min="1" max="100" value="50" class="slider" name="performance">
   </p>

   <!-- <input type="number" Placeholder="Fun Level"          name="fun"         required> -->
    <p>Fun Range 1-100:
    <input type="range" min="1" max="100" value="50" class="slider" name="fun">
   </p>

   <!-- <input type="number" Placeholder="Health Level"       name="health"    required> -->
    <p>Health Range 1-100:
    <input type="range" min="1" max="100" value="50" class="slider" name="health">
   </p>
   <input type="hidden" name="sport_id" value="<?php echo $sport_id?>" >

   <button type="submit">Add new Activity</button>

  </div>

 </form>

<table>
  <tr>
    <th>Name</th>
    <th>Date</th>
    <th>Location</th>
    <th>Hours</th>
    <th>Inviroment Qualtiy</th>
    <th>Performance Level</th>
    <th>Fun Level</th>
    <th>Health Level</th>
  </tr>

<?php

   foreach (array_reverse($activities)  as $activity) {
      $name     = $activity['name'];
      $day      = $activity['day'];
      $place = $activity['place'];
      $duration = $activity['hour_duration'];
      $quality = $activity['inviroment_quality'];
      $performance = $activity['performance_level'];
      $fun = $activity['fun_level'];
      $health = $activity['health'];
      // if the activiy is realated to the right sport for the user

      echo "<tr>
      <td>$name</td>
      <td>$day</td>
      <td>$place</td>
      <td>$duration</td>
      <td>$quality</td>
      <td>$performance</td>
      <td>$fun</td>
      <td>$health</td> </tr>";

   }
?>
</table>

</body>
</html>