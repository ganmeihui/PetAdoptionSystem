<?php
    include('include/database.php');

    session_start();
    if (isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $psw = trim($_POST['password']);
    $password = MD5($psw);  //encrypt password before store in database
    
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $_SESSION['username'] =  $row['username'];
            $_SESSION['email'] =  $row['email'];
        }
        // echo '<script>alert("Login Successfully.")</script>';
        echo "<script>setTimeout(\"location.href = 'index.php';\",1000);</script>"; 
    }
    else
    {
        // Display the alert box 
        echo '<script>alert("Login failed. Invalid email or password!!")</script>'; 
        echo "<script>setTimeout(\"location.href = 'user-login.html';\",1000);</script>"; 
    
    }
    }
?>
