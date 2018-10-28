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
         <label for="uname"><b>Create Username</b></label>
         <input type="text" placeholder="Enter Username"name="uname" required>

         <label for="psw"><b>Create Password</b></label>
         <input type="password" placeholder="Enter Password" name="psw" required>

         <label for="dname"><b>Choose Display Name</b></label>
         <input type="password" placeholder="Enter Display Name" name="dname" required>

         <button type="submit">Create Account</button>
      </div>

   </form>

</body>
</html>