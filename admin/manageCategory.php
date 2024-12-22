<?php
    require('../include/database.php');

    session_start();
    if (isset($_SESSION['admin_name'])) {
        $admin_name = $_SESSION['admin_name'];
    } else {
        // Redirect to login page if the admin_name is not set in session
        header("Location: admin-login.php");
        exit();
    }
    
    if (isset($_SESSION['admin_role'])){
        $admin_role = $_SESSION['admin_role']; 
        
    } else { 
        // Redirect to login page if the admin_role is not set in session 
        header("Location: admin-login.php"); 
        exit(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="user-signup.css">
    <link rel="stylesheet" href="adminDashboard1.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
<style>

html, body {
    max-width: 100%;
    overflow-x: hidden;
}

    .userlist-table{
    margin-top: 1.0rem;
    }

    .table-header,
    .table-body {
        padding: 1rem 0rem 1rem 0rem;
    }
    .table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #f0f0f0;
}

    .table-header button.addUser {
    background: #fff;
    color: #000;
    background: #0193DE;
    color: #fff;
    font-size: 1.0rem;
    padding: .5rem 1rem;
    border: #0193DE;   
}

 .table-header button.addUser {
    background: #fff;
    color: #000;
    background: #0193DE;
    color: #fff;
    font-size: 1.0rem;
    padding: .5rem 1rem;
    border: #0193DE;   
}

    .table-header button.addUser:hover{
        background: #fff;
        color: #0193DE;
        cursor:pointer;
    }

    .table-header button.addUser span{
        padding-right: .4rem;
    }

    .table {
    /* background: #fff; */
}

    table {
        border-collapse: collapse;
        border: 1px solid #eee;
    }
    

    tr{
        text-align: center;
    }

    thead td {
        font-weight: 700;
        background: #0193DE;
        color: #fff;
    }

    td {
        padding: .5rem 1rem;
        font-size: .9rem;
        color: #222;
    }

    tr td:last-child {
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: center;
}

    tbody tr:nth-child(odd){
        background: #fff;
    }

    tbody tr:nth-child(even){
        background: #E4EBF4;
    }
    .edit-btn,
    .delete-btn
    {
        color: white;
        background-color: red;
        padding: .4rem .6rem;
        border-radius: 5px;
        text-decoration: none;
        border: none;
        margin-left: 4px;
    }

    .edit-btn
    {
        background-color: green;
    }

    .edit-btn:hover,
    .delete-btn:hover
    {
        color: black;
        background-color: #c2c2c2;
    }

    /**********  popup form  **************/

input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


button.add-btn {
  background-color: #0193DE;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.formcontainer {
  padding: 2.3rem;
}

.popup {
  display: none;
  position: fixed; 
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  padding-top: 60px;
}

.popup-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  width: 40%;
}

.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

.animate {
  -webkit-animation: animatezoom 0.5s;
  animation: animatezoom 0.5s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}


@media screen and (max-width:900px) {
    .popup-content {
        width: 95%;
    }
}


li#disabled{
    cursor: not-allowed;
}

li#disabled a{
    pointer-events: none;
}

.search label input {
    width: 15rem;
    height: 38px;
    padding: 5px 10px;
    outline: none;
    border: 1px solid var(--black2);
    border-radius: unset;
    font-size: initial;
}

@media screen and (max-width:320px) {
    .search label input {
        width: 13rem;
    }
}

#clearSearch {
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #999;
    background: green;
    color: white;
}

.clear-btn{

    color: #fff;
    background: #0193DE;
    border: none;
    padding: 3px;
}



</style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
        <ul>
                <li >
                    <a href="#">
                        <span class="icon">
                            <img src="../images/logo v2.png" style="width: 60px;">
                        </span>
                        <span class="title">SPCA KK</span>
                    </a>
                </li>

                <li>
                    <a href="adminDashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="manageUser.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>

                <li class="active">
                    <a href="manageCategory.php">
                        <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                        </span>
                        <span class="title">Category</span>
                    </a>
                </li>

                <li>
                    <a href="managePet.php">
                        <span class="icon">
                            <ion-icon name="paw-outline"></ion-icon>
                        </span>
                        <span class="title">Pet</span>
                    </a>
                </li>

                <li>
                    <a href="manageAdoptRequest.php">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Request</span>
                    </a>
                </li>

                <?php if($admin_role != 'Superadmin')
                    {
                        echo'<li id="disabled">';
                        echo'<a href="manageAdmin.php">';
                        echo'<span class="icon">';
                        echo'<ion-icon name="people-circle-outline"></ion-icon>';
                        echo'</span>';
                        echo'<span class="title">Admin</span>';
                        echo'</a>';
                        echo'</li>';
                        
                    }
                    else
                    {
                        echo'<li>';
                        echo'<a href="manageAdmin.php">';
                        echo'<span class="icon">';
                        echo'<ion-icon name="people-circle-outline"></ion-icon>';
                        echo'</span>';
                        echo'<span class="title">Admin</span>';
                        echo'</a>';
                        echo'</li>';
                    }
                ?>

                <!-- <li>
                    <a href="account.php">
                        <span class="icon">
                            <ion-icon name="shield-checkmark-outline"></ion-icon>
                        </span>
                        <span class="title">Account</span>
                    </a>
                </li>      -->

                <li>
                <a href="admin-logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user">
                    <p>Welcome back, <?php echo $admin_name;?></li>
                </div>
            </div>

    <!-- ================ Table ================= -->
    <div class="grey-container" style="min-height:100vh;">
    <div class="userlist-table">
        <div class="table-header">
                <h2>Category Management</h2>
                <button class="addUser" onclick="document.getElementById('popup01').style.display='block'" style="width:auto;">
                <span class="las la-plus-circle"> </span>Add New
                </button>

                <!--**************  Add New Category Pop Up Form  ******************* -->
                <div id="popup01" class="popup">
                
                <form class="popup-content animate" action="addCategory.php" method="post">
                    <div class="imgcontainer">
                    <span onclick="document.getElementById('popup01').style.display='none'" class="close" title="Close">&times;</span>
                    <h2>Add New Category</h2>
                    </div>

                    <div class="formcontainer">
                    <label for="catname"><b>Category Name</b></label>
                    <input type="text" placeholder="Enter Name" name="catname" required>
    
                    <button type="submit"  class="add-btn">Add</button>
                    </div>
                </form>
                </div>
                <!--********************* End ***********************-->
        </div>
        
        <div class="search">
