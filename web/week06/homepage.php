<?php

   session_start();

   if (isset($_SESSION['logedIn'])) {
      $username     = $_SESSION['username'];
      $password     = $_SESSION['password'];
      $display_name = $_SESSION['display_name'];
      $user_id      = $_SESSION['user_id'];
   }
   else
   {
      // we should be in the session. if we are not we probaly want to redirect to login
      header('Location: login.php');
      die();
   }

   require('dbConnect.php');
   $db = get_db();


   $stmt = $db->prepare('SELECT name, id FROM sports WHERE user_id=:user_id');

   $stmt->bindvalue(':user_id', $user_id);
   $stmt->execute(); // this needs to be before the fetchAll statement

   $sports = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
   <title>Home Page</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Sorta spageti code but its a nice way to customize the page -->
  <h1><?php echo $display_name; ?>'s PERFORM Home Page</h1>
  <h2>Sports</h2>

  <a href="logOut.php">Log Out</a>

  <form action="add_sport.php" method="POST">
    <div class="container">

    <label for="sport"><b>Add Sport</b></label>

    <input type="text" placeholder="Enter Sport" name="sport" required>

    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" >

    <button type="submit">Add new Sport</button>

  </div>

  </form>

  <ul>
<?php
  // loop through all the sports in reverse order
   foreach (array_reverse($sports) as $sport) {
       $sport_name = $sport['name'];
       $sport_id = $sport['id'];
       echo "<a href=\"activities.php?sport_id=$sport_id&sport_name=$sport_name\">$sport_name</a>";
   }

 ?>
 </ul>

</body>
</html>