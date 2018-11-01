<?php
session_start();

   require('dbConnect.php');
   $db = get_db();

   $sport_id   = $_GET['sport_id'];
   $sport_name = $_GET['sport_name'];

   if (isset($_SESSION['logedIn'])) {
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $display_name = $_SESSION['display_name'];
      //$sportId = $_GET['sport_id'];
   }
   else
   {
      // we should be in the session. if we are not we probaly want to redirect to login
      header('Location: login.php');
      die();
   }


   // users table
   // $stmt = $db->prepare('SELECT password, display_name, username, id FROM users');
   // $stmt->execute();
   // $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

   // sports table
   // $stmt2 = $d2->prepare('SELECT name, user_id, id FROM sports');
   // $stmt2->execute();
   // $sports = $stmt2->fetchAll(PDO::FETCH_ASSOC);
   // $user = $_SESSION['username'];

   // // activites table
   $stmt3 = $d3->prepare('SELECT id, name, day, place, hour_duration, inviroment_quality FROM activities WHERE sport_id=:sport_id' );
   $stmt->bindvalue(':sport_id', $sport_id);

   $stmt3->execute();

   $activities = $stmt3->fetchAll(PDO::FETCH_ASSOC);

   // // performance table

?>

<!DOCTYPE html>
<html>
<head>
   <title>Activities</title>
</head>
<body>

<?php
   // $id = $user['id'];
  //
   // foreach ($sports as $sport) {
   //    $sname = $sport['name'];
   //    $sportid = $sport['id'];
   //    if ($sid == $sportid) {
        echo "<h1>$sport_name's Activities</h1>";
   //    }
   ///}

   echo "<a href='homepage.php'>Return to Home</a>";



  // echo "<li><p> Playing: $s.  $sid</p></li>";
   // loop for activities
   foreach ($activities  as $activity) {
      $a_name = $activity['name'];
      $a_day = $activity['day'];
      $a_id  = $activity['id'];
      //$sportid = $activity['sport_id'];
      $a_place = $activity['place'];
      // if the activiy is realated to the right sport for the user

       echo "<ul><li><p> Sport activity: $a_name, Date: $a_day, Place: $a_place</p></li></ul>";

      $stmt = $db->prepare('SELECT id, name, performance_level, fun_level, health, activitie_id FROM performance WHERE activtie_id=:activity_id');
      $stmt->bindvalue(':activity_id', $a_id);
      $stmt->execute();
      $performance = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach ($performance as $per) {
          $pname = $per['name'];
          $plevel = $per['performance_level'];
          $pflevel = $per['fun_level'];
          $pid  = $per['id'];
          $perid = $per['activitie_id'];


          echo "<ul><ul><li><p> Performance LVL($plevel)</p></li></ul></ul>";
          echo "<ul><ul><li><p>Fun Level($pflevel)</p></li></ul></ul>";


       }




   }


?>

 <form action="add_activity.php" method="GET">
    <div class="container">

    <label for="activity"><b>Activity</b></label>

   <input type="text"   placeholder="Enter Activity" name="activity" required>

   <input type="date"   placeholder="Enter Date" name="date" required>

   <input type="text"   Placeholder="Enter Location" name="place" required>

   <input type="number" Placeholder="Duration" name="duration" required>

   <input type="number" Placeholder="Inviroment Quality" name="quality" required>


   <input type="hidden" name="sport_id" value="<?php echo $sid?>" >
   <input type="hidden" name="activity_id" value="<?php echo $aid?>" >


    <button type="submit">Add new Activity</button>

  </div>

 </form>


</body>
</html>