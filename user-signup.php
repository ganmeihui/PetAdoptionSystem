<?php
        require('include/database.php');

        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $date = $_POST['date'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $psw = $_POST['password'];  
        $password = MD5($psw);  //encrypt password before store in database (security)


        //check whether the same email exist in database
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0)
        {
            $sql = "INSERT INTO user (username,gender,DOB,mobile,email,password) VALUES ('$username','$gender','$date','$mobile','$email','$password')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo '<script>alert("Sign Up Successfully.")</script>';
                echo "<script>setTimeout(\"location.href = 'user-login.html';\",1000);</script>"; 
            }
            else
            {
                echo "Error :".$sql;
            } 
        }
        else
        {
            echo '<script>alert("Email already exist!.")</script>';
            echo "<script>setTimeout(\"location.href = 'user-signup.html';\",1000);</script>"; 
        }
    ?>