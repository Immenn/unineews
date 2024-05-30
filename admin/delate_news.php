<?php
if(isset($_GET['id'])) {
    include('../admin/include/config.php');
    $news_id = $_GET['id'];
    $delete_query = mysqli_query($con, "DELETE FROM `news` WHERE id = '$news_id'") or die('query failed');

    if($delete_query) {
        header('Location: Addnews.php'); 
        exit();
    } else {
        echo 'Failed to delete news.';
    }
} else {
    echo '$news_id  ID is not provided.';
}
?>