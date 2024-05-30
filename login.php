
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!--<link rel="stylesheet" href="./assets/css/login.css">-->
  
</head>
<body>
<?php
session_start(); // Start session to check if user is logged in

// Check if user is already logged in
if(isset($_SESSION['username'])) {
    // If user is already logged in, redirect to full_news.php
    header("Location: index.php");
    exit;
}

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Start session and store username
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        if(isset($_GET['id'])){
          $news_id = $_GET['id'];
          header("Location: index.php");
      } else {
          header("Location: login.php");
      }
      exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}

$con->close();
?>
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

        .input-box {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .input-box input {
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
            <h1>Login</h1>
        </div>
        <form id="login-form" action="login.php" method="post">
            <div class="input-box">
                <label for="email"></label>
                <input type="email" id="email" name="email" required placeholder="Email:">
            </div>
            <div class="input-box">
                <label for="password"></label>
                <input type="password" id="password" name="password" required placeholder="Password:">
            </div>
            
            <div class="input-submit">
                <button type="submit" class="submit-btn">Login</button>
            </div>
        </form>
        <div class="sign-up-link">
            <p>New to Uninews? <a href="singup.php">Create an account</a></p>
        </div>
    </div>
</body>

</html>

