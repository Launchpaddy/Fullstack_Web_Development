<?php
   session_start();
 ?>


<?php
   if (isset($_SESSION['logedIn'])) {
      $username = $_SESSION['username'];
      // $password = $_SESSION['password'];
      // $displayName = $_SESSION['displayName'];
   }
   else
   {
      // $perfUser = $_POST['username'];
      // $perfPass = $_POST['password'];
      // $perfDName = $_POST['displayName'];

      $username = htmlspecialchars($_POST['username']);
      $_SESSION['username'] = $username;

      $password = htmlspecialchars($_POST['password']);
      $_SESSION['password'] = $password;

      $displayName = htmlspecialchars($_POST['displayName']);
      $_SESSION['displayName'] = $displayName;
      $_SESSION['logedIn'] = true;
   }


   require('dbConnect.php');
   $db = get_db();



   // users table
   $stmt = $db->prepare('SELECT display_name FROM users WHERE username=:username');
   $stmt->bindvalue(':username', $username);
   $user = $stmt->execute();

   $row = $stmt->fetch();

   $userDisplayName = $row['display_name'];
   // sports table
   // $stmt2 = $d2->prepare('SELECT name, user_id, id FROM sports');
   // $stmt2->execute();
   // $sports = $stmt2->fetchAll(PDO::FETCH_ASSOC);

   // activites table

    // echo "<h1>username: $perfUser Password: $perfPass </h1>";

?>

<!DOCTYPE html>
<html>
<head>
   <title>Home Page</title>
</head>
<body>
<?php
   //  foreach ($users as $user) {
   //    $p  = $user['password'];
   //    $u  = $user['username'];
   //    $d  = $user['display_name'];
   //    if ($username == $u && $password == $p) {
   //       // echo "<h1>$d's Home Page</h1>";
   //       $masterUser = $user;
   //    }
   // }

   // $p  = $masterUser['password'];
   // $u  = $masterUser['username'];
   // $d  = $masterUser['display_name'];
   // $masterId = $masterUser['id'];
   echo "<h1>$userDisplayName's PERFORM Home Page</h1>";
   echo "<h2>Sports</h2>";
   // echo "<ul>";
   // foreach ($sports as $sport) {
   //    $sname = $sport['name'];
   //    $j = $sport['user_id'];
   //    $sid = $sport['id'];
   //    if ($masterId == $j) {
   //       // $_SESSION['sportId'] = $sid;
   //       echo "<li><a href=\"activities.php?sport_id=$sid\">$sname</a></li>";
   //    }
   // }
   // echo "</ul>";
 ?>

 <form action="add_sport.php" method="POST">
    <div class="container">

    <label for="sport"><b>Add Sport</b></label>

    <input type="text" placeholder="Enter Sport" name="sport" required>

    <input type="hidden" name="id" value="<?php echo $masterId ?>" >


    <button type="submit">Add new Sport</button>

  </div>

 </form>

</body>
</html>