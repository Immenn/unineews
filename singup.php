<?php
include('config.php');
session_start(); // Start session to check if user is logged in

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['name'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $con->prepare("INSERT INTO user (username, fullname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $fullname, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // Start session and store user information
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $hashed_password;

        // Redirect to index.php after successful signup
        header("Location: index.php");
        exit();
       
    } else {
        echo "Error: " . $con->error;
    }
    $stmt->close();
}
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Bai Jamjuree', sans-serif;
            background-color: #f0f0f0; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25); 
            width: 300px;
            text-align: center;
        }

        .login-header h1 {
            font-size: 1.9rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container {
            text-align: left;
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .input-box input,
        .input-box select {
            width: 100%;
            height: 35px;
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .input-submit {
            margin-top: 20px;
        }

        .submit-btn {
            width: 100%;
            height: 35px;
            background-color: #213a5c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #90a4b0;
        }

        .sign-up-link {
            margin-top: 20px;
            text-align: center;
        }

        .sign-up-link p {
            font-size: 0.9rem;
            color: #555;
        }

        .sign-up-link a {
            color: #0e2038;
            text-decoration: none;
        }

        .sign-up-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Registration</h1>
        </div>
        <div class="form-container">
            <form action="singup.php" method="POST">
                <div class="input-box">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" required placeholder="User name:">
                </div>
                <div class="input-box">
                    <label for="fullname"></label>
                    <input type="text" id="fullname" name="fullname" required placeholder="Full name:">
                </div>
                <div class="input-box">
                    <label for="email"></label>
                    <input type="email" id="email" name="email" required placeholder="Email:">
                </div>
                <div class="input-box">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" required placeholder="Password:">
                </div>
                
                <div class="input-submit">
                    <button type="submit" name="submit" class="submit-btn">Register</button>
                </div>
            </form>
            <div class="sign-up-link">
                <p>Already a member? <a href="login.php">Sign in</a></p>
            </div>
        </div>
    </div>
</body>
</html>
