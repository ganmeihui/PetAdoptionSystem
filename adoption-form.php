<?php
session_start();
require('include/database.php');

if (!isset($_SESSION['email'])) {
    echo '<script>alert("You must log in first.")</script>';
    echo "<script>setTimeout(\"location.href = 'user-login.html';\",1000);</script>"; 
    exit;
}

$adopter_name = $_SESSION['email'];
$adoptpetid = $_SESSION['petid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $question1 = $_POST['Q1'];
  $question2 = $_POST['Q2'];
  $question3 = $_POST['Q3'];
  $question4 = $_POST['Q4'];
  $question5 = $_POST['Q5'];
  
  $status = 'Pending';

   $sql = "INSERT INTO question (Q1,Q2,Q3,Q4,Q5,adopter_name,adoptpet_id, status) VALUES ('$question1','$question2','$question3','$question4','$question5','$adopter_name', '$adoptpetid', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Your application is submitted.');</script>";
        echo "<script>setTimeout(\"location.href = 'adoption.php';\",1000);</script>"; 
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Adoption Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="user-signup.css">
    <style>
        body{
            background: white;
        }
        form{
            background: aliceblue;
        }
   </style>
</head>
<body>
    <form method="POST" action="">
      <h2>Adoption Form</h2>
     <div class="form-group ">
        <label for="Q1">Q1: Do you have a fenced yard?</label>
        <select id="Q1" name="Q1">
        <option value="">--Please choose an option--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        </select>
      </div>

      <div class="form-group ">
        <label for="Q2">Q2: Have you owned pets before?</label>
        <select id="Q2" name="Q2">
        <option value="">--Please choose an option--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        </select>
      </div>

      <div class="form-group ">
        <label for="Q3">Q3: Are you available to spend time with your pet daily??</label>
        <select id="Q3" name="Q3">
        <option value="">--Please choose an option--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        </select>
      </div>

      <div class="form-group ">
        <label for="Q4">Q4: Are you prepared for the financial responsibilities of pet ownership?</label>
        <select id="Q4" name="Q4">
        <option value="">--Please choose an option--</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
        </select>
      </div>

      <div class="form-group ">
        <label for="Q5">Q5: Why Do You Want to Adopt a Pet?</label>
        <input type="text" id="Q5" name="Q5">
      </div>
      
       <div class="form-group submit-btn">
        <input type="submit" value="Submit">
      </div>
      
    </form>
</body>
</html>
