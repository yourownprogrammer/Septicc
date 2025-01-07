<?php
@include 'database.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
  header("Location: login.php"); // Redirect to login page if not logged in
  exit();
}

// Fetch user data from the database
$user_email = $_SESSION["user"];
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $userDetails = $result->fetch_assoc(); // Fetch user details as an associative array
  // You can now use $userDetails['column_name'] to access user data
} else {
  echo "No user found with this email.";
}
?>

<header>
  <h1>Welcome To User Dashboard , </h1>
  <span class="ram" ><?php echo isset($_SESSION['user_name']) ? htmlspecialchars($userDetails["full_name"]) :  $userDetails["full_name"]; ?></span>
  
</header>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="userdash.css">


</head>

<body>

  <div class="dashboard-container">

    <div class="sidebar">
      <h2>User Information</h2>


      <div class="section">
        <h3>Personal Information <span><a href="editpersonal.php">Edit</a></span></h3>
        <p><span class="label">Name:</span> <?php echo htmlspecialchars($userDetails["full_name"]); ?></p>
        <p><span class="label">Email:</span> <?php echo htmlspecialchars($userDetails["email"]); ?></p>
        
                         </p>
      </div>


      <p> <a href="logout.php">logout</a> </p>
      
      
    </div>
    
    <div id="CN">

      <div class="main-content">
        <div class="card">
          <h2>Activity Overview</h2>
          
          <a href="personaldetails.php">Change reserve details</a><br>
          <a href="#">Track your order</a><br>
          <a href="#">Order History</a>
          
        </div>
      </div>
    
      <div id="card" class="card">
        <h2>Notifications</h2>
        <p>Your reserve has been approved! </p>
        <p> Tanker has been sent! </p>
        <p> Congratulations, it's empty now!</p>
        
      </div>
    </div>
  </div>
  </div>

  
</body>

</html>