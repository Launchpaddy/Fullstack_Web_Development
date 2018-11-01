<?php
   session_start();
 ?>


<?php
   if (isset($_SESSION['logedIn'])) {
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $display_name = $_SESSION['display_name'];
      $user_id = $_SESSION['user_id'];
   }
   else
   {
      // we should be in the session. if we are not we probaly want to redirect to login

      // $perfUser = $_POST['username'];
      // $perfPass = $_POST['password'];
      // $perfDName = $_POST['displayName'];

      // $username = htmlspecialchars($_POST['username']);
      // $_SESSION['username'] = $username;

      // $password = htmlspecialchars($_POST['password']);
      // $_SESSION['password'] = $password;

      // $displayName = htmlspecialchars($_POST['display_name']);
      // $_SESSION['displayName'] = $displayName;
      // $_SESSION['logedIn'] = true;
   }


   require('dbConnect.php');
   $db = get_db();



   // users table
   $stmt = $db->prepare('SELECT name, id FROM sports WHERE user_id=:user_id');

   $stmt->bindvalue(':user_id', $user_id);
   $sports = $stmt->fetchAll(PDO::FETCH_ASSOC);

   //$row = $stmt->fetch();
   $stmt->execute();

   //$userDisplayName = $row['display_name'];
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
   echo "<h1>$display_name's PERFORM Home Page</h1>";
   echo "<h2>Sports</h2>";
   echo " <h3>username: $username</h3>
   <h3>password: $password</h3>
   <h3>display name: $display_name</h3>
   <h3>user ID: $user_id</h3>";
   // echo "<ul>";
   foreach ($sports as $sport) {
       $sport_name = $sport['name'];
      // $j = $sport['user_id'];
       $sport_id = $sport['id'];
      // if ($masterId == $j) {
         // $_SESSION['sportId'] = $sid;
         echo "<li><a href=\"activities.php?sport_id=$sport_id\">$sport_name</a></li>";
     // }
   }
   // echo "</ul>";
 ?>

 <form action="add_sport.php" method="POST">
    <div class="container">

    <label for="sport"><b>Add Sport</b></label>

    <input type="text" placeholder="Enter Sport" name="sport" required>

    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" >


    <button type="submit">Add new Sport</button>

  </div>

 </form>

</body>
</html>