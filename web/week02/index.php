<!DOCTYPE html>
<html>
<head>
   <title>Trevik's Home Page</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <h1>Trevik Peterson</h1>
   <div class="topnav">
      <a class="active" href="#home">home</a>
      <a href="assignments.html">Homework</a>
      <a href="#page1">These</a>
      <a href="#page2">Are</a>
      <a href="#page3">Links</a>
   </div>
   <p>I'm the 13th child out of 14 in my family.<br /> I grew up in Heyburn Idaho and I love hunting and sports</p>

   <img src="IMG_1857.jpg" width="600" class="center">
   <p> <?php
      date_default_timezone_set("America/Boise");
      echo "page opened at " . date("h:i a");

   ?></p>

</body>
</html>