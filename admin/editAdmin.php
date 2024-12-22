<?php
require('../include/database.php');
$id = $_GET["admin_id"];

if (isset($_POST["submit"])) {
  $name = $_POST['adminname'];
  $email = $_POST['adminemail'];
  $password = $_POST['adminpassword'];
  $role = $_POST['adminrole'];

  $sql = "UPDATE `admin` SET `admin_name`='$name',`admin_email`='$email',`admin_password`='$password', `admin_role`='$role' WHERE admin_id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: manageAdmin.php");
  } else {
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

  <title>Edit Admin</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="">
   
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Admin Profile</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `admin` WHERE admin_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Admin Name:</label>
            <input type="text" class="form-control" name="adminname" value="<?php echo $row['admin_name'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="adminemail" value="<?php echo $row['admin_email'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="text" class="form-control" name="adminpassword" value="<?php echo $row['admin_password'] ?>">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Role:</label>
          <select class="form-select" name="adminrole" required>
            <option value="Superadmin" <?php if($row['admin_role'] == 'Superadmin') echo 'selected'; ?>>Superadmin</option>
            <option value="Admin" <?php if($row['admin_role'] == 'Admin') echo 'selected'; ?>>Admin</option>
          </select>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="manageAdmin.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>