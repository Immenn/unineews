

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
   
  </head>
  <body>
    
  
    <div class="contact-form">
        <form action="" method="post">
            <div>
                <input type="text" name="name" class="form-control" placeholder="Your Name">
                <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
            <textarea name="message" rows="5" placeholder="Message" class="form-control"></textarea>
            <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
   

   

          <div>
            <img src = "contact-png.png" alt = "">
          </div>
        </div>
      </div>
      <?php
    
    include 'config.php';

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($con->query($sql) === TRUE) {
            echo "<p>Record inserted successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $con->error . "</p>";
        }
    }
    ?>


    </section>

    

  </body>
</html>