<?php
if(isset($_GET['id'])) {
    include('../admin/include/config.php');
    $message_id = $_GET['id'];
    $delete_query = mysqli_query($con, "DELETE FROM `contact` WHERE id = '$message_id'");

    if($delete_query) {
        header('Location: ad-contact.php');
        exit();
    } else {
        echo 'Failed to delete contact.';
    }
} else {
    echo 'Contact ID is not provided.';
}
?>