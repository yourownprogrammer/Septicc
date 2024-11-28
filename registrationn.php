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
                    header("Location: loginn.php"); // Redirect to login
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
       
        <form action="registrationn.php" method="post" onsubmit="return validateForm()">
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
        <div>
            <!-- <p>Already Registered? <a href="loginn.php">Login here</a></p> -->
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

            // Validate Email
            if (regEmail === "") {
                errors.push({
                    id: "emailErr",
                    msg: "Email is required"
                });
            } else {
                var mailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
                if (!(regEmail.match(mailFormat))) {
                    errors.push({
                        id: "emailErr",
                        msg: "Enter a valid email"
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