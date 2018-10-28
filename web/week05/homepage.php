<?php
   session_start();
 ?>


<?php
   $perfUser = $_POST['uname'];
   $perfPass = $_POST['psw'];


   require('dbConnect.php');
   $db = get_db();
   $d2 = get_db();


   // users table
   $stmt = $db->prepare('SELECT password, display_name, username, id FROM users');
   $stmt->execute();
   $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

   // sports table
   $stmt2 = $d2->prepare('SELECT name, user_id, id FROM sports');
   $stmt2->execute();
   $sports = $stmt2->fetchAll(PDO::FETCH_ASSOC);

   // activites table




    // echo "<h1>Username: $perfUser Password: $perfPass </h1>";

?>

<!DOCTYPE html>
<html>
<head>
   <title>Home Page</title>
</head>
<body>
<?php
    foreach ($users as $user) {
      $p  = $user['password'];
      $u  = $user['username'];
      // $d  = $user['display_name'];
      if ($perfUser == $u && $perfPass == $p) {
         // echo "<h1>$d's Home Page</h1>";
         $masterUser = $user;


      }
   }

   $p  = $masterUser['password'];
   $u  = $masterUser['username'];
   $d  = $masterUser['display_name'];
   $masterId = $masterUser['id'];
   echo "<h1>$d's PERFORM Home Page</h1>";
   echo "<h2>Sports</h2>";
   foreach ($sports as $sport) {
      $sname = $sport['name'];
      $j = $sport['user_id'];
      $sid = $sport['id'];
      if ($masterId == $j) {
          $_SESSION['perfUser'] = $sid;
         echo "<a href=\"activities.php\">$sname</a>";


      }
   }
 ?>

</body>
</html>