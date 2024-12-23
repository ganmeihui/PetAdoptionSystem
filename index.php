<?php $page = 'index';include('include/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM STYLESHEET -->
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="common.css">
    <style>
          html, body{
        max-width: 100%;
        overflow-x: hidden;
        }

        .inner_container{
            text-align: justify;
            line-height: 1.6;
            width: 62.5vw;
            margin: auto;
        }

        .spacing{
            height: 50px;
        }

        .button_container{
         display: flex;
         justify-content: center; 
        }

        .button1{
          margin-right: 40px;
        }

        @media (max-width: 1280px) {
            .inner_container{
            width: 93.75vw;
            
        }
        }
            @media (max-width: 900px) {
              .inner_container{
              padding:10px;
            }
            .button1{
              margin-right: 15px;
            }
            h1{
              line-height: 48px;
              font-size: 36px;
            }
            .spacing{
            height: 30px;
        }
        }
    </style>
</head>
<body>
   <div class="outer_container">
  <img src='images/background.png' style="width: 100%;background-size: cover;"/>
    <div class="inner_container">
      <div style="text-align: center;padding-top: 30px; font-size: 20px; font-weight: 700;">
      Welcome to 
      <h1 style="text-align: center; padding-top: 10px;">SPCA <span style="color:#0193DE;">Kota Kinabalu</span></a>
                </h1>
      </div>   
    <div style="height: 30px;">
    </div>
    <div style="text-align: center;">The Society for the Prevention of Cruelty to Animals, Kota Kinabalu (SPCA KK) is a non govermental organisation which has been registered with the Registry of
              Societies, Malaysia since the 14th February 2006. A group of animal lovers who had been working independently for the welfare of strays and abused animals in
              Kota Kinabalu had decided to form a common platform so that their work can be done more effectively.
          </div>
          <div style="height: 40px;">
</div>
<div class="button_container">
  <a alt="Read More" class="button1" href="about-us.php" title="Read More">Read More</a>
  <a alt="Contact Us" class="button2" href="contact-us.php">Contact Us</a>
    </div>
  </div>
  </div>
  <div class="spacing">
</div>
</body>
<?php include('include/footer.php'); ?> 
</html>
