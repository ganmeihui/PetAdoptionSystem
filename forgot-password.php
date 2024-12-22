<?php
    include('include/database.php');

    $email = $_POST["email"];
    $psw = $_POST['new_password'];
    $new_password = MD5($psw);

    function isEmailExists($email, $conn) {

        // SQL query to check if email exists
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
    
        // If email is not found, return false
        if ($result->num_rows == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    if (isset($_POST['reset'])){

        if (!isEmailExists($email, $conn)) {
            echo "<script>alert('The email you entered is not registered. Please double-check your email or consider signing up.');</script>";
            echo "<script>setTimeout(\"location.href = 'forgot-password.html';\",1000);</script>"; 

        } else {
    
            // Email exists, continue with password reset process
            $query = "UPDATE user SET password = '$new_password' WHERE email = '$email'";
        
            $result = mysqli_query($conn, $query);
        
            if ($result) {
                echo '<script>alert("Your password has been successfully changed")</script>';
                echo "<script>setTimeout(\"location.href = 'user-login.html';\",1000);</script>";
            } 
            else 
            {
                echo '<script>alert("Your password is failed to changed")</script>'; 
                echo "<script>setTimeout(\"location.href = 'forgot-password.php';\",1000);</script>"; 
            }
            exit();
        }
    }
?>
