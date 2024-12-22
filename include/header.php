<?php session_start();
    
    require('database.php');
    
    if(isset($_SESSION['username']))
    {
      $username = $_SESSION['username'];
    }
    else
    {
      $username = '';
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="include/header.css">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
    
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .login-link {
        text-decoration: none;
        padding: 10px;
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 140%;;
        left: -30px;
        top: 40px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    
    .dropdown-content a {
        color: #0193DE;
        padding: 8px 5px;
        text-decoration: none;
        display: block;
        border-bottom: 1px solid #e3e3e3;
        font-size: 14px;
        font-weight: 600;
        background: white;
        text-align: center;
    }
    
    .dropdown-content a:hover {
        background-color: #e3e3e3;
    }
    
    .show {
        display: block;
    }
    </style>
</head>  
<body>
  <header>
    <div class="bx bx-menu" id="menu-icon"></div>
    <a href="index.php" class="<?php if($page=='index'){echo'actived';}?>" class="logo">
        <img style="width: 110px;" src="images/logo.png"/>
    </a> 
    <ul class="navbar">
      <li><a class="<?php if($page=='index'){echo'actived';}?>" href="index.php">Home</a></li>
      <li><a class="<?php if($page=='about-us'){echo'actived';}?>" href="about-us.php">About Us</a></li>
     
      <li><a class="<?php if($page=='adoption'){echo'actived';}?>" href="adoption.php">Adoption</a></li>
      <!-- Review -->
      <li><a class="<?php if($page=='faqs'){echo'actived';}?>" href="faqs.php">FAQs</a></li>
      <li><a class="<?php if($page=='contact-us'){echo'actived';}?>" href="contact-us.php">Contact Us</a></li>
    </ul>
    <!-- activePage -->
    
    <div class="main">
    <div class="dropdown">
      <a href="user-login.html" class="login-link" id="login-link">
        <!-- <i class="ri-user-fill"></i> -->
      <?php if(isset($_SESSION['username']))
      {
       echo $username;
       echo '<span><i class="ri-arrow-down-s-fill" style="position: relative; left: 5%; top: 3px;"></i></span>';
      }
      else{
      echo 'Login';}
      ?>
      </a>

       <?php if(isset($_SESSION['username']))
      {
      echo'<div style="visibility:visible" class="dropdown-content" id="dropdown-content">';
      echo'<a href="user-profile.php">Profile</a>';
      echo'<a href="view-application.php">My Application</a>';
      echo'<a href="user-logout.php">Logout</a>';
      echo'</div>';
      }
      else
      {
        echo'<div style="visibility:hidden" class="dropdown-content" id="dropdown-content">';
      }


        ?>
    </div>
    </div>
  </header>
  <!--js link-->
  <script type="text/javascript" src="include/header.js" defer></script>
    <script type="text/javascript">
    <?php if(isset($_SESSION['username']))
    {
    ?>
      document.addEventListener('DOMContentLoaded', (event) => {
          const loginLink = document.getElementById('login-link');
          const dropdownContent = document.getElementById('dropdown-content');

          loginLink.addEventListener('click', (event) => {
              event.preventDefault(); // Prevent the default action (navigation)
              dropdownContent.classList.toggle('show');
          });

          // Close the dropdown if the user clicks outside of it
          window.onclick = function(event) {
              if (!event.target.matches('.login-link')) {
                  if (dropdownContent.classList.contains('show')) {
                      dropdownContent.classList.remove('show');
                  }
              }
          };
      });
  <?php
  }
  ?>

</script>  
</body>
</html>