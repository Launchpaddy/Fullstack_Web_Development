<?php

   session_start();

   if (isset($_SESSION['logedIn'])) {
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $display_name = $_SESSION['display_name'];
      $user_id = $_SESSION['user_id'];
   }
   else
   {
      // we should be in the session. if we are not we probaly want to redirect to login
      header('Location: login.php');
      die();
   }


   require('dbConnect.php');
   $db = get_db();



   // users table
   $stmt = $db->prepare('SELECT name, id FROM sports WHERE user_id=:user_id');

   $stmt->bindvalue(':user_id', $user_id);
   $stmt->execute(); // this needs to be before the fetchAll statement

   $sports = $stmt->fetchAll(PDO::FETCH_ASSOC);


  // echo "<h1>user_id: $user_id </h1>";

?>

<!DOCTYPE html>
<html>
<head>
   <title>Home Page</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>

  <h1><?php echo $display_name; ?>'s PERFORM Home Page</h1>
  <h2>Sports</h2>
  <form action="add_sport.php" method="POST">
    <div class="container">

    <label for="sport"><b>Add Sport</b></label>

    <input type="text" placeholder="Enter Sport" name="sport" required>

    <input type="hidden" name="user_id" value="<?php echo $user_id ?>" >


    <button type="submit">Add new Sport</button>

  </div>

  </form>
<?php

  echo "<ul>";
   foreach ($sports as $sport) {
       $sport_name = $sport['name'];
       $sport_id = $sport['id'];
       echo "<li><a href=\"activities.php?sport_id=$sport_id&sport_name=$sport_name\">$sport_name</a></li>";

   }
  echo "</ul>";
 ?>


</body>
</html>