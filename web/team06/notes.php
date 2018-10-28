<?php
   require ('dbConnect.php');
   $db = get_db();
   $course_id = htmlspecialchars($_GET['id']);

   $query =  'SELECT * FROM note n JOIN course c ON n.course_id = c.id
 WHERE c.id = :course_id';

 $stmt = $db->prepare($query);
 $stmt->bindValue(":course_id", $course_id, PDO::PARAM_INT);
 $stmt->execute();
 $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

 $couse_code = $notes[0]['name'];
 $couse_code = $notes[0]['code'];



 ?>
<!DOCTYPE html>
<html>
<head>
   <title>Notes</title>
</head>
<body>
   <h1>Notes for: </h1>
   <?php
      foreach ($notes as $note) {
         $content = $note['content'];
         echo "<li><p></a>$content</p></li>\n";

      }

   ?>

</body>
</html>