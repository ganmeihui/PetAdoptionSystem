<html>
    <!--auto redirect after 1 second-->
    <meta http-equiv = "refresh" content = "1; url = managePet.php" /> 

<?php
	include '../include/database.php';
	 
	// $pet_image = $_POST['image'];
	$pet_id = $_GET['pet_id'];
	$query = "DELETE from pet WHERE pet_id = '$pet_id'";

	$data=mysqli_query($conn, $query);

	if($data)
	{
		echo "<script>alert('Pet Profile Deleted.');</script>";
	}

	else 
	{
		echo "<script>alert('Failed to Delete Pet Profile.');</script>";
	}
?>
</html>
