<?php
session_start();
require('../include/database.php');

// Check if apply_id is set in GET or POST request
if (isset($_GET['apply_id'])) {
    $apply_id = $_GET['apply_id'];
    $_SESSION['apply_id'] = $apply_id;
} else {
    // Handle the error if apply_id is not set
    die('Error: apply_id is not set.');
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

  <title>Request</title>
</head>

<body>
  <div class="container" style="margin-top: 30px;">
    <div class="text-center mb-4">
      <h2 style="border-bottom:1px solid #f0f0f0;">Request Detail</h2>
    </div>

    <?php 
    $sql = "SELECT q.*, u.username, u.gender, u.mobile, u.email,
            p.pet_name, p.gender, p.age, p.species, p.breed, p.image
            FROM question q 
            JOIN user u ON q.adopter_name = u.email 
            JOIN pet p ON q.adoptpet_id = p.pet_id 
            WHERE q.apply_id = '$apply_id' LIMIT 1";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("No records found for apply_id: $apply_id");
    }
    ?>

    <div class="container d-flex justify-content-center">
      <form action="manageAdoptRequest.php" method="GET" style="width:50vw; min-width:300px;">

        <!-- Adopt Detail Section -->
        <div class="row mb-3">
          <div class="col">
            <h4>Adopter Detail</h4>
            <label class="form-label">ID: <?php echo $row['apply_id'] ?></label>
            <br>
            <label class="form-label">Adopter Name: <?php echo $row['username'] ?></label>
            <br>
            <label class="form-label">Adopter Gender: <?php echo $row['gender'] ?></label>
            <br>
            <label class="form-label">Adopter Phone: <?php echo $row['mobile'] ?></label>
            <br>
            <label class="form-label">Adopter Email: <?php echo $row['email'] ?></label>
            <br>
            <label class="form-label">Apply Date: <?php echo $row['apply_date'] ?></label>
          </div>
        </div>
        <hr>

        <!-- Question Detail Section -->
        <div class="row mb-3">
          <div class="col">
            <h4>Question Detail</h4>
            <label class="form-label">Question 1 - Do you have a fenced yard?</label>
            <p><?php echo $row['Q1'] ?></p>
            <label class="form-label">Question 2 - Have you owned pets before?</label>
            <p><?php echo $row['Q2'] ?></p>
            <label class="form-label">Question 3 - Are you available to spend time with your pet daily?</label>
            <p><?php echo $row['Q3'] ?></p>
            <label class="form-label">Question 4 - Are you prepared for the financial responsibilities of pet ownership?</label>
            <p><?php echo $row['Q4'] ?></p>
            <label class="form-label">Question 5 - Why Do You Want to Adopt a Pet?</label>
            <p><?php echo $row['Q5'] ?></p>
          </div>
        </div>
        <hr>

        <!-- Pet Detail Section -->
        <div class="row mb-3">
          <div class="col">
            <h4>Pet Detail</h4>
            <label class="form-label">Pet ID: <?php echo $row['adoptpet_id'] ?></label>
            <br>
            <label class="form-label">Pet Name: <?php echo $row['pet_name'] ?></label>
            <br>
            <label class="form-label">Pet Gender: <?php echo $row['gender'] ?></label>
            <br>
            <label class="form-label">Pet Age: <?php echo $row['age'] ?></label>
            <br>
            <label class="form-label">Pet Species: <?php echo $row['species'] ?></label>
            <br>            
            <label class="form-label">Pet Breed: <?php echo $row['breed'] ?></label>
            <br>
            <label class="form-label">Pet Image: </label><br>
            <img src='<?php echo "uploads/" . $row['image']; ?>' width='200px;' alt='Image'>
          </div>
        </div>

        <div style="display: flex; justify-content: center; align-items:center;">
          <a style='display: flex; justify-content: center; align-items:center; background:#0193DE; width: 200px; height: 50px;' type='submit' class='btn btn-success' name='submit' href='manageAdoptRequest.php'>Back</a>
        </div>
        <div style="height: 10vh;"></div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
