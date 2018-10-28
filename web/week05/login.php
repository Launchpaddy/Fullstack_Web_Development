<?php
session_start();

$_SESSION['perfUser'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>


<h2>Login to PERFORM</h2>

<form action="homepage.php" method="POST">


  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>

    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>

  </div>

</form>

</body>
</html>
