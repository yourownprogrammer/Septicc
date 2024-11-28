<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Time Validation</title>
</head>
<body>
    <form id="reservationForm">
        <label for="delivery-time">Delivery Time:</label>
        <input type="datetime-local" id="delivery-time" required>
        <button type="submit">Reserve Now</button>
    </form>

    <script>
        // Restrict past dates and times dynamically
        const deliveryTimeInput = document.getElementById('delivery-time');
        const now = new Date();
        const offset = now.getTimezoneOffset() * 60000; // Adjust for timezone offset
        const localTime = new Date(now.getTime() - offset).toISOString().slice(0, 16); 
        deliveryTimeInput.min = localTime;

        // Validate delivery time on form submission
        document.getElementById('reservationForm').addEventListener('submit', (event) => {
            const deliveryTime = new Date(document.getElementById('delivery-time').value); // User's selected time
            const now = new Date(); // Current time

            // Truncate seconds and milliseconds from now
            now.setSeconds(0, 0);

            // Check if selected time is in the past
            if (deliveryTime < now) {
                event.preventDefault(); // Stop form submission
                alert('The delivery time cannot be in the past. Please select a future time.');
                return;
            }

            // Check if the selected time is between 9 AM and 6 PM
            const selectedHour = deliveryTime.getHours(); // Get the hour of selected time
            if (selectedHour < 9 || selectedHour >= 18) { // Restrict outside 9 AM - 6 PM
                event.preventDefault(); // Stop form submission
                alert('The delivery time must be between 9:00 AM and 6:00 PM.');
                return;
            }
        });
    </script>
</body>
</html>
