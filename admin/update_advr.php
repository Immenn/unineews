<?php
session_start();

include('../admin/include/config.php');

if(isset($_POST['update_advr'])){
    $id = $_GET['id'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp_name = $_FILES['photo']['tmp_name'];

    move_uploaded_file($photo_tmp_name, 'uploaded_img/'.$photo);
    
    $update_advr_query = mysqli_query($con, "UPDATE `advertisement` SET photo = '$photo' WHERE id = '$id'") or die('query failed');
    $_SESSION['message'] = 'Advertisement updated successfully!';
    header("Location: Add-advr.php");
    exit();
}

$id = $_GET['id'];
$select_advr = mysqli_query($con, "SELECT * FROM `advertisement` WHERE id = '$id'") or die('query failed');
$fetch_advr = mysqli_fetch_assoc($select_advr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Advertisement</title>
    <style>body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    
    h3 {
        color: #333;
      
    }
    
    form {
        background-color: #fff;
        padding: 20px;
        margin: 20px auto;
        max-width: 400px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       
        
    }
    
    input[type="file"] {
        margin-bottom: 10px;
    }
    
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
    
    <?php
    include('./include/header.php');
    ?>
</head>
<body>
    
    <form method="post" enctype="multipart/form-data">
    <h3>Update Advertisement</h3>
        <input type="file" name="photo" accept="image/jpg, image/jpeg, image/png" required>
        <input type="submit" value="Update " name="update_advr">
    </form>
    <?php
    include('./include/footer.php');
    include('../admin/include/scripts.php');

    ?>
</body>
</html>
