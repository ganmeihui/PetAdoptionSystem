<?php 
$page = 'adoption';
include('include/header.php'); 
require('include/database.php');

$selected_category = isset($_GET['category_id']) ? $_GET['category_id'] : '';
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Query to fetch species from the database
$species_sql = "SELECT cat_name FROM category";
$species_result = mysqli_query($conn, $species_sql);

// Initialize an array to store species options
$species_options = array();

// Fetch species options into the array
if (mysqli_num_rows($species_result) > 0) {
    while ($species_row = mysqli_fetch_assoc($species_result)) {
        $species_options[] = $species_row['cat_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
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

    .item {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 2rem;
        margin-top: 1rem;
    }

    .item-single {
        background: #fff;
        /* padding: 2rem; */
        border: 1px solid #ccc;;

    }

    .item-single img {
        /*width: 100%;*/
        /*height: auto;*/
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    @media only screen and (max-width:960px) {
        .item {
            grid-template-columns: repeat(3, 1fr);
            }
        }

    @media only screen and (max-width:768px) {
        .item {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media only screen and (max-width:560px) {
        .item {
            grid-template-columns: 100%;
            }
        }

    .pet-detail{
        color:#0193DE;
        font-size: 1.00rem;
        font-weight: 400;
        
    }

    .view-btn{
        font-size: 1rem;
        width: 100%;
        height:50px;
        cursor: pointer;
        background: #0193DE; 
        border:none;
        color: #fff;
        padding: 6px; 
        margin-top: 10px;
        text-align: center;
    }

    input#search_query{
        height: 30px;
    }

    .search-btn{
        color: #fff;
        background: #0193DE;
        padding: 6px;
        border:1px solid #0193DE;
    }

    .clear-btn{
        color: #fff;
        background: #000;
        padding: 6px;
        border:1px solid #000;
    }

    form {
        position: relative;
    }
    
    form .search-container i{
        position: absolute;
        left: 144px;
        height: 45px;
        top: -7px;
        font-size: 13px;
        line-height: 45px;
        width: 45px;
        cursor: pointer;
        color: #939393;
        text-align: center;
    }
    </style>
</head>
<body>
<div class='container'>
<h1>Pet Adoption</h1>
<div class="form-container">
    <form method="GET" action="">
            <div class="filter-search-container">

            <div class="filter-container">
                <select style="height: 30px;" id="species" name="species" onchange="this.form.submit()">
                    <option value="">All Species</option>
        <?php
        // Loop through species options and generate <option> tags
        foreach ($species_options as $option) {
            $selected = isset($_GET['species']) && $_GET['species'] == $option ? 'selected' : '';
            echo "<option value='" . htmlspecialchars($option) . "' $selected>" . htmlspecialchars($option) . "</option>";
        }
        ?>
                </select>
                
                <select style="height: 30px;" id="gender" name="gender" onchange="this.form.submit()">
                    <option value="">All Genders</option>
                    <option value="Male" <?php echo isset($_GET['gender']) && $_GET['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo isset($_GET['gender']) && $_GET['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            
            
            <div class="search-container" style="display: flex; margin-top: 10px;">
                <input type="text" id="search_query" name="search_query" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search breed here">
                <!-- <i id="xmark-btn" class="fa-solid fa-xmark"></i> -->
                <button class="search-btn" type="submit">Search</button>
                <button class="clear-btn" onclick="clearSearch()">Clear</button>
                
            </div>

            </div>
    </form>
</div>

<?php

   // filter 
    $sql = "SELECT * FROM pet WHERE 1=1";

// Species filter
$selected_species = isset($_GET['species']) ? $_GET['species'] : '';
if ($selected_species) {
    $sql .= " AND species = '" . mysqli_real_escape_string($conn, $selected_species) . "'";
}

// Gender filter
$selected_gender = isset($_GET['gender']) ? $_GET['gender'] : '';
if ($selected_gender) {
    $sql .= " AND gender = '" . mysqli_real_escape_string($conn, $selected_gender) . "'";
}

    // search 
if ($search_query) {
    $sql .= " AND breed LIKE '%" . mysqli_real_escape_string($conn, $search_query) . "%'";
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='item'>";
    $count = 0;
    
    while ($row = mysqli_fetch_assoc($result)) {
        if ($count % 3 == 0 && $count != 0) {
            echo "</div><div class='container'>";
        }
       
        echo "<div class='item-single'>";
        echo "<img style='object-fit: cover;' src='admin/uploads/" . $row['image'] . "' alt='Image'>";
        echo "<div style='padding: 0px 20px; line-height: 1.6;'>";
        echo "<p class='pet-detail'>" . $row['breed'] . "&nbsp" . $row['species'] . "</p>";
        echo "<h3 style=''>" . $row['pet_name'] . "</h3>";
        echo "<p class='pet-detail'>" . $row['gender'] . "</p>";
        echo "<p class='pet-detail'>". $row['age'] . "</p>";
        echo "</div>";
        echo "<a href='pet-profile.php?petid=" . $row['pet_id'] . "'><input class='view-btn' type='button' value='View More'></input></a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<br><br>";
    echo "<div style='text-align: center;'>No results found</div>";
}
?>
<div class='spacing'></div>
</div>

<script>
function clearSearch() {
    document.getElementById('search_query').value = '';
}
</script>
</body>
</html>
<?php include('include/footer.php'); ?>
