<?php
session_start();
setcookie(session_name(), '', 100);
//setcookie();
session_unset();
session_destroy();
$_SESSION = array();
header("location: login1.php?header=Session&msg=\"Logout Success!\"");
exit();
?>
