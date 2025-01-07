<?php
// Include the database connection file
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong: " . mysqli_connect_error());
}

// SQL query to fetch data, including user_type
$sql = "SELECT full_name, email, password, user_type FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
</head>
<body>
    <h2>Users Data</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if records exist
            if (mysqli_num_rows($result) > 0) {
                // Loop through and display records
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["user_type"]) . "</td>";
                    echo "<td><a href='change_details.php?id=" . $row["email"] . "'>Change details</a></td>";
                    echo "<td><a href='delete.php?id=" . $row["email"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found in the users table.</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
