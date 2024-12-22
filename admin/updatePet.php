<?php 
session_start();

$id = $_GET["pet_id"];

  if(isset($_POST["update_image"]))
  {
    $petid = $_POST['petid'];
  $name = $_POST['petname'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $species = $_POST['species'];
  $breed = $_POST['breed'];
  $vacstatus = $_POST['vacstatus'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $intakedate = $_POST['intakedate'];

    $new_image = $_FILES['image']['name']; 
    $old_image = $_POST['old_image'];

    if($new_image != '')
    {
      $update_filenname = $_FILES['image']['name']; 
    }
    else
    {
      $update_filenname = $old_image;
    }

    if(file_exists("uploads/".$_FILES["image"]["name"]))  
    {
      $filename = $_FILES['image']['name']; 
      $_SESSION['status'] = "Image already Exists".$filename;
      header('Location:editPet.php');
    }
    else
    {
      $sql = "UPDATE `pet` SET `pet_id`='$petid',`pet_name`='$name',`gender`='$gender',`age`='$age',
      `species`='$species',`breed`='$breed',`vaccination_status`='$vacstatus',`description`='$description',`image`='$update_filenname',
      `intake_date`='$intakedate' WHERE pet_id = $id";
    
      $result = mysqli_query($conn, $sql);
    
      if ($result) {
        header("Location: managePet.php");
      } 
      else 
      {
        echo "Failed: " . mysqli_error($conn);
      }
    }

  }

 

?>