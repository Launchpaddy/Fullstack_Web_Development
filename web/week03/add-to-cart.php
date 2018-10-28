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
<?php

$item = $_POST['item'];
$_SESSION['cart'][$item]++;


//echo $item;

?>
 </h1>
<a href="view_cart.php">view cart</a>

</body>
</html>

