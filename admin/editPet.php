<?php
require('../include/database.php');
$pet_id = $_GET["pet_id"];


if (isset($_POST["update_image"])) {
  //  $pet_id = $_POST['petid'];
  $pet_name = $_POST['petname'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $species = $_POST['species'];
  $breed = $_POST['breed'];
  $vacstatus = $_POST['vacstatus'];
  $description = $_POST['description'];
  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];
  $intakedate = $_POST['intakedate'];

  if($new_image != '')
  {
    $update_filenname = $new_image;
    if(file_exists("uploads/".$_FILES['image']['name']))
    {
      $filename = $_FILES['image']['name'];
      // $_SESSION['status'] = $filename." Image already exists"; 
    }
  }
  else
  {
    $update_filenname = $old_image;
  }


  $sql = "UPDATE `pet` SET `pet_name`='$pet_name',`gender`='$gender',`age`='$age',`species`='$species',`breed`='$breed',`vaccination_status`='$vacstatus',`description`='$description',`image`='$update_filenname',`intake_date`='$intakedate' WHERE pet_id = $pet_id";

  $result = mysqli_query($conn, $sql);

  if ($result) 
  {
    if($_FILES['image']['name'] != '')
    {
      move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$_FILES['image']['name']);
      unlink("uploads/".$old_image);
    }
    echo "<script>alert('Update Pet Updated successfully.');</script>";
    echo "<script>setTimeout(\"location.href = 'managePet.php';\");</script>"; 
  } 
  else 
  {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Edit Pet</title>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Pet Profile</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    // $sql = "SELECT * FROM `pet`";
    $sql = "SELECT * FROM `pet` WHERE pet_id = $pet_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">

        <div class="mb-3">
          <label class="form-label">Pet Name:</label>
          <input type="text" class="form-control" name="petname" value="<?php echo $row['pet_name'] ?>">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Gender:</label>
          <select class="form-select" name="gender" required>
            <option value="Female" <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Male" <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Age:</label>
          <input type="text" class="form-control" name="age" value="<?php echo $row['age'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Species:</label>
            <select class="form-select" name="species" required>
                <?php
                $sql = "SELECT cat_id, cat_name FROM category";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<option value="" disabled>Select a species category</option>';
                    while ($cat_row = $result->fetch_assoc()) {
                        $selected = ($cat_row['cat_name'] == $row['species']) ? 'selected' : '';
                        echo '<option value="' . $cat_row['cat_name'] . '" ' . $selected . '>' . $cat_row['cat_name'] . '</option>';
                    }
                } else {
                    echo '<option value="" disabled>No categories available</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Breed:</label>
          <input type="text" class="form-control" name="breed" value="<?php echo $row['breed'] ?>">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Vaccination Status:</label>
          <select class="form-select" name="vacstatus" required>
            <option value="Yes" <?php if($row['vaccination_status'] == 'Yes') echo 'selected'; ?>>Yes</option>
            <option value="No" <?php if($row['vaccination_status'] == 'No') echo 'selected'; ?>>No</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Description:</label>
          <textarea rows="6" class="form-control" name="description"><?php echo $row['description'] ?></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Image:</label>
          <input type="file" class="form-control" name="image" value="<?php echo $row['image'];?>">
          <input type="hidden" class="form-control" name="old_image" value="<?php echo $row['image'];?>">
          <img src="<?php echo "uploads/".$row['image'];?>" style="width: 100px; margin: 10px;" alt="Image"></img>
        </div>

        <div class="mb-3">
          <label class="form-label">Intake Date:</label>
          <input type="date" class="form-control" name="intakedate" value="<?php echo $row['intake_date'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="update_image">Update</button>
          <a href="managePet.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
