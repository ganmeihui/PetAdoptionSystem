<?php
session_start();
require('include/database.php');

$pet_id = $_GET["petid"];
// $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';


// if (!isset($_SESSION['username'])) {
//     echo '<script>alert("You must log in first.")</script>';
//     echo "<script>setTimeout(\"location.href = 'user-login.html';\",1000);</script>"; 
//     exit;
// }

// Store pet_id in the session
$_SESSION['petid'] = $pet_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Pet Profile</title>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
    <h2 style="border-bottom:1px solid #f0f0f0;">Pet Profile</h2>
    </div>

    <?php
    $sql = "SELECT * FROM `pet` WHERE pet_id = $pet_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="adoption-form.php" method="GET" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <?php echo "<img src='admin/uploads/" . $row['image'] . "' width='50%;' alt='Image'>" ?>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label">ID:</label>
            <?php echo $row['pet_id'] ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Name:</label>
            <?php echo $row['pet_name'] ?>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Gender:</label>
          <?php echo $row['gender'] ?>
        </div>

        <div class="mb-3">
          <label class="form-label">Age:</label>
          <?php echo $row['age'] ?>
        </div>

        <div class="mb-3">
          <label class="form-label">Species:</label>
          <?php echo $row['species'] ?>
        </div>

        <div class="mb-3">
          <label class="form-label">Breed:</label>
          <?php echo $row['breed'] ?>
        </div>

        <div class="mb-3">
          <label class="form-label">Vaccinated:</label>
          <?php echo $row['vaccination_status'] ?>
        </div>

        <div class="mb-3" style="text-align: justify;">
          <label class="form-label">Description:</label><br>
          <?php echo $row['description'] ?>
        </div>
        <div style="display: flex; justify-content: center;">
          <a style='display: flex; justify-content: center; align-items:center; background:#0193DE; width: 200px; height: 50px;' type='submit' class='btn btn-success' name='submit' href='adoption-form.php'>Adopt</a>
        </div>
        <div style="height: 10vh;">
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
