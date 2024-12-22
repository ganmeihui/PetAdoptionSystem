<?php
    include('../include/database.php');

    $admin_name = $admin_email = $admin_password = '';

    $admin_name = $_POST['adminname'];
    $admin_email = $_POST['adminemail'];
    $admin_password = $_POST['adminpassword'];
    $admin_role = $_POST['adminrole'];

    //check whether the same email exist in database
    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        echo '<script>alert("Sorry... Email already exist!")</script>'; 
    }
    else
    {
        $sql = "INSERT INTO admin(admin_name,admin_email,admin_password, admin_role) VALUES ('$admin_name','$admin_email','$admin_password', '$admin_role')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo "<script>alert('New Admin Added successfully.');</script>";
            echo "<script>setTimeout(\"location.href = 'manageAdmin.php';\",1000);</script>"; 
        }
        else
        {
            echo "<script>alert('New Admin Added Failed..!');</script>";
            echo "<script>setTimeout(\"location.href = 'manageAdmin.php';\",1000);</script>"; 
        } 
    }
?>