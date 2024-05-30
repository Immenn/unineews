<?php
// Include database connection
include('config.php');
session_start();


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (isset($_GET['comment_id'])) {
        $comment_id = $_GET['comment_id'];

        // Sanitize input to prevent SQL injection
        $comment_id = mysqli_real_escape_string($con, $comment_id);

        $query = "UPDATE comment SET dislike = dislike + 1 WHERE id = $comment_id";
        $result = mysqli_query($con, $query);

        if ($result) {
            ;

            exit();
        } else {
            echo "An error occurred while updating the like.";
        }
    } else {
        echo "Comment ID is not specified";
    }
} else {
    // If user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}
?>
