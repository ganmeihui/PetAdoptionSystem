<?php
session_start();
require('../include/database.php');

// Check if pet_id is set in GET or POST request
if (isset($_GET['pet_id'])) {
    $pet_id = $_GET['pet_id'];
    $_SESSION['pet_id'] = $pet_id;
} else {

    die('Error: pet_id is not set.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .form-label {
    margin-bottom: 1.0rem;
}
</style>
  <title>Request</title>
</head>

<body>
  <div class="container" style="margin-top: 30px;">
    <div class="text-center mb-4">
      <h2 style="border-bottom:1px solid #f0f0f0;">Pet Profile</h2>
    </div>

    <?php 
    $sql = "SELECT * FROM pet 
            WHERE pet_id = '$pet_id' LIMIT 1";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("No records found for pet_id: $pet_id");
    }
    ?>

    <div class="container d-flex justify-content-center">
      <form action="manageAdoptRequest.php" method="GET" style="width:50vw; min-width:300px;">

        <!-- Adopt Detail Section -->
        <div class="row mb-3">
          <div class="col">
            <img src='<?php echo "uploads/" . $row['image']; ?>' width='200px;' alt='Image'>
            <br><br>
            <label class="form-label">ID: <?php echo $row['pet_id'] ?></label>
            <br>
            <label class="form-label">Pet Name: <?php echo $row['pet_name'] ?></label>
            <br>
            <label class="form-label">Gender: <?php echo $row['gender'] ?></label>
            <br>
            <label class="form-label">Age: <?php echo $row['age'] ?></label>
            <br>
            <label class="form-label">Species: <?php echo $row['species'] ?></label>
            <br>
            <label class="form-label">Breed: <?php echo $row['breed'] ?></label>
            <br>
            <label class="form-label">Vaccination Status: <?php echo $row['vaccination_status'] ?></label>
            <br>
            <label class="form-label">Description: <br> <?php echo $row['description'] ?></label>
            <br>
            <label class="form-label">Intake Date: <?php echo $row['intake_date'] ?></label>
          </div>
        </div>

        <div style="display: flex; justify-content: center; align-items:center;">
          <a style='display: flex; justify-content: center; align-items:center; background:#0193DE; width: 200px; height: 50px;' type='submit' class='btn btn-success' name='submit' href='managePet.php'>Back</a>
        </div>
        <div style="height: 10vh;"></div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
