<?php
if(isset($_GET['id'])) {
    include('../admin/include/config.php');
    $user_id = $_GET['id'];
    $delete_query = mysqli_query($con, "DELETE FROM `user` WHERE id = '$user_id'");

    if($delete_query) {
        header('Location: ad-user.php');
        exit();
    } else {
        echo 'Failed to delete user.';
    }
} else {
    echo 'user ID is not provided.';
}
?>