<?php

session_start();

unset($_SESSION['username']);

session_destroy();

echo '<script>alert("You have logged out successfully..!")</script>';
echo "<script>setTimeout(\"location.href = 'index.php';\",1000);</script>"; 

exit;
?> 
