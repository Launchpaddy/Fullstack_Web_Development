<!DOCTYPE html>
<html>
<head>
   <title>Create Account</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <h2>Creat New PERFORM Account</h2>
   <form action="add_account.php" method="POST">

      <div class="container">
         <label for="username"><b>Create Username</b></label>
         <input type="text" placeholder="Enter Username"name="username" required>

         <label for="password"><b>Create Password</b></label>
         <input type="password" placeholder="Enter Password" name="password" required>

         <label for="displayName"><b>Choose Display Name</b></label>
         <input type="text" placeholder="Enter Display Name" name="displayName" required>

         <button type="submit">Create Account</button>
      </div>

   </form>

</body>
</html>