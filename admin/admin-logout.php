<?php

session_start();

unset($_SESSION['admin_name']);

session_destroy();

echo '<script>alert("You have logged out successfully..!")</script>';
echo "<script>setTimeout(\"location.href = 'admin-login.html';\",1000);</script>"; 

exit;
?> 
