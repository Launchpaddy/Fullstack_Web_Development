<?php

// connect to db
require 'connectdb.php';
$db = get_db();

// qurry for all movies
$stmt = $db->prepare('SELECT ID, title, year, FROM movie');
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);


// go through each movie and display

?>
<!DOCTYPE html>
<html>
<head>
   <title>movies</title>
</head>
<body>
   <h1>Movies</h1>

   <ul>
      <?php
      foreach ($movies as $movie) {
         $title = $movie['title'];
         $year = $movie['year'];
         echo "<li><p>$title ($year)</p></li>";
      }
       ?>
   </ul>



</body>
</html>