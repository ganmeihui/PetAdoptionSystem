<?php
    include('../include/database.php');

    $cat_name = $_POST['catname'];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $cat_created_date = date("Y-m-d h:i:s");

    $sql = "INSERT INTO category(cat_name, cat_created_date) VALUES ('$cat_name', '$cat_created_date')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "<script>alert('New Category Added successfully.');</script>";
        echo "<script>setTimeout(\"location.href = 'manageCategory.php';\",1000);</script>"; 
    }
    else
    {
        echo "<script>alert('New Category Added Failed..!');</script>";
        echo "<script>setTimeout(\"location.href = 'manageCategory.php';\",1000);</script>"; 
    } 
?>