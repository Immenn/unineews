<?php
include('../admin/include/config.php');
include('../admin/include/header.php');

if(isset($_POST['titlen']) && isset($_POST['content']) && ! empty($_POST['titlen'])&& ! empty($_POST['content'])) {
    $title = $_POST['titlen'];
    $content = $_POST['content'];

    $sql = "INSERT INTO news (titlen, content) VALUES ('$title', '$content') VALUE (?, ?)";
    $sql = "INSERT INTO news (titlen, content) VALUES (?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Error: " . $stmt->error;
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Add News</title>
 <style>
 h2 {
    text-align: center;
    margin-bottom: 20px;
    }

form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label, input, textarea {
  display: block;
  width: 100%;
  margin-bottom: 10px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

.show-courses {
    margin-top: 20px;
}

.box-container {
    display: flex;
    flex-wrap: wrap;
}

.box {
    width: 300px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.box img {
    width: 100%;
    border-radius: 5px;
}

.name {
    font-weight: bold;
    margin-bottom: 5px;
}

.text {
    margin-bottom: 10px;
}

.option-btn {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 5px;
}

.delete-btn {
    display: inline-block;
    padding: 5px 10px;
    background-color: #dc3545;
    color: #ccc;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 5px;
}

.empty {
    text-align: center;
    font-style: italic;
    color: #777;
}

/* Style for edit courses form */
.edit-courses-form {
    display: none;
    margin-top: 20px;
}

.courses_img {
    width: 100%;
    border-radius: 5px;
    margin-bottom: 10px;
}

.courses_tag {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 20px;
    cursor: pointer;
    border-radius: 5px;
}

#close-update {
    background-color: #dc3545;
    margin-right: 5px;
}
</style>
</head>
<body>
 
    
    
    <form action="Addnews.php" method="post">
        <h2>Add News</h2>
        <label for="titlen">Title:</label><br>
        <input type="text" id="titlen" name="titlen"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
    <section class="show-courses">
    <div class="box-container">
        <?php
        $select_news = mysqli_query($con, "SELECT * FROM `news`") or die('query failed');
        if(mysqli_num_rows($select_news) > 0){
            while($fetch_news = mysqli_fetch_assoc($select_news)){
        ?>
        <div class="box">
            <div class="name"><?php echo $fetch_news['titlen']; ?></div>
            <div class="text"><?php echo $fetch_news['content']; ?></div>

            <!-- <form action="update-news.php" method="post"> -->
                <a href="update-news.php"></a>
    <input type="hidden" name="update_news_id" value="<?php echo $fetch_news['id']; ?>">
    <button type="submit" class="option-btn">Update</button>
<!-- </form>   -->
          <a href="delate_news.php?id=<?php echo $fetch_news['id']; ?>" class="delete-btn" onclick="return confirm('Delete this news?');">Delete</a>
        </div>
        <?php
            }
        }else{
            echo '<p class="empty">No news added yet!</p>';
        }
        ?>
    </div>
</section>
    <?php
    include('../admin/include/footer.php');
   

include('../admin/include/scripts.php');
?>

</body>
</html>


