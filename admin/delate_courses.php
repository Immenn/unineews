<?php
if(isset($_GET['id'])) {
    include('../admin/include/config.php');
    $course_id = $_GET['id'];
    $delete_query = mysqli_query($con, "DELETE FROM `courses` WHERE id = '$course_id'") or die('query failed');

    if($delete_query) {
        header('Location: add-courses.php'); 
        exit();
    } else {
        echo 'Failed to delete course.';
    }
} else {
    echo 'Course ID is not provided.';
}
?>