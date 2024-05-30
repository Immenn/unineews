<?php
include('../admin/include/config.php');

if(isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $select_query = mysqli_query($con, "SELECT * FROM `courses` WHERE id = '$course_id'") or die('query failed');
    $fetch_course = mysqli_fetch_assoc($select_query);
} else {
    echo 'Course ID is not provided.';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Update Course</title>
</head>
<body>
<style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
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

input[type="text"],
input[type="file"] {
    width: 100%;
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
    <?php
    include('./include/header.php');
    ?>
    <form action="update_process.php" method="post" enctype="multipart/form-data">
    <h2>Update Course</h2>
    <input type="hidden" name="update_course_id" value="<?php echo $fetch_course['id']; ?>">
    <input type="text" name="update_course_name" value="<?php echo $fetch_course['time']; ?>" placeholder="Enter course name">
    <input type="text" name="update_course_text" value="<?php echo $fetch_course['text']; ?>" placeholder="Enter course text">
    <input type="file" name="update_course_photo" accept="image/jpg, image/jpeg, image/png">
    <input type="submit" name="update_course" value="Update">
</form>
<?php
    include('./include/footer.php');
    include('../admin/include/scripts.php');
    ?>
</body>
</html>