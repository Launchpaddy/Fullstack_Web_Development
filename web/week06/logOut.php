<?php
// I think this is evrything I need to kill the session
session_start();
session_unset();
session_destroy();

header("location:login.php");
die();

?>