<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label>
                        <input type="text" name="search" placeholder="Search record...">
           <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                <!--<span id="clearSearch" onclick="clearSearch()">&times;</span>-->
            <?php endif; ?>
            <button type="submit" class="clear-btn">X</button>
                    </label>
                </form>
        </div>
        
        <div class="table-body">
            <div class="table-responsive">
            <?php 
            
            $searchTerm = '';
            if (isset($_GET['search'])) {
                $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
            }
            
            // Construct the SQL query with search condition
            $sql = "SELECT * FROM category";
            if (!empty($searchTerm)) {
                // $sql .= " WHERE cat_name LIKE '%$searchTerm%'";
                $sql = "SELECT * FROM category 
        WHERE cat_id LIKE '%" . $searchTerm . "%'
        OR cat_name LIKE '%" . $searchTerm . "%'
        OR cat_created_date LIKE '%" . $searchTerm . "%'";
            }
            
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
    echo "<table style='width:100%;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Category Name</td>";
    echo "<td>Creation Date</td>";
    echo "<td style='height: 55px;'>Action</td>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['cat_id'] . "</td>";
        echo "<td>" . $row['cat_name'] . "</td>";
        echo "<td>" . $row['cat_created_date'] . "</td>";
        echo "<td>
                <a href='editCategory.php?cat_id={$row['cat_id']}'><input class='edit-btn' type='button' value='Edit'></a>
                <a href='deleteCategory.php?cat_id={$row['cat_id']}' onclick='return confirm(\"Are you sure you want to delete this category?\");'><input class='delete-btn' type='button' value='Delete'></a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div style='text-align:center;font-weight: 600;'>-- NO RECORDS FOUND --</div>";
}

// Existing code after modification

            
            // $sql = "SELECT * FROM category";
            //         $result = mysqli_query($conn,$sql);  
            //         if (mysqli_num_rows($result) > 0){

            //             echo "<table style='width:100%;'>";
            //             echo "<thead>";
            //             echo "<tr>";
            //             echo "<td>ID</td>";
            //             echo "<td>Category Name</td>";
            //             echo "<td>Creation Date</td>";
            //             echo "<td>Action</td>";
            //             echo "</tr>";
            //             echo "</thead>";
            //             echo "<tbody>";

            //             while($row = mysqli_fetch_array($result)){

            //             echo "<tr>";
            //             echo "<td>" .$row['cat_id']."</td>";
            //             echo "<td>" .$row['cat_name']."</td>";
            //             echo "<td>" .$row['cat_created_date']."</td>";
            //             echo "<td><a href='editCategory.php?cat_id=$row[cat_id]'><input class='edit-btn' type='submit' value='Edit'>
            //             <a href='deleteCategory.php?cat_id=$row[cat_id]' onclick='return delete()'><input class='delete-btn' type='submit' value='Delete'>";
            //             echo"</td>";
            //             echo "</tr>";
            //             }
            //         }
            //         else{
            //             echo "<div style='text-align:center;font-weight: 600;'>-- NO RECORD FOUND --</div>";
            //         }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="adminDashboard.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
// Get the popup
var popup = document.getElementById('popup01');

// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

// Disable the admin section for all admin expect for superadmin
const disable_btn = document.getElementById('disabled');

disable_btn.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default link behavior
        alert('You do not have permission to access this page. Please contact your system administrator for assistance.');
    
});


// Function to clear search input field
function clearSearch() {
    document.getElementById('searchInput').value = '';
    document.getElementById('clearSearch').style.display = 'none'; // Hide the X mark after clearing
    // Optionally, you can submit the form here to refresh the results immediately
    document.forms[0].submit(); // Assuming it's the first form on the page
}

// Event listener for input changes in search field
document.getElementById('searchInput').addEventListener('input', function() {
    var clearBtn = document.getElementById('clearSearch');
    if (this.value.trim() !== '') {
        clearBtn.style.display = 'inline-block'; // Show clear button if input is not empty
    } else {
        clearBtn.style.display = 'none'; // Hide clear button if input is empty
    }
});
</script>
</body>

</html>