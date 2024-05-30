<?php
include('../admin/include/config.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) == 1){
        header("Location: dashboard.php");
        exit();
    } else {
        echo "invalide information!";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/login.css">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <body>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="admin-header">
    <h2>Welcome Admin!</h2>
    <p>Please login to access the admin panel</p></div>
    <div class="contact-form">
        <form action="" method="post">
            <div>
                <input type="email" name="email" class="form-control" placeholder="Your Email">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <input type="submit" name="submit" class="send-btn" value="login">
        </form>
          <div>
            <img src = "assets/images/contact-png.png" alt = "">
          </div>
        </div>
      </div>
    </section>
  </body>
</html>