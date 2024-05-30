<?php
include('config.php');
include('sidebarn.php');

// Check if news_id is specified
if (isset($_GET['id'])) {
    $news_id = (int)$_GET['id']; // Ensure integer value
    if ($news_id > 0) {
        $query = "SELECT * FROM news WHERE id = $news_id";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $news = mysqli_fetch_assoc($result);
            // Escape HTML special characters in news content
            $escaped_content = htmlspecialchars($news['content']);
        } else {
            echo "News does not exist!";
            exit; // Exit if news does not exist
        }
    } else {
        echo "Invalid news ID";
        exit; // Exit if invalid news ID
    }
} else {
    echo "News is not specified";
    exit; // Exit if news is not specified
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['titlen']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

.container {
    display: grid;
    grid-template-columns: 200px 1fr;
    grid-template-rows: auto 1fr auto;
    gap: 20px;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar {
    grid-column: 1;
    grid-row: 1 / span 3;
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    position: relative;
}

.sidebar h3 {
    margin-bottom: 10px;
    font-size: 1.2em;
}

.full-news {
    grid-column: 2;
    grid-row: 2;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 0 5px rgba(0, 0, 139, 0.5); 
    width: 1000px;
    margin-top: -290px;
    margin-left: 25.5%;
}


.full-news h2 {
    margin-bottom: 10px;
    font-size: 1.5em;
    color: #333;
}

.full-news p {
    font-size: 1em;
    color: #555;
    line-height: 1.8;
}

/* Comments section styles */
.comments {
    grid-column: 2;
    grid-row: 3;
    margin: 20px 0;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 10px;
}

.comments h2 {
    margin-bottom: 10px;
    font-size: 1.2em;
}

.comments .comment {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}

.comments .comment p {
    margin-bottom: 10px;
    color: #333;
}

.comments .like-dislike-container {
    display: flex;
    align-items: center;
}

.comments .like-dislike-container button {
    background: none;
    border: #000;
    cursor: pointer;
    font-size: 1em;
    margin-left: 5px;
}

.comments .like-dislike-container button:focus {
    outline: #000;
}

.comments .like-dislike-container span {
    margin-right: 20px;
}

.comments .like-btn .fas,
.comments .dislike-btn .fas {
    color: #ccc;
}

.comments .like-btn .fas:hover,
.comments .dislike-btn .fas:hover {
    color: #007BFF;
}
.top-news-list {
    background-color: #fff; 
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
    box-shadow: 0 0 5px rgba(0, 0, 139, 0.5); 
    width: 300px; 
    color: #000; 
    margin-top: -100px;
}

.top-news-list ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.top-news-list li {
    margin-bottom: 10px;
    font-size: 0.8em; 
}

.top-news-list a {
    color: blue; 
   
    text-decoration: underline;
}

.top-news-list a:hover {
    text-decoration: underline;
    color:navy;
}

.top-news-list h2 {
    font-size: 1em; 
}




@media (max-width: 768px) {
    .container {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }

    .sidebar {
        grid-column: 1;
        grid-row: 1;
    }

    .full-news {
        grid-column: 1;
        grid-row: 2;
    }

    .comments {
        grid-column: 1;
        grid-row: 3;
    }

}

</style>
</head>

<body>
    <div class="full-news">
        <h2><?php echo htmlspecialchars($news['titlen']); ?></h2>
        <p><?php echo $escaped_content; ?></p>
    </div>

    <?php
   

    // Function to get news details by ID
    function getNewsDetails($con, $newsId)
{
    $query = "SELECT * FROM news WHERE id = $newsId";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}

// Function to get all ratings from the comments table
function getRatings($con)
{
    $ratings = array();
    $result = mysqli_query($con, "SELECT * FROM comment");
    while ($row = mysqli_fetch_assoc($result)) {
        $ratings[$row['idnews']]['rating'][] = $row['raiting'];
    }
    return $ratings;
}

// Function to calculate average rating for each news
function calculateAverageRating($ratings)
{
    $averageRatings = array();
    foreach ($ratings as $newsId => $data) {
        if (isset($data['rating'])) {
            $averageRating = array_sum($data['rating']) / count($data['rating']);
            $averageRatings[$newsId] = $averageRating;
        }
    }
    arsort($averageRatings);
    return $averageRatings;
}

// Get all ratings
$ratings = getRatings($con);

// Calculate average ratings
$averageRatings = calculateAverageRating($ratings);

// Display top news by average rating
echo "<div class='top-news-list'>";
echo "<h2>Top News:</h2>";
echo "<ul>";
foreach ($averageRatings as $newsId => $averageRating) {
    $newsDetails = getNewsDetails($con, $newsId);
    echo "<li><a href='full_news.php?id=$newsId'>" . htmlspecialchars($newsDetails['titlen']) . "</a> (Rating: " . round($averageRating, 2) . ")</li>";
}
echo "</ul>";
echo "</div>";


    include('comment.php')
    ?>
</body>

</html>
