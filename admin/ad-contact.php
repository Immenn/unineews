<?php
include('../admin/include/header.php');
include('../admin/include/config.php');




$sql = "SELECT * FROM contact";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $messages = array();

    while($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
} else {
    $messages = array(); 
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles.css">

    <title>Uninews|Admin</title>
    <style>
        .message-container {
            display: inline-block;
            width: 30%; 
            margin-right: 20px; 
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            box-sizing: border-box;
            vertical-align: top; 

        }
        
        
  

.message-container form input[type="submit"][name="delete_message"] {
    background-color: #dc3545; 
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}


    </style>
</head>
<body>
    <h1>Contact Page</h1>
    
    <?php foreach ($messages as $message): ?>
        <div class="message-container">
            <p>User Name: <?php echo $message['name']; ?></p>
            <p>Email: <?php echo $message['email']; ?></p>
            <p>Message: <?php echo $message['message']; ?></p>
            
            <form action="delete_mesg.php" method="get">
    <input type="hidden" name="id" value="<?php echo $message['id']; ?>">
    <input type="submit" name="delete_message" value="Delete">
</form>
            
        </div>
    <?php endforeach; ?>
    <?php

include('../admin/include/footer.php');
include('../admin/include/scripts.php');
?>
</body>
</html>