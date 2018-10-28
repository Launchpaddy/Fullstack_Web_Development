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
    <label for="username"><b>Username</b></label>

    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <a href="create_account.php">Create New Account</a>

  </div>

</form>

</body>
</html>
