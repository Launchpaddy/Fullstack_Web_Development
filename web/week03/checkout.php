<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Checkout</title>
</head>
<body>
   <form action="confirmation.php">
      Address:
      <input type="text" name="Address">
      <input type="submit" name="Submit">
   </form>
   <a href="view_cart.php">Go back to cart</a>

</body>
</html>