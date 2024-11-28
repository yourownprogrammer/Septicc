<?php
session_start();
$emailErr = "";

if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    if ($password !== $passwordRepeat) {
        $error = "Passwords do not match!";
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Encrypt password

        require_once "database.php";

        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $emailErr = "Email already exists!";
        } else {
            // Insert new user
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sss", $fullname, $email, $passwordHash);
                if ($stmt->execute()) {
                    header("Location: login.php"); // Redirect to login
                    exit();
                } else {
                    $error = "Error: Could not register user.";
                }
            } else {
                $error = "Error: Failed to prepare the query.";
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
    <form action="" method="post" onsubmit="return validateForm()" novalidate>
        <div class="form-group">
            <input type="text" name="fullname" id="fullname" placeholder="Enter full name">
            <span class="error" id="regNameErr" style="color: red;"></span>
        </div>
        <div class="form-group">
            <input type="text" name="email" id="email" placeholder="Enter email">
            <span class="error" id="emailErr" style="color: red;"></span>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Enter password">
            <span class="error" id="regPasswordErr" style="color: red;"></span>
        </div>
        <div class="form-group">
            <input type="password" name="repeat_password" id="repeat_password" placeholder="Confirm password">
            <span class="error" id="confirmPasswordErr" style="color: red;"></span>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" name="submit">
        </div>
    </form>
    <div>
        <p>Already Registered? <a href="login.php">Login here</a></p>
    </div>
</div>

<script>
    function validateForm() {
        const regName = document.getElementById("fullname").value.trim();
        const regEmail = document.getElementById("email").value.trim();
        const regPassword = document.getElementById("password").value;
        const confirmPassword = document.getElementById("repeat_password").value;

        const errors = [];

        // Reset error messages
        document.getElementById("regNameErr").innerText = "";
        document.getElementById("emailErr").innerText = "";
        document.getElementById("regPasswordErr").innerText = "";
        document.getElementById("confirmPasswordErr").innerText = "";

        // Validate Full Name
       
        if (regName.trim() === "") {
    errors.push({ id: "regNameErr", msg: "Full name is required" });
} else {
    // Normalize spaces (convert multiple spaces to a single space)
    regName = regName.replace(/\s+/g, " ").trim();
    const nameFormat = /^[a-zA-Z\s]+$/;

    // Validate name format (only letters and spaces)
    if (!nameFormat.test(regName)) {
        errors.push({ id: "regNameErr", msg: "Enter a valid name" });
    } 
    // Check length after normalization
    else if (regName.length < 5) {
        errors.push({ id: "regNameErr", msg: "Full name must be at least 5 characters long" });
    }
}


        // Validate Email
        if (regEmail === "") {
            errors.push({ id: "emailErr", msg: "Email is required" });
        } else {
            const mailFormat = /^[a-zA-Z][a-zA-Z0-9]*@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
            if (/\s/.test(regEmail)) {
                errors.push({ id: "emailErr", msg: "Email must not contain spaces" });
            } else if (!mailFormat.test(regEmail)) {
                errors.push({ id: "emailErr", msg: "Enter a valid email" });
            }
        }

        // Validate Password
        if (regPassword === "") {
            errors.push({ id: "regPasswordErr", msg: "Password is required" });
        } else if (regPassword.length < 8) {
            errors.push({
                id: "regPasswordErr",
                msg: "Password must be at least 8 characters long",
            });
        } else {
            const passStrength =
                /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
            if (!passStrength.test(regPassword)) {
                errors.push({
                    id: "regPasswordErr",
                    msg: "Password must include uppercase, lowercase, digit, and special character",
                });
            }
        }

        // Validate Confirm Password
        if (confirmPassword === "") {
            errors.push({
                id: "confirmPasswordErr",
                msg: "Please confirm the password",
            });
        } else if (regPassword !== confirmPassword) {
            errors.push({
                id: "confirmPasswordErr",
                msg: "Passwords do not match",
            });
        }

        // Display errors
        if (errors.length > 0) {
            errors.forEach((error) => {
                document.getElementById(error.id).innerText = error.msg;
            });
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>



</html>