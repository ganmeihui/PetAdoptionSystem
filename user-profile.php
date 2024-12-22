<?php
ob_start(); // Start output buffering

require_once('include/header.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$current_email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $current_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $gender = $row['gender'];
    $dob = $row['DOB'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['phone'])) {
        $new_username = $_POST['name'];
        $new_mobile = $_POST['phone'];
        if (strlen($new_mobile) <= 20) {
            $update_query = "UPDATE user SET username = ?, mobile = ? WHERE email = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sss", $new_username, $new_mobile, $current_email);

            if (!empty($_POST['new_password'])) {
                $psw = $_POST['new_password'];
                $new_password = MD5($psw);
                $update_query = "UPDATE user SET username = ?, mobile = ?, password = ? WHERE email = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ssss", $new_username, $new_mobile, $new_password, $current_email);
            }

            if ($stmt->execute() === TRUE) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error updating record: " . $stmt->error;
            }
        } else {
            echo "Error: Mobile number exceeds maximum length allowed.";
        }
    }
}

$conn->close();

ob_end_flush(); // Flush the output buffer and send output to the browser
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
            html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            ov
            
        }

        .container {
            width: 60%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        h2 {
            color: #333;
            margin-top: 0;
            text-align: center;
        }

        .user-info p {
            margin: 10px 0;
            color: #666;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .edit-btn, .back-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #ccc;
            color: #333;
        }

        .back-btn:hover {
            background-color: #b3b3b3;
        }

        .form-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            overflow: auto;
        }

        .form-container {
            background-color: #fefefe;
            padding: 30px; 
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%; 
            max-width: 800px; 
            margin: 100px auto;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #0C71C3;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="password"], input[type="tel"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #0C71C3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        input:disabled {
            background: #e3e3e3;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .container {
                width: 60%;
                margin: 10px auto;
            }

            .form-container {
                width: 60%;
                margin: 90px auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <div class="user-info">
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $current_email; ?></p>
            <p><strong>Mobile Phone:</strong> <?php echo $mobile; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
        </div>
        <div class="button-container">
            <button class="edit-btn" onclick="openForm()">Edit</button>
            <!--<a class="back-btn" href="index.php">Back</a>-->
        </div>
        <div class="form-popup" id="editForm">
            <div class="form-container">
                <span class="close" onclick="closeForm()">&times;</span>
                <h2>Edit Profile</h2>
                <form id="edit-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" id="name" name="name" value="<?php echo $username; ?>">
                    </div> 
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="<?php echo $current_email; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone">Mobile Phone:</label>
                        <input type="text" id="phone" name="phone" value="<?php echo $mobile; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" id="gender" name="gender" disabled value="<?php echo $gender; ?>">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" disabled value="<?php echo $dob; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password (leave blank if unchanged):</label>
                        <div style="position: relative;">
                            <input type="password" id="password" name="new_password">
                            <i class="fas fa-eye" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);" onclick="toggleNewPassword()"></i>
                        </div>
                    </div>
                    <input type="submit" value="Save Changes">
                </form>
            </div>
        </div>
    </div>

    <script>
        function openForm() {
            document.getElementById("editForm").style.display = "block";
            document.body.style.overflow = "hidden"; 
        }

        function closeForm() {
            document.getElementById("editForm").style.display = "none";
            document.body.style.overflow = "auto"; 
        }

        function toggleNewPassword() {
            var newPasswordInput = document.getElementById('password');
            if (newPasswordInput.type === 'password') {
                newPasswordInput.type = 'text';
            } else {
                newPasswordInput.type = 'password';
            }
        }
    </script>
</body>
</html>
<?php require_once('include/footer.php'); ?>
