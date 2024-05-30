<?php
include('config.php');
$sql1 = "SELECT * FROM news";
$result1 = $con->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body><?php
  include('header1.php');?>
  <section class="section News" id="news" aria-label="news">
      <div class="container">
   <ul class="grid-list">
                <?php
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {
                ?>
                <li>
                    <div class="chapter-card">
                        <a href="full_news.php?id=<?php echo $row['id'];?>"> <h3 class="h3 card-title"><?php echo $row["titlen"]; ?></a></h3>
                        <p class="card-text"><?php $content_perview = substr($row["content"], 0, 150); echo $content_perview ."..."; ?></p>
                        <a href="full_news.php?id=<?php echo $row['id'];?>" class="btn-link">
                            <span class="span">Read more</span>
                            <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                        </a>
                    </div>
                </li>
                <?php
                    }
                } else {
                    echo "No record found";
                }
                ?>
            </ul>
            </section>

</body>
</html>