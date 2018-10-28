<?php
   require ('dbConnect.php');

$db = get_db();
$query = 'SELECT id, code, name From course';
$stmt = $db->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
   <title>Courses</title>
</head>
<body>
   <h1>Courses</h1>

   <ul>
      <li><p></p></li>
      <li><p></p></li>
      <li><p></p></li>

      <?php
      foreach ($courses as $course) {
         $id = $course['id'];
         $name = $course['name'];
         $code = $course['code'];
         echo "<li><p> <a href='notes.php?id=$id'></a>$code - $name</p></li>\n";

      }

      ?>


   </ul>

</body>
</html>