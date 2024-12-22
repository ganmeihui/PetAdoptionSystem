<?php
    include('../include/database.php');

    if (isset($_POST['add'])){
    $pet_name = $_POST['petname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $category = $_POST['category'];
    $breed = $_POST['breed'];
    $vacstatus = $_POST['vacstatus'];
    $description = $_POST['description'];
    $intakedate = $_POST['intakedate'];

    // File upload handling
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $uploads_dir = 'uploads/';

    // Create the uploads directory if it doesn't exist
    if (!file_exists($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($tmp_name, $uploads_dir . $image)) {
        echo "Record uploaded successfully<br>";
    } else {
        echo "File upload failed<br>";
    }

        $sql = "INSERT INTO pet (pet_name, gender, age, species, breed, vaccination_status, description, image, intake_date)
        VALUES ('$pet_name','$gender','$age','$category','$breed','$vacstatus','$description', '$image', '$intakedate')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            
            echo "<script>alert('New Pet Added successfully.');</script>";
            echo "<script>setTimeout(\"location.href = 'managePet.php';\");</script>"; 
        }
        else
        {
            echo "<script>alert('New Pet Added Failed..!');</script>";
            echo "<script>setTimeout(\"location.href = 'managePet.php';\",1000);</script>"; 
        } 
    }
?>