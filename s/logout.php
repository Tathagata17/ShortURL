<?php 
session_start();
session_unset();
session_destroy();
echo"hey you logged out";
header("location:login.php");
?>