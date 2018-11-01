<?php
session_start();
$badLogin = false;

// should only happen if the form has been submitted
if ($_POST['textUsername'] && $_POST['textPassword']) {

  $username = $_POST['textUsername'];
  $password = $_POST['textPassword'];

  require('dbConnect.php');
  $db = get_db();


  $stmt = $db->prepare('SELECT username FROM users WHERE username=:username');
  $stmt->bindvalue(':username', $username);
  $result = $stmt->execute();

  // this will only happen if we have found this username in our database
  if ($result) {

    $row = $stmt->fetch();
    $hashedPasswordFromDB = $row['password'];
    // now check to see if the hashed password matches
    if (password_verify($password, $hashedPasswordFromDB))
    {
      // password was correct, put the user on the session, and redirect to home
      $_SESSION['username'] = $username;
      header("Location: homepage.php");
      die(); // we always include a die after redirects.
    }
    else
    {
      $badLogin = true;
    }

  }
  else
  {
    $badLogin = true;
  }


}

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

<form action="login.php" method="POST">



  <div class="container">
    <?php
      if ($badLogin) {
        echo "Incorect usernam or password";
      }

     ?>


    <label for="username"><b>Username</b></label>

    <input type="text" placeholder="Enter Username" name="txtUsername" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txtPassword" required>

    <button type="submit">Login</button>
    <a href="create_account.php">Create New Perform Account</a>

  </div>

</form>

</body>
</html>
