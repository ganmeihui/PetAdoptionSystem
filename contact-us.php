<?php $page = 'contact-us';include('include/header.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pet_adoption_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $stmt = $conn->prepare("INSERT INTO contact_us (name, email, contact_no, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $contact_no, $subject, $message);

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $message = $_POST['message'];
    $stmt->execute();

  
    $stmt->close();
    $conn->close();

    
    echo "<p class='message'>Your message has been submitted successfully. We will get back to you soon.</p>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="common.css"> 
    
    <style>
        html, body{
            max-width: 100%;
            overflow-x: hidden;
        }
        
        .container{
            text-align: justify;
            line-height: 1.6;
            width: 62.5vw;
            margin: auto;
        }
        .spacing{
            height: 50px;
        }

        @media (max-width: 1280px) {
            .container{
            width: 93.75vw;
        }
        }

        @media (max-width: 900px) {
                .container{
                padding:10px;
            }
            .spacing{
            height: 30px;
        }
        }

        form{
            padding: 0px 40px;
        }
        .contact-container {
            max-width: 1500px;
            margin: 20px auto;
            padding: 0rem 1rem;
            background-color: #fff;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            text-align: justify;
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            height: 50px;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            height: 120px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #0C71C3;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            color: #28a745;
            font-weight: bold;
            margin-top: 20px;
        }
        .message.error {
            color: #dc3545;
        }
    </style>
    </style>
</head>
<body>
    <div class="container">
    <h1>Contact Us</h1>
    <div><iframe allowfullscreen="" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.0064754305595!2d116.02137669999999!3d5.7122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x323b6909960ba725%3A0xdfabeec4e451e253!2sSPCA%20KK%20Rehabilitation%20And%20Adoption%20Centre!5e0!3m2!1sen!2smy!4v1710248748677!5m2!1sen!2smy" 
        style="border:0;" width="100%"></iframe>
    </div>
    <div class="spacing">
        
    </div>

    <!--<div class="contact-container">
        <h2>Submit Your Enquiry</h2>
        <p style="text-align: center;">We welcome any inquiries or favorable feedback from you. You may submit in your inquiries via our web form below, or alternatively, you may either email us at 
        <a style="color: #0193DE;" alt="Email us at info@spcakk.org" class="btmHyp" href="mailto:info@spcakk.org" title="Email us at info@spcakk.org">info@spcakk.org</a>. We will try our very best to reply you as soon as possible.</p>
        <br>
        <form method="post" action="/Project/contact.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="contact_no">Contact No:</label>
            <input type="tel" id="contact_no" name="contact_no" required>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>-->
</div>

<script>
    setTimeout(function() {
        document.querySelector('.message').style.display = 'none';}, 3000);
</script>


</body>
<?php include('include/footer.php'); ?> 
</html>