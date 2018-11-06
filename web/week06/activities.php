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
   $stmt = $db->prepare('SELECT id, name, day, place, hour_duration, inviroment_quality FROM activities WHERE sport_id=:sport_id' );
   $stmt->bindvalue(':sport_id', $sport_id);

   $stmt->execute();

   $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // $activity = $stmt->fetch());

   // // performance table

?>

<!DOCTYPE html>
<html>
<head>
   <title>Activities</title>
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

   <input type="number" Placeholder="Performance Level"  name="performance" required>
   <input type="number" Placeholder="Fun Level"          name="fun"         required>
   <input type="number" Placeholder="Health Level"       name="health"    required>
   <input type="hidden" name="sport_id" value="<?php echo $sport_id?>" >

   <button type="submit">Add new Activity</button>

  </div>

 </form>
<?php



  // echo "<li><p> Playing: $s.  $sid</p></li>";
   // loop for activities
   foreach ($activities  as $activity) {
      $a_name = $activity['name'];
      $a_day = $activity['day'];
      $a_id  = $activity['id'];
      //$sportid = $activity['sport_id'];
      $a_place = $activity['place'];
      // if the activiy is realated to the right sport for the user

      echo "<ul><li><p> Sport activity: $a_name, Date: $a_day, Place: $a_place ActivityID: $a_id</p></li></ul>";

      $stmt1 = $db->prepare('SELECT id, name, performance_level, fun_level, health, activitie_id FROM performance WHERE activitie_id=:activity_id');
      $stmt1->bindvalue(':activity_id', $a_id);
      $result = $stmt1->execute();

       if ($result) {

         $performance = $stmt1->fetch();

         $pname = $performance['name'];
         $plevel = $performance['performance_level'];
         $pflevel = $performance['fun_level'];
         $pid  = $performance['id'];
         $perid = $performance['activitie_id'];


         echo "<ul><ul><li><p> Performance LVL($plevel)</p></li></ul></ul>";
         echo "<ul><ul><li><p>Fun Level($pflevel)</p></li></ul></ul>";

       }

   }


?>

</body>
</html>