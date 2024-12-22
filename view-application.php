<?php
require('include/header.php');
require('include/database.php');

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}


$email = $_SESSION['email']; // Assuming the username is stored in the session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        .container {
            text-align: justify;
            line-height: 1.6;
            width: 62.5vw;
            margin: auto;
        }

        .spacing {
            height: 50px;
        }

        @media (max-width: 1280px) {
            .container {
                width: 93.75vw;
            }
        }

        @media (max-width: 900px) {
            .container {
                padding: 10px;
            }

            .spacing {
                height: 30px;
            }
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .aa {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            border: 1px solid #eee;
            width: 100%;
        }

        thead td {
            font-weight: 700;
            background: #0193DE;
            color: #fff;
        }

        tbody tr:nth-child(odd) {
            background: #fff;
        }

        td {
            padding: .5rem 1rem;
            font-size: .9rem;
            color: #222;
        }

        tbody tr:nth-child(even) {
            background: #E4EBF4;
        }

        .view-btn {
            background-color: green;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .view-btn:hover {
            background-color: darkgreen;
        }
        
        h1{
            font-size: 1.7rem;
            font-weight: 800;
            color: #000000;
            line-height: 2.0;
            margin: 0.7em 0 .7em 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adoption Application</h1>
        <div class="table-responsive">
            <?php
            // Fetch adoption applications
            $sql = "SELECT q.*, p.image, p.pet_name, p.species, p.breed, p.gender, p.age 
                    FROM question q
                    JOIN pet p ON q.adoptpet_id = p.pet_id
                    WHERE q.adopter_name = '$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<td>Pet Name</td>";
                echo "<td>Species</td>";
                echo "<td>Breed</td>";
                echo "<td>Gender</td>";
                echo "<td>Age</td>";
                echo "<td>Image</td>";
                 echo "<td>Apply Date</td>";
                // echo "<td>Action</td>";
                echo "<td>Status</td>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    
                    echo "<td>" . $row['pet_name'] . "</td>";
                    echo "<td>" . $row['species'] . "</td>";
                    echo "<td>" . $row['breed'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td><img src='admin/uploads/" . $row['image'] . "' width='100px;' alt='Image'></td>";
                    echo "<td>" . $row['apply_date'] . "</td>";
                    
                // echo "<td><form action='view_application_detail.php' method='POST'><input type='hidden' name='application_id' value='" . $row['id'] . "'><input class='view-btn' type='submit' value='View'></form></td>";
                                        
                    // Apply styles based on the status
                    $statusStyle = '';
                    if ($row['status'] == 'Approved') {
                        $statusStyle = 'background-color: green; color: white; font-weight: bold; padding: 5px; border-radius: 3px;';
                    } elseif ($row['status'] == 'Rejected') {
                        $statusStyle = 'background-color: red; color: white; font-weight: bold; padding: 5px; border-radius: 3px;';
                    } else {
                        $statusStyle = 'color: black; font-weight: bold;';
                    }

                    echo "<td><span style='$statusStyle'>" . $row['status'] . "</span></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div style='text-align:center;font-weight: 600;'>-- NO RECORD FOUND --</div>";
            }
            ?>
        </div>
        <div class="spacing"></div>
    </div>
</body>
</html>

<?php require_once('include/footer.php'); ?>
