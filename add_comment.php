<?php
include('config.php');
session_start(); // Start session to check if user is logged in

// Debugging output
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : '';
    $raiting = isset($_POST['raiting']) ? $_POST['raiting'] : '';

    if (empty($comment)) {
        echo "Please enter a valid comment.";
    } elseif (empty($news_id)) {
        echo "News ID is missing.";
    } elseif (empty($raiting)) {
        echo "Rating is missing.";
    } else {
        $query_user_id = "SELECT id FROM user WHERE username = ?";
        $stmt_user_id = $con->prepare($query_user_id);
        $stmt_user_id->bind_param("s", $username);
        $stmt_user_id->execute();
        $result_user_id = $stmt_user_id->get_result();

        if ($result_user_id->num_rows > 0) {
            $row_user_id = $result_user_id->fetch_assoc();
            $user_id = $row_user_id['id'];

            $query = "INSERT INTO comment (idnews, comment, iduser, raiting) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($query);
            $stmt->bind_param("isii", $news_id, $comment, $user_id, $raiting);
            $result = $stmt->execute();

            if ($result) {
                header("Location: full_news.php?id=$news_id");
                exit();
            } else {
                echo "An error occurred while adding the comment.";
            }
        } else {
            echo "User ID not found for username: $username";
        }

        $stmt_user_id->close();
    }
} else {
    header("Location: login.php");
    exit;
}
?>