<html>
    <!--auto redirect after 1 second-->
    <meta http-equiv = "refresh" content = "1; url = manageUser.php" /> 

<?php
	include '../include/database.php';
	 
	$user_id = $_GET['user_id'];
	$query = "DELETE from user WHERE user_id = '$user_id'";

	$data=mysqli_query($conn, $query);

	if($data)
	{
		echo "<script>alert('User Account Deleted.');</script>";
	}

	else 
	{
		echo "<script>alert('Failed to Delete User Account.');</script>";
	}
?>
</html>
