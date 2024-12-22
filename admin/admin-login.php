<?php 
    require('../include/database.php');
    session_start();

    $admin_email = $_POST['admin_email'];
    $admin_password  = $_POST['admin_password'];
    
    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $_SESSION['admin_name'] =  $row["admin_name"];
            $_SESSION['admin_email'] = $row["admin_email"];
            $_SESSION['admin_role'] =  $row["admin_role"];
        }
        echo '<script>alert("Login Successfully.")</script>';
        echo "<script>setTimeout(\"location.href = 'adminDashboard.php';\",1000);</script>"; 
    }
    else
    {
        // Display the alert box 
        echo '<script>alert("Login failed. Invalid email or password!!")</script>'; 
        echo "<script>setTimeout(\"location.href = 'admin-login.html';\",1000);</script>"; 
    }
?>