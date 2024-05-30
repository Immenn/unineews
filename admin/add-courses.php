<?php
include('../admin/include/header.php');
include('../admin/include/config.php');

if(isset($_POST['add_courses'])){
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $text = mysqli_real_escape_string($con, $_POST['text']);
    $cat = mysqli_real_escape_string($con, $_POST['cat']); 
    $url = mysqli_real_escape_string($con, $_POST['URL']); 

    $photo = $_FILES['photo']['name'];
    $photo_size = $_FILES['photo']['size'];
    $photo_tmp_name = $_FILES['photo']['tmp_name'];
    $photo_folder = 'uploaded_img/'.$photo;

    $select_courses_time = mysqli_query($con, "SELECT time FROM `courses` WHERE time = '$time'") or die('query failed');

    if(mysqli_num_rows($select_courses_time) > 0){
        $message[] = 'courses time already added';
    }else{
        $add_courses_query = mysqli_query($con, "INSERT INTO `courses`(time, text, cat, URL, photo) VALUES('$time', '$text', '$cat', '$url', '$photo')") or die('query failed');
        if($add_courses_query){
            if($photo_size > 20000000){
                $message[] = 'photo size is too large';
            }else{
                move_uploaded_file($photo_tmp_name, $photo_folder);
                $message[] = 'courses added successfully!';
            }
        }else{
            $message[] = 'courses could not be added!';
        }
    }
}

if(isset($_GET['delete'])){
    $delete_time = $_GET['delete'];
    $delete_photo_query = mysqli_query($con, "SELECT photo FROM `courses` WHERE time = '$delete_time'") or die('query failed');
    $fetch_delete_photo = mysqli_fetch_assoc($delete_photo_query);
    unlink('uploaded_img/'.$fetch_delete_photo['photo']);
    mysqli_query($con, "DELETE FROM `courses` WHERE time = '$delete_time'") or die('query failed');
}

if(isset($_POST['update_courses'])){
    $update_c_time = $_POST['update_c_time'];
    $update_text = mysqli_real_escape_string($con, $_POST['update_text']);

    mysqli_query($con, "UPDATE `courses` SET text = '$update_text' WHERE time = '$update_c_time'") or die('query failed');

    $update_photo = $_FILES['update_photo']['name'];
    $update_photo_tmp_name = $_FILES['update_photo']['tmp_name'];
    $update_photo_size = $_FILES['update_photo']['size'];
    $update_folder = 'uploaded_img/'.$update_photo;
    $update_old_photo = $_POST['update_old_photo'];

    if(!empty($update_photo)){
        if($update_photo_size > 2000000){
            $message[] = 'photo file size is too large';
        }else{
            mysqli_query($con, "UPDATE `courses` SET photo = '$update_photo' WHERE time = '$update_c_time'") or die('query failed');
            move_uploaded_file($update_photo_tmp_name, $update_folder);
            unlink('uploaded_img/'.$update_old_photo);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Free Courses</title>
    <!-- font awesome cdn link  -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
  .container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
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
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}
    </style>

</head>
<body>
<!-- courses CRUD section starts  -->
<div class="container">
<section>
    <form class="form" method="post" enctype="multipart/form-data">
        <h3 class="add_courses">Add Free Courses</h3>
        <br><br><br>
        <input type="text" name="time" class="form--input" placeholder="Enter courses time" required>
        <input type="text" name="text" class="form--input" placeholder="Enter courses text" required>
        <input type="text" name="category" class="form--input" placeholder="Enter courses category" required>
        <input type="text" name="url" class="form--input" placeholder="Enter the URL" required>


        <input type="file" name="photo" accept="image/jpg, image/jpeg, image/png" class="form--input" required>
        <input type="submit" value="Add Courses" name="add_courses" class="form--submit">
    </form>
</section>
</div>
<!-- courses CRUD section ends -->
<!-- Show courses --><section class="show-courses">
    <div class="box-container">
        <?php
        $select_courses = mysqli_query($con, "SELECT * FROM `courses`") or die('query failed');
        if(mysqli_num_rows($select_courses) > 0){
            while($fetch_courses = mysqli_fetch_assoc($select_courses)){
        ?>
        <div class="box">
            <img src="uploaded_img/<?php echo $fetch_courses['photo']; ?>" alt="">
            <div class="name"><?php echo $fetch_courses['time']; ?></div>
            <div class="text"><?php echo $fetch_courses['text']; ?></div>
            <div class="text"><?php echo $fetch_courses['cat']; ?></div> 
            <div class="text"><a href="<?php echo $fetch_courses['URL']; ?>"target="_blank"<?php echo $fetch_courses['URL']; ?></a></div> 
            
            <a href="update_courses.php?id=<?php echo $fetch_courses['id']; ?>" class="option-btn">Update</a>
            <a href="delate_courses.php?id=<?php echo $fetch_courses['id']; ?>" class="delete-btn" onclick="return confirm('Delete this courses?');">Delete</a>
        </div>
        <?php
            }
        }else{
            echo '<p class="empty">No courses added yet!</p>';
        }
        ?>
    </div>
</section>
<section class="edit-courses-form">
    <?php
    if(isset($_GET['update'])){
        $update_time = $_GET['update'];
        $update_query = mysqli_query($con, "SELECT * FROM `courses` WHERE time = '$update_time'") or die('query failed');
        if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="update_c_time" value="<?php echo $fetch_update['time']; ?>">
        <input type="hidden" name="update_old_photo" value="<?php echo $fetch_update['photo']; ?>">
        <img src="uploaded_img/<?php echo $fetch_update['photo']; ?>" alt="" class="courses_img">
        <input type="text" name="update_text" value="<?php echo $fetch_update['text']; ?>" class="courses_tag" required placeholder="Enter courses ">
        <input type="text" name="update_text" value="<?php echo $fetch_update['URL']; ?>"  required placeholder="Enter URL">

        <input type="file" class="box" name="update_photo" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" value="Update" name="update_courses" class="btn">
        <input type="reset" value="Cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>
</body>
<?php

include('../admin/include/footer.php');
include('../admin/include/scripts.php');
?>
</html>