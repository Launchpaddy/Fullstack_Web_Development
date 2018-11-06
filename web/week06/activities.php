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
   $stmt = $db->prepare('SELECT id, name, day, place, hour_duration, inviroment_quality FROM activities WHERE sport_id=:sport_id' );
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

    <label for="activity"><b>Activity</b></label>

   <input type="text"   placeholder="Enter Activity"     name="activity" required>

   <input type="date"   placeholder="Enter Date"         name="date" required>

   <input type="text"   Placeholder="Enter Location"     name="place" required>

   <input type="number" Placeholder="Duration"           name="duration" required>

   <input type="number" Placeholder="Inviroment Quality" name="quality" required>

   <!-- <input type="number" Placeholder="Performance Level"  name="performance" required> -->
   <input type="range" min="1" max="100" value="50" class="slider" name="performance">
   <p>Value: <span id="demo"></span></p>
   <script type="text/javascript">
       var slider = document.getElementByName("performance");
      var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
}

   </script>

   <input type="number" Placeholder="Fun Level"          name="fun"         required>
   <input type="number" Placeholder="Health Level"       name="health"    required>
   <input type="hidden" name="sport_id" value="<?php echo $sport_id?>" >

   <button type="submit">Add new Activity</button>

  </div>

 </form>

<?php

   foreach (array_reverse($activities)  as $activity) {
      $a_name = $activity['name'];
      $a_day = $activity['day'];
      $a_id  = $activity['id'];

      $a_place = $activity['place'];
      // if the activiy is realated to the right sport for the user

      echo "<ul><li><p> Sport activity: $a_name, Date: $a_day, Place: $a_place ActivityID: $a_id</p></li></ul>";

   }


?>

</body>
</html>