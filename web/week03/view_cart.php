<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
   <h1>
<?php

$item = $_POST['item'];
$_SESSION['cart'][$item]++;


?>

      <?php
         echo "the following items are in the cart: \n";
         $no_items = true;

      foreach ($_SESSION['cart'] as $key => $value ) {
          if($key == "00" && $value > 0) {
            echo "Fuji #" . $value;
            $no_items = false;
          }
          if ($key == "01" && $value > 0) {
             echo "Vitamin #" . $value;
             $no_items = false;
          }
          if ($key == "02" && $value > 0) {
            echo "Perfect #" . $value;
            $no_items = false;
          }

      }
      if ($no_items) {
         echo "There are no item in the cart";
      }
      echo "\n";

     // var_dump($_SESSION['cart']);
       ?>

   </h1>
   <p>
      <a href="index.php">Continue shopping</a>
      <a href="checkout.php" >Checkout</a>
   </p>
</body>
</html>