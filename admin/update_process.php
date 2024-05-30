<?php
include('../admin/include/config.php');


if(isset($_POST['update_course'])) {
    $course_id = $_POST['update_course_id'];
    $course_name = mysqli_real_escape_string($con, $_POST['update_course_name']);
    $course_text = mysqli_real_escape_string($con, $_POST['update_course_text']);

    if(isset($_FILES['update_course_photo']) && $_FILES['update_course_photo']['error'] === UPLOAD_ERR_OK) {
        $update_photo_tmp_name = $_FILES['update_course_photo']['tmp_name'];
        $update_photo_name = $_FILES['update_course_photo']['name'];
        $update_photo_folder = 'uploaded_img/' . $update_photo_name;

        unlink('uploaded_img/' . $fetch_course['photo']);

        move_uploaded_file($update_photo_tmp_name, $update_photo_folder);

        mysqli_query($con, "UPDATE `courses` SET photo = '$update_photo_name' WHERE id = '$course_id'") or die('query failed');
    }

    mysqli_query($con, "UPDATE `courses` SET time = '$course_name', text = '$course_text' WHERE id = '$course_id'") or die('query failed');

    header('Location: add-courses.php');
    exit();
} else {
    echo 'Update course data is not provided.';
}




?>