<?php
include('../admin/include/config.php');

if(isset($_POST['update_news_id']) && isset($_POST['update_news_name']) && isset($_POST['update_news_text'])) {
    $news_id = $_POST['update_news_id'];
    $news_name = mysqli_real_escape_string($con, $_POST['update_news_name']);
    $news_text = mysqli_real_escape_string($con, $_POST['update_news_text']);

    $sql = "UPDATE `news` SET `titlen` = '$news_name', `content` = '$news_text' WHERE `id` = '$news_id'";

    if(mysqli_query($con, $sql)) {
        header("location:Addnews.php");
    } else {
        echo "Error updating news: " . mysqli_error($con);
    }
} else {
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News</title>
    <style>body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    
    form {
        background-color: #fff;
        padding: 20px;
        margin: 20px auto;
        max-width: 400px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    input[type="text"] {
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
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

</head>
<body>
    <form action="update-news.php" method="post" enctype="multipart/form-data">
        <h1>update news</h1>
        <input type="hidden" name="update_news_id" value="<?php echo isset($_POST['update_news_id']) ? $_POST['update_news_id'] : ''; ?>">
        <input type="text" name="update_news_name" value="<?php echo isset($_POST['update_news_name']) ? $_POST['update_news_name'] : ''; ?>" placeholder="Enter news title">
        <input type="text" name="update_news_text" value="<?php echo isset($_POST['update_news_text']) ? $_POST['update_news_text'] : ''; ?>" placeholder="Enter content text">
        <input type="submit" name="update_news" value="Update">
    </form>
    <?php
    include('./include/footer.php');
    include('../admin/include/scripts.php');

    ?>
</body>
</html>
