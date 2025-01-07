<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "login_register";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
</head>
<body>
    <h1>Reservations</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Street</th>
                <th>City</th>
                <th>Pole</th>
                <th>House</th>
                <th>Service Type</th>
                <th>Tanker Size</th>
                <th>Delivery Day</th>
                <th>Delivery Time</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['street'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['pole_number'] . "</td>";
                    echo "<td>" . $row['house_number'] . "</td>";
                    echo "<td>" . $row['service_type'] . "</td>";
                    echo "<td>" . $row['capacity'] . "</td>";
                    echo "<td>" . $row['delivery_day'] . "</td>";
                    echo "<td>" . $row['delivery_time'] . "</td>";
                    echo "<td><a href='change_details.php?id=" . $row["email"] . "'>Change details</a></td>";
                    echo "<td><a href='change_details.php?id=" . $row["email"] . "'>Delete</a></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td>No reservations found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
$conn->close();
?>
