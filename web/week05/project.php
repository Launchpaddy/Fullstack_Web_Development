<?php

// connect to db

require('dbConnect.php');
$db = get_db();
$d2 = get_db();
$d3 = get_db();
$d4 = get_db();

// users table
$stmt = $db->prepare('SELECT display_name, username, id, password FROM users');
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// sports table
$stmt2 = $d2->prepare('SELECT name, user_id, id FROM sports');
$stmt2->execute();
$sports = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// activites table
$stmt3 = $d3->prepare('SELECT id, name, day, place, hour_duration, inviroment_quality, sport_id FROM activities');
$stmt3->execute();
$activities = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// performance table
$stmt4 = $d4->prepare('SELECT id, name, performance_level, fun_level, health, activitie_id FROM performance');
$stmt4->execute();
$performance = $stmt4->fetchAll(PDO::FETCH_ASSOC);



// go through each movie and display
?>
<!DOCTYPE html>
<html>
<head>
   <title>PROJECT</title>
</head>
<body>

<h1>Welcome to <b>PERFORM</b></h1>

<ul><?php
   // loop for the user
   foreach ($users as $user) {
      $i  = $user['display_name'];
      $j  = $user['username'];
      $id = $user['id'];
      $pwd = $user['password'];
      echo "<li><p>$i Username: ($j) ID:$id Password:$pwd</p></li>";

      // loop for the sports
      foreach ($sports as $sport) {

         $s = $sport['name'];
         $j = $sport['user_id'];
         $sid = $sport['id'];

         // if the sport we are on is for the user we are on
         if($id == $j) {

            echo "<li><p> Playing: $s. Sport_id: $sid</p></li>";
            // loop for activities
            foreach ($activities  as $activity) {
               $aname = $activity['name'];
               $aday = $activity['day'];
               $aid  = $activity['id'];
               $sportid = $activity['sport_id'];
               // if the activiy is realated to the right sport for the user
               if ($sid == $sportid) {
                  echo "<ul><li><p> Sport activity: $aname and Activity_ID: $aid</p></li></ul>";

                  foreach ($performance as $per) {
                     $pname = $per['name'];
                     $plevel = $per['performance_level'];
                     $pflevel = $per['fun_level'];
                     $pid  = $per['id'];
                     $perid = $per['activitie_id'];

                     if ($aid == $perid) {
                       echo "<ul><li><p> Performance LVL($plevel) Fun Level($pflevel)</p></li></ul>";
                     }

                  }

               }


            }


         }
      }

   }


?></ul>

</body>
</html>
