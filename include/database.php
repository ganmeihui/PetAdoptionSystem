<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "pet_adoption_system";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn)
	{
		die("<script>alert('Database Connection Failed.')</script>");
	}

?>