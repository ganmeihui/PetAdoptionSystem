<html>
    <!--auto redirect after 1 second-->
    <meta http-equiv = "refresh" content = "1; url = manageAdmin.php" /> 

<?php
	include '../include/database.php';
	 
	$admin_id = $_GET['admin_id'];
	$query = "DELETE from admin WHERE admin_id = '$admin_id'";

	$data=mysqli_query($conn, $query);

	if($data)
	{
		echo "<script>alert('Admin Account Deleted.');</script>";
	}

	else 
	{
		echo "<script>alert('Failed to Delete Admin Account.');</script>";
	}
?>
</html>