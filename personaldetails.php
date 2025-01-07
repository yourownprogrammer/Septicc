

<?php
session_start();
require_once "database.php"; 

if (!isset($_SESSION['user_email'])) {
    header("Location: loginn.php"); 
    exit();
}
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM reservations WHERE email = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $reservations = $result->fetch_all(MYSQLI_ASSOC); 
} else {
    $reservations = []; // No reservations found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Reservations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1> Reservation Details</h1>
    <?php if (!empty($reservations)): ?>
        <table>
            <thead>
                <tr>
                    
                    <th>Phone</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Pole Number</th>
                    <th>House Number</th>
                    <th>Service Type</th>
                    <th>Tanker Size and Rate</th>
                    <th>Delivery Date</th>
                    <th>Delivery Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $index => $reservation): ?>
                    <tr>
                        
                        <td><?php echo htmlspecialchars($reservation['phone']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['street']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['city']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['pole_number']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['house_number']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['service_type']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['capacity']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['delivery_day']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['delivery_time']); ?></td>
                        <td><a href="edit">Edit details</a><br></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reservations found for your account.</p>
    <?php endif; ?>
</body>
</html>
