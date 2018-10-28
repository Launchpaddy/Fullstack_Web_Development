<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Browse</title>
</head>

<body>

<?php

if (!isset($_SESSION['cart']) ) {

$_SESSION['cart'] =
   [
      '00' => 0,
      '01' => 0,
      '02' => 0

   ];
}


?>


   <ul>
      <form action="view_cart.php" method="POST">
         <input type="submit" name="item" value="Buy fuji water">
         <input type="hidden" name="item" value="00">
      </form>
      <br>
      <form action="view_cart.php" method="POST">
         <input type="submit" name="item" value="Buy vitamin water">
         <input type="hidden" name="item" value="01">
      </form>
      <br>
      <form action="view_cart.php" method="POST">
         <input type="submit" name="item" value="Buy perfect water ">
         <input type="hidden" name="item" value="02">
      </form>

   </ul>


   <a href="view_cart.php" value="View Cart"></a>

</body>
</html>