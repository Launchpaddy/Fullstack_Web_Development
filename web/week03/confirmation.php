<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
<?php
session_start()
?>

<h1>
Thank you
Item have been shipped:
<?php

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
echo $item;

?>
 </h1>

</body>
</html>
