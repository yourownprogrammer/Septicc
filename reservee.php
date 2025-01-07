<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Now</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .RESERVE {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .RESERVE h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .RESERVE .res {
            margin-bottom: 15px;
        }

        .RESERVE label {
            font-size: 14px;
            color: #555;
            display: inline-block;
            width: 100%; 
        }

        .RESERVE input,
        .RESERVE select {
            width: 100%; 
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

       
        .address-row {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .address-row .res {
            flex: 1; 
        }

        
        .select-row {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .select-row .res {
            flex: 1; 
        }

      
        .RESERVE button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .RESERVE button:hover {
            background-color: #45a049;
        }

        
        .RESERVE input:focus,
        .RESERVE select:focus {
            outline: none;
            border-color: #4CAF50; 
            box-shadow: 0 0 3px rgba(76, 175, 80, 0.5); 
        }

        
        .RESERVE select {
            width: 100%; 
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            cursor: pointer;
            margin-top: 5px;
        }

       
        .RESERVE select:focus {
            outline: none;
            border-color: #4CAF50; 
            box-shadow: 0 0 3px rgba(76, 175, 80, 0.5);
        }

       
    </style>
</head>
<body>


    <div class="RESERVE">
        <h2>Reserve Now</h2>
        <form action="reserve.php" method="POST" id="reservationForm" onsubmit="return validateForm()">

            
        <div class="address-row">
            <div class="res">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"  placeholder="Enter your name">
                <div id="nameError" style="color: red;"></div>
            </div>

           
            <div class="res">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  placeholder="Enter your email">
                <div id="emailError" style="color: red;"></div>
            </div>
    </div>

            
            <div class="res">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone"  placeholder="Enter your phone number">
                <div id="phoneError" style="color: red;"></div>
            </div>

           
            <div class="address-row">
                <div class="res">
                    <label for="street">Street:</label>
                    <input type="text" id="street" name="street"  placeholder="Enter your street">
                    <div id="streetError" style="color: red;"></div>
                </div>
                <div class="res">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city"  placeholder="Enter your city">
                    <div id="cityError" style="color: red;"></div>
                </div>
            </div>

           
            <div class="address-row">
                <div class="res">
                    <label for="pole">Pole Number:</label>
                    <input type="text" id="pole" name="pole"  placeholder="Enter pole number">
                    <div id="poleError" style="color: red;"></div>
                </div>
                <div class="res">
                    <label for="house">House Number:</label>
                    <input type="text" id="house" name="house"  placeholder="Enter house number">
                    <div id="houseError" style="color: red;"></div>
                </div>
            </div>

           
            
                <div class="res">
                    <label for="type">What service would you like to get?</label>
                    <select id="type" name="type" >
                    <option value="select">select</option>
                        <option value="Emptying Septic Tank">Emptying Septic Tank</option>
                        <option value="Septage for Field">Septage for Field</option>
                        <option value="Maintaining Septic Tank">Maintaining Septic Tank</option>
                        <option value="Birendra Multiple Campus">Birendra Multiple campus</option>
                    </select>
                    <div id="typeError" style="color: red;"></div>
                </div>

                <div class="address-row">
      <div class="res">
    <label for="delivery-day">Which day do you like it delivered?</label>
    <input type="date" 
           id="delivery-day" 
           name="delivery-day"
           
           placeholder="Select delivery day">
    <div id="deliveryDayError" style="color: red;"></div>
</div>

<div class="res">
    <label for="delivery-time">Delivery Time</label>
    <input type="time" 
           id="delivery-time" 
           name="delivery-time"
           min="2015-01-01T00:00" 
           max="2025-12-31T23:59" 
           step="60" 
           placeholder="Select delivery time">
    <div id="deliveryTimeError" style="color: red;"></div>
</div>



    </div>


           
            <div class="res">
                <button type="submit">Reserve Now</button>
            </div>
            <?php

// Database connection details
$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; // Set your database password if you have one
$dbName = "login_register"; // Your database name

// Create connection
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize form inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $street = $conn->real_escape_string($_POST['street']);
    $city = $conn->real_escape_string($_POST['city']);
    $poleNumber = $conn->real_escape_string($_POST['pole']);
    $houseNumber = $conn->real_escape_string($_POST['house']);
    $serviceType = $conn->real_escape_string($_POST['type']);
    $deliveryDay = $conn->real_escape_string($_POST['delivery-day']);
    $deliveryTime = $conn->real_escape_string($_POST['delivery-time']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($street) || empty($city) || empty($poleNumber) || empty($houseNumber) || empty($serviceType) || empty($deliveryDay) || empty($deliveryTime)) {
        die("All fields are required.");
    }

    // Insert data into the reservations table
    $sql = "INSERT INTO reservations (name, email, phone, street, city, pole_number, house_number, service_type, delivery_day, delivery_time)
            VALUES ('$name', '$email', '$phone', '$street', '$city', '$poleNumber', '$houseNumber', '$serviceType', '$deliveryDay','$deliveryTime')";

    // Execute the query and check for success
 //   if ($conn->query($sql) === TRUE) {  
       
   //     echo "Reservation successful! "; 
        
  //  } else {
  //      echo "Error: " . $conn->error;
    //}
//}
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

// Close the database connection
$conn->close();
?> 
        </form>
    </div>

 

  


<script>

function validateForm() {
  let errors = [];  // Array to store all error messages
  let errorMessages = {
    name: [],
    email: [],
    phone: [],
    street: [],
    city: [],
    pole: [],
    house: [],
    type: [],
    deliveryDay: [],
    deliveryTime: []
  };

 
  let regName = document.getElementById('name').value;
  if (regName === "") {
    errors.push('Name is required ');
    errorMessages.name.push('Name is required ');
  } else {
    if (regName.length < 5) {
      errors.push('Name must be at least 5 characters long');
      errorMessages.name.push('Name must be at least 5 characters long');
    }
    if (!/\s[A-Za-z]+$/.test(regName)) {
      errorMessages.name.push('Full name is required (first and last name)');
    }
    if (!/^[a-zA-Z\s]+$/.test(regName)) {
      errorMessages.name.push('Name should only contain letters and spaces.');
    }
  }

  
  let email = document.getElementById('email').value;
  if (!/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/.test(email)) {
    errorMessages.email.push('Enter a valid email .');
  }

  // Validate Phone Number
  let phone = document.getElementById('phone').value;
  if (!/^[9][78]\d{8}$/.test(phone)) {
    errorMessages.phone.push('Phone number must be 10 digits long and start with 97 or 98.');
  }

  // Validate Street
  let street = document.getElementById('street').value;
  if (!/^[A-Za-z]+[-\s]*[A-Za-z0-9\s]*$/.test(street)) {
    errorMessages.street.push('Enter a valid street name.');
  }

  // Validate City
  let city = document.getElementById('city').value;
  if (!/^[A-Za-z]+$/.test(city)) {
    errorMessages.city.push('Must contain only letters.');
  }

  // Validate Pole Number
  let pole = document.getElementById('pole').value;
  if (!/^\d+$/.test(pole)) {
    errorMessages.pole.push('Pole number must be numeric.');
  }

  // Validate House Number
  let house = document.getElementById('house').value;
  if (!/^\d+$/.test(house)) {
    errorMessages.house.push('Must be numeric.');
  }

  // Validate Service Type
  let serviceType = document.getElementById('type').value;
  if (serviceType === "select") {
    errorMessages.type.push('Please enter service type.');
  }

  // Validate Delivery Time
  let deliveryDate = document.getElementById('delivery-day').value;


if (!deliveryDate) {
    // Check if the date is empty
    errorMessages.deliveryDay.push('Please enter a delivery date.');
} else {
    const selectedDate = new Date(deliveryDate);
    const today = new Date();
    today.setHours(0, 0, 0, 0); // Normalize to start of the day

    if (selectedDate < today) {
        // Check if the date is in the past
        errorMessages.deliveryDay.push('The delivery date must be today or future date.');
    }
}

// if (!deliveryTime) {
//     errorMessages.deliveryTime.push('Please enter a delivery time.');
// } else if (deliveryTime < '06:00' || deliveryTime > '18:00') {
//     errorMessages.deliveryTime.push('Service is available between 6:00 AM and 6:00 PM.');
// }
let deliveryTime = document.getElementById('delivery-time').value;

if (!deliveryTime) {
    errorMessages.deliveryTime.push('Please enter a delivery time.');
} else {
    const [hours] = deliveryTime.split(':').map(Number); // Get just the hours

    if (hours < 6 || hours > 18) {
        errorMessages.deliveryTime.push('Service is available between 6:00 AM and 6:00 PM.');
    }
}




          
  

  // Display Errors
  if (errors.length > 0) {
    for (let field in errorMessages) {
      let errorDiv = document.getElementById(`${field}Error`);
      errorDiv.innerHTML = errorMessages[field].join('<br>');
    }
    return false; // Prevent form submission
  }

  return true; // Allow form submission
}

   </script>

</body>
</html>

<!-- // $(function(){
//     var dtToday = new Date();
 
//     var month = dtToday.getMonth() + 1;
//     var day = dtToday.getDate();
//     var year = dtToday.getFullYear();
//     if(month < 10)
//         month = '0' + month.toString();
//     if(day < 10)
//      day = '0' + day.toString();
//     var maxDate = year + '-' + month + '-' + day;
//     $('#delivery-day').attr('min', maxDate);
//     console.log("this is delivery")
// }); -->
