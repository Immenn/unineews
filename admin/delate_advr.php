<?php
if(isset($_GET['id'])) {
    include('../admin/include/config.php');
    $advertisement_id = $_GET['id'];
    $delete_query = mysqli_query($con, "DELETE FROM `advertisement` WHERE id = '$advertisement_id'") or die('query failed');

    if($delete_query) {
        header('Location: add-advr.php'); 
        exit();
    } else {
        echo 'Failed to delete course.';
    }
} else {
    echo '$advertisement_id  ID is not provided.';
}
?>