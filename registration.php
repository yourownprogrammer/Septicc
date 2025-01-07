<?php
session_start(); // Start session at the top

require_once "database.php"; // Include the database connection

$emailErr = "";
$error = "";

if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    // Check if passwords match
    if ($password !== $passwordRepeat) {
        $error = "Passwords do not match!";
    } else {
        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Email already exists
            $emailErr = "Email already exists!";
        } else {
            // Hash the password before storing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                die("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

            if ($stmt->execute()) {
                // Save user details in session
                $_SESSION['user_name'] = $fullname;
                $_SESSION['user_email'] = $email;

                // Redirect to login with email prefilled
                header("Location: login.php?email=" . urlencode($email));
                exit();
            } else {
                $error = "Error: Could not register user.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
       
        <form action="registration.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <input type="text" name="fullname" id="fullname" placeholder="Enter full name">
                <span class="error" id="regNameErr"></span>
            </div>
            <div class="form-group">
    <input type="email" name="email" id="email" placeholder="Enter email">
     <span class="error" id="emailErr"></span> 
</div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Enter password">
                <span class="error" id="regPasswordErr"></span>
            </div>
            <div class="form-group">
                <input type="password" name="repeat_password" id="repeat_password" placeholder="Confirm password">
                <span class="error" id="confirmPasswordErr"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" name="submit">
            </div>
        </form>
        <p><?php echo $emailErr; ?></p>
        <p>Already Registered? <a href="login.php">Register here</a></p>
        <div>
        </div>
    </div>
   
 
   <script>
        function validateForm() {
            var regName = document.getElementById("fullname").value;
            var regEmail = document.getElementById("email").value;
            var regPassword = document.getElementById("password").value;
            var confirmPassword = document.getElementById("repeat_password").value;

            var errors = [];

            // Reset previous error messages
            document.getElementById("regNameErr").innerText = "";
            document.getElementById("emailErr").innerText = "";
            document.getElementById("regPasswordErr").innerText = "";
            document.getElementById("confirmPasswordErr").innerText = "";

            // Validate Name
            if (regName === "") {
                errors.push({
                    id: "regNameErr",
                    msg: "Name is required"
                });
            } else {
                var nameFormat = /^[a-zA-Z\s]+$/;
                if (!(regName.match(nameFormat))) {
                    errors.push({
                        id: "regNameErr",
                        msg: "Enter a valid name"
                    });
                }
            }

if (regEmail === "") {
        errors.push({
            id: "emailErr",
            msg: "Email is required"
        });
    } else {
        // Regex: Allow only '.' and '@' as special characters
        var mailFormat = /^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z]+\.[a-zA-Z]{2,}$/;

        if (!regEmail.match(mailFormat)) {
            errors.push({
                id: "emailErr",
                msg: "Enter a valid email (eg:Bairstow51@gmail.com)"
            });
        }
    }
            // Validate Password
            if (regPassword === "") {
                errors.push({
                    id: "regPasswordErr",
                    msg: "Password is required"
                });
            } else {
                if (regPassword.length < 8) {
                    errors.push({
                        id: "regPasswordErr",
                        msg: "Password must be at least 8 characters long"
                    });
                } else {
                    var passStrength = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
                    if (!(regPassword.match(passStrength))) {
                        errors.push({
                            id: "regPasswordErr",
                            msg: "Password must include at least one uppercase letter, one lowercase letter, one digit, and one special character."
                        });
                    }
                }
            }

            // Validate Confirm Password
            if (confirmPassword === "") {
                errors.push({
                    id: "confirmPasswordErr",
                    msg: "Please confirm the password"
                });
            } else if (regPassword !== confirmPassword) {
                errors.push({
                    id: "confirmPasswordErr",
                    msg: "Passwords do not match"
                });
            }

            if (errors.length !== 0) {
                for (var j = 0; j < errors.length; j++) {
                    document.getElementById(errors[j].id).innerText = errors[j].msg;
                }
                return false; // Prevent form submission if there are errors
            }

            return true; // Allow form submission if there are no errors
        }
    </script> 
</body>

</html>