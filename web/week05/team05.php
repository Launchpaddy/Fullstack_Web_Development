<!DOCTYPE html>
<html>
<head>
   <title>PROJECT</title>
</head>
<body>

<h1>Scripture Resources</h1>


<p><?php


try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}




foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
{
  echo "<b>" . $row['book'] . " </b>";
  echo "<b>" . $row['chapter'] . ":</b>";
  echo "<b>" . $row['verse'] . " - \"</b>";
  echo $row['content'] . "\"";
  echo '<br/><br/>';
}


?></p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


seach book: <input type="text" name="name" value="scripture">
<input type="submit" name="submit" value="submit">
</form>

<?php
$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}
echo "<h2>" . $name . "</h2>";
 ?>
</body>
</html>
