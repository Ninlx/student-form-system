<?php
session_start();
unset($_SESSION['Userlog']);
unset($_SESSION['Access']);
echo header("LOCATION: index.php");
?>