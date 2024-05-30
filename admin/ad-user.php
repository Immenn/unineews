<?php
include('../admin/include/header.php');
include('../admin/include/config.php');

$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = array();

    while($row = mysqli_fetch_assoc($result)) {
        $user[] = $row;
    }
} else {
    $user = array(); 
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
    <h1>User Page</h1>
    
    <?php foreach ($user as $user): ?>
        <div class="message-container">
            <p> <span>User Name:</span>
                 <?php echo $user['username']; ?></p>
            <p><span>Full Name:</span> <?php echo $user['fullname']; ?></p>

            <p><span>Email:</span> <?php echo $user['email']; ?></p>

            
            <form action="delete_user.php" method="get">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
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