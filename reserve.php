<?php
session_start(); // Start session

// Check if the session variables are set
if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])) {
    // Redirect to login page if session variables are missing
    header("Location: loginn.php");
    exit();
}

// Retrieve session variables
$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Now</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="reserve.css">
</head>

<body>

    <div class="RESERVE">
        <h2>Reserve Now</h2>
        <form action="reserve.php" method="POST" id="reservationForm" onsubmit="return validateForm()">

        <div class="address-row">
    <div class="res">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>" readonly>
        <div id="nameError" style="color: red;"></div>
    </div>

    <div class="res">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" readonly>
        <div id="emailError" style="color: red;"></div>
    </div>
</div>

            <div class="res">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                <div id="phoneError" style="color: red;"></div>
            </div>

            <div class="address-row">
                <div class="res">
                    <label for="street">Street:</label>
                    <input type="text" id="street" name="street" placeholder="Enter your street">
                    <div id="streetError" style="color: red;"></div>
                </div>
                <div class="res">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" placeholder="Enter your city">
                    <div id="cityError" style="color: red;"></div>
                </div>
            </div>

            <div class="address-row">
                <div class="res">
                    <label for="pole">Pole Number:</label>
                    <input type="text" id="pole" name="pole" placeholder="Enter pole number">
                    <div id="poleError" style="color: red;"></div>
                </div>
                <div class="res">
                    <label for="house">House Number:</label>
                    <input type="text" id="house" name="house" placeholder="Enter house number">
                    <div id="houseError" style="color: red;"></div>
                </div>
            </div>

            <div class="address-row">
                <div class="res">
                    <label for="type">What service would you like to get?</label>
                    <select id="type" name="type">
                        <option value="select">select</option>
                        <option value="Emptying Septic Tank">Emptying Septic Tank</option>
                        <option value="Septage for Field">Septage for Field</option>
                        <option value="Maintaining Septic Tank">Maintaining Septic Tank</option>
                    </select>
                    <div id="typeError" style="color: red;"></div>
                </div>

                <div class="res">
                    <label for="capacity">Tanker Size</label>
                    <select id="capacity" name="capacity">
                        <option value="select">select</option>
                        <option value="small">SMALL - 500 LITERS - Rs.2000</option>
                        <option value="Medium">MEDIUM - 1000 LITERS - Rs.2500</option>
                        <option value="Large">LARGE- 1500 LITERS - Rs.3000</option>
                    </select>
                    <div id="capacityError" style="color: red;"></div>
                </div>
            </div>

            <div class="address-row">
                <div class="res">
                    <label for="delivery-day">Which day do you like it delivered?</label>
                    <input type="date" id="delivery-day" name="delivery-day" placeholder="Select delivery day">
                    <div id="deliveryDayError" style="color: red;"></div>
                </div>

                <div class="res">
                    <label for="delivery-time">Delivery Time</label>
                    <input type="time" id="delivery-time" name="delivery-time" step="60" min="06:00" max="18:00" placeholder="Select delivery time">
                    <div id="deliveryTimeError" style="color: red;"></div>
                </div>
            </div>

            <div class="res">
                <button type="submit">Reserve Now</button>
            </div>

            <?php
            $hostName = "localhost";
            $dbUser = "root";
            $dbPassword = ""; 
            $dbName = "login_register";

            $conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = $conn->real_escape_string($_POST['name']);
                $email = $conn->real_escape_string($_POST['email']);
                $phone = $conn->real_escape_string($_POST['phone']);
                $street = $conn->real_escape_string($_POST['street']);
                $city = $conn->real_escape_string($_POST['city']);
                $poleNumber = $conn->real_escape_string($_POST['pole']);
                $houseNumber = $conn->real_escape_string($_POST['house']);
                $serviceType = $conn->real_escape_string($_POST['type']);
                $capacity = $conn->real_escape_string($_POST['capacity']);
                $deliveryDay = $conn->real_escape_string($_POST['delivery-day']);
                $deliveryTime = $conn->real_escape_string($_POST['delivery-time']);

                if (empty($name) || empty($email) || empty($phone) || empty($street) || empty($city) || empty($poleNumber) || empty($houseNumber) || empty($serviceType) || empty($deliveryDay) || empty($deliveryTime) || empty($capacity)) {
                    die("All fields are required.");
                }

                $sql = "INSERT INTO reservations (customer_name, email, phone, street, city, pole_number, house_number, service_type, delivery_day, delivery_time, capacity)
                        VALUES ('$name', '$email', '$phone', '$street', '$city', '$poleNumber', '$houseNumber', '$serviceType', '$deliveryDay','$deliveryTime', '$capacity')";

                if ($conn->query($sql) === TRUE) {
                    echo '<div style="color: purple; font-size: 16px;">
                            Reservation successful! Look your status 
                            <a href="userdash.php" style="color: blue; text-decoration: underline;">click here</a>
                          </div>';
                } else {
                    echo '<div style="color: red; font-size: 18px;">
                            Error: ' . $conn->error . '
                          </div>';
                }
            }

            $conn->close();
            ?>
        </form>
    </div>

    <script>

        function validateForm()
         {
            const errorMessages = {
                name: [],
                email: [],
                phone: [],
                street: [],
                city: [],
                pole: [],
                house: [],
                type: [],
                capacity: [],
                deliveryDay: [],
                deliveryTime: []
            };

          
            // const regName = document.getElementById('name').value;
            // if (regName === "") 
            // errorMessages.name.push('Name is required.');
            // if (regName.length < 5) 
            // errorMessages.name.push('Name must be at least 5 characters.');
            // if (!/^[a-zA-Z\s]+$/.test(regName)) 
            // errorMessages.name.push('Name should only contain letters and spaces.');
            const regName = document.getElementById('name').value;
errorMessages.name = [];  // Clear previous errors first

// Check if the name field is empty
if (regName === "") {
    errorMessages.name.push('Name is required.');
} 
// Check if the name is less than 5 characters
else if (regName.length < 5) {
    errorMessages.name.push('Name must be at least 5 characters.');
} 
// Check if the name contains invalid characters
else if (!/^[a-zA-Z\s]+$/.test(regName)) {
    errorMessages.name.push('Name should only contain letters and spaces.');
}




            

            const email = document.getElementById('email').value;
            if (!/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/.test(email)) errorMessages.email.push('Enter a valid email.');

            const phone = document.getElementById('phone').value;
            if (!/^[9][78]\d{8}$/.test(phone)) errorMessages.phone.push('Phone must start with 97 or 98.');

            const street = document.getElementById('street').value;
            if (!street) errorMessages.street.push('Street is required.');

            const city = document.getElementById('city').value;
            if (!/^[A-Za-z\s]+$/.test(city)) errorMessages.city.push('City must only contain letters.');

            const pole = document.getElementById('pole').value;
            if (!/^\d+$/.test(pole)) errorMessages.pole.push('Pole must be numeric.');

            const house = document.getElementById('house').value;
            if (!/^\d+$/.test(house)) errorMessages.house.push('House must be numeric.');

            const type = document.getElementById('type').value;
            if (type === "select") errorMessages.type.push('Please select a service type.');

            const capacity = document.getElementById('capacity').value;
            if (capacity === "select") errorMessages.capacity.push('Please select a tanker size.');

            const deliveryDay = document.getElementById('delivery-day').value;
            if (!deliveryDay) errorMessages.deliveryDay.push('Delivery date is required.');
           
           
            $(function(){
    var dtToday = new Date();
     var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#delivery-day').attr('min', maxDate);
    console.log("this is delivery")
});


            const deliveryTime = document.getElementById('delivery-time').value;
            if (!deliveryTime) errorMessages.deliveryTime.push('Delivery time is required.');

            for (let field in errorMessages) {
                const errorDiv = document.getElementById(`${field}Error`);
                errorDiv.innerHTML = errorMessages[field].join('<br>');
            }

            return Object.values(errorMessages).every(msgs => msgs.length === 0);
        }
    </script>

</body>
</html>
