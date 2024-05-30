<?php
session_start();

include('../admin/include/header.php');
include('../admin/include/config.php');

if(isset($_POST['add_advr'])){
    $photo = $_FILES['photo']['name'];
    $photo_size = $_FILES['photo']['size'];
    $photo_tmp_name = $_FILES['photo']['tmp_name'];
    $photo_folder = 'uploaded_img/'.$photo;

    $check_query = mysqli_query($con, "SELECT * FROM `advertisement` WHERE photo = '$photo'");
    if(mysqli_num_rows($check_query) > 0){
        $message[] = 'This advertisement already exists!';
    } else {
        $add_advr_query = mysqli_query($con, "INSERT INTO `advertisement` (photo) VALUES ('$photo')") or die('query failed');

        if($add_advr_query){
            if($photo_size > 20000000){
                $message[] = 'photo size is too large';
            }else{
                move_uploaded_file($photo_tmp_name, $photo_folder);
                $message[] = 'advertisement added successfully!';
            }
        }else{
            $message[] = 'advertisement could not be added!';
        }
    }
    
    $_SESSION['last_uploaded_photo'] = $photo;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Free Advertisement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/styles.css">
    <style>
.container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
  }      
/* Style for form */
.form {
    margin-bottom: 20px;
    max-width: 600px;
    padding: 20px;
    border: 1px solid #ccc;
    
}

.form--input {
    margin-bottom: 10px;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form--submit {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

/* Style for courses section */
.show-courses {
    margin-top: 20px;
}

.box-container {
    display: flex;
    flex-wrap: wrap;
}

.box {
    width: 300px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.box img {
    width: 100%;
    border-radius: 5px;
}

.name {
    font-weight: bold;
    margin-bottom: 5px;
}

.text {
    margin-bottom: 10px;
}

.option-btn, .delete-btn {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
}

.delete-btn {
    background-color: #dc3545;
    margin-left: 5px;
}

.empty {
    text-align: center;
    font-style: italic;
    color: #777;
}

/* Style for edit courses form */
.edit-courses-form {
    display: none;
    margin-top: 20px;
}

.courses_img {
    width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}

.courses_tag {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.option-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    margin-right: 5px;
    border-radius: 5px;
    cursor: pointer;
}

#close-update {
    background-color: #dc3545;
    margin-right: 5px;
}

.delete-btn {
    background-color: #dc3545;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}    
    </style>
</head>
<body>
<div class="container">
    <section>
        <form class="form" method="post" enctype="multipart/form-data">
            <h3 class="add_advr">Add advertisement</h3>
            <br><br><br>
            <input type="file" name="photo" accept="image/jpg, image/jpeg, image/png" class="form--input" required>
            <input type="submit" value="Add advertisement" name="add_advr" class="form--submit">
        </form>
    </section>
</div>
<section class="show-courses">
    <div class="box-container">
        <?php
        $select_advr = mysqli_query($con, "SELECT * FROM `advertisement`") or die('query failed');
        if(mysqli_num_rows($select_advr) > 0){
            while($fetch_advr = mysqli_fetch_assoc($select_advr)){
        ?>
        <div class="box">
            <img src="uploaded_img/<?php echo $fetch_advr['photo']; ?>" alt=""><br><br>
            <a href="update_advr.php?id=<?php echo $fetch_advr['id']; ?>" class="option-btn">Update</a>
            <a href="delate_advr.php?id=<?php echo $fetch_advr['id']; ?>" class="delete-btn" onclick="return confirm('Delete this advertisement?');">Delete</a>
        </div>
        <?php
            }
        }else{
            echo '<p class="empty">No advertisement added yet!</p>';
        }
        ?>
    </div>
</section>
</body>
<?php

include('../admin/include/footer.php');
include('../admin/include/scripts.php');
?>
</html>