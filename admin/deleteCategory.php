
    <!--auto redirect after 1 second-->
    <meta http-equiv = "refresh" content = "1; url = manageCategory.php" /> 

<?php
	include '../include/database.php';
	 
	$cat_id = $_GET['cat_id'];
	$query = "DELETE from category WHERE cat_id = '$cat_id'";

	$data=mysqli_query($conn, $query);

	if($data)
	{
		echo "<script>alert('Category Deleted.');</script>";
	}

	else 
	{
		echo "<script>alert('Failed to Delete Category.');</script>";
	}
?>
