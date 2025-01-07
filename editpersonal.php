<?php
@include 'database.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch user data
$user_email = $_SESSION["user"];
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userDetails = $result->fetch_assoc();
} else {
    echo "No user found with this email.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = trim($_POST["name"]);
    $new_email = trim($_POST["email"]);

    // Validate inputs
    if (empty($new_name) || empty($new_email)) {
        $error = "All fields are required.";
    } else {
        // Update the user's information
        $update_sql = "UPDATE users SET full_name = ?, email = ? WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sss", $new_name, $new_email, $user_email);

        if ($update_stmt->execute()) {
            $_SESSION["user"] = $new_email; // Update session email
            header("Location: userdash.php"); // Redirect back to the dashboard
            exit();
        } else {
            $error = "Failed to update information.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Information</title>
    <link rel="stylesheet" href="userdash.css">
</head>

<body>
    <h2>Edit Personal Information</h2>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <form method="POST" action="editpersonal.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['full_name']); ?>" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userDetails['email']); ?>" required>
        <br><br>
        <button type="submit">Update Information</button>
    </form>
    <p><a href="userdash.php">Back to Dashboard</a></p>
</body>

</html>
