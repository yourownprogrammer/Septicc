<?php
// Start the session at the top of the script
session_start();

if (isset($_POST["login"])) { // Ensure the "login" name matches the submit button in the form
    // Collect form inputs
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Include the database connection file
    require_once "database.php";

    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if the user exists in the database
    if ($user) {
        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $user["password"])) {
            // Handle login based on user type
            if ($user['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $user['name']; // Store admin name in the session
                header("Location: Admindash.php"); // Redirect to admin dashboard
            } elseif ($user['user_type'] == 'user') {
                $_SESSION['user'] = $user['email']; // Store user email in the session
                header("Location: reserve.php"); // Redirect to reserve page
            }
            exit(); // Stop further script execution after redirect
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="loginn.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" name="login"> <!-- Ensure the name matches PHP logic -->
            </div>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p> <!-- Display error messages -->
        <?php endif; ?>
         <p>Go back to <a href="index.php">Homepage</a></p> 
    </div>
</body>
</html>
