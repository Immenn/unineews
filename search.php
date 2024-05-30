<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 90px;
        }
        .grid-item {
            flex-basis: calc(50% - 10px);
            margin-bottom: 20px;
        }
        .chapter-card, .course-card {
            padding: 20px;
        }
    </style>
    <title>Search Results</title>
</head>
<body>
<?php
include('config.php');
include('header1.php');
?>
<div class="grid-container">
<?php
// Search for news
if(isset($_GET['search'])){
    $filtervalues = $_GET['search'];
    $query_news = "SELECT * FROM news WHERE CONCAT(titlen, content) LIKE '%$filtervalues%'";
    $query_run_news = mysqli_query($con, $query_news);
    if(mysqli_num_rows($query_run_news) > 0) {
        while($row_news = mysqli_fetch_assoc($query_run_news)) {
            ?>
            <div class="grid-item">
                <div class="chapter-card">
                    <h3 class="h3 card-title"><?php echo $row_news["titlen"]; ?></h3>
                    <p class="card-text"><?php echo $row_news["content"]; ?></p>
                    <a href="full_news.php?id=<?php echo $row_news['id']; ?>" class="btn-link">
                        <span class="span">Read more</span>
                        <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                    </a>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='grid-item'>No news record found</div>";
    }
} else {
    echo "<div class='grid-item'>No search query provided for news</div>";
}

// Search for courses
if(isset($_GET['search'])){
    $filtervalues = $_GET['search'];
    $query_courses = "SELECT * FROM courses WHERE CONCAT(cat, text) LIKE '%$filtervalues%'";
    $query_run_courses = mysqli_query($con, $query_courses);
    if(mysqli_num_rows($query_run_courses) > 0) {
        while($row_courses = mysqli_fetch_assoc($query_run_courses)) {
            ?>
            <div class="grid-item">
                <div class="course-card">
                    <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                        <img src="<?php echo $row_courses["photo"]; ?>" width="370" height="220" loading="lazy" alt="Course Image" class="img-cover">
                    </figure>
                    <div class="abs-badge">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                        <span class="span"><?php echo $row_courses["time"]; ?></span>
                    </div>
                    <div class="card-content">
                        <span class="badge"><?php echo $row_courses["cat"]; ?></span>
                        <h3 class="h3"><a href="#" class="card-title"><?php echo $row_courses["text"]; ?></a></h3>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='grid-item'>No courses record found</div>";
    }
} else {
    echo "<div class='grid-item'>No search query provided for courses</div>";
}
?>
</div>
</body>
</html>