<?php
include('config.php');
$sql2 = "SELECT * FROM courses";
$result2 = $con->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free courses</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body><?php
  include('header1.php');?>
<section class="section course" id="courses" aria-label="course">
    <div class="container">
<ul class="grid-list">
            <?php
            $select_courses = mysqli_query($con, "SELECT * FROM `courses`") or die('query failed');
            if(mysqli_num_rows($select_courses) > 0){
                while($fetch_courses = mysqli_fetch_assoc($select_courses)){
            ?>
            <li>
                <div class="course-card">
                    <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                        <img src="admin/uploaded_img/<?php echo $fetch_courses["photo"]; ?>" width="370" height="220" loading="lazy"
                            alt="<?php echo $fetch_courses["text"]; ?>" class="img-cover">
                    </figure>

                    <div class="abs-badge">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                        <span class="span"><?php echo $fetch_courses["time"]; ?></span>
                    </div>

                    <div class="card-content">
                        <span class="badge"><?php echo $fetch_courses["cat"]; ?></span>
                        <h3 class="h3">
                            <a href="#" class="card-title"><?php echo $fetch_courses["text"]; ?></a>
                            <a href="<?php echo $fetch_courses["URL"]; ?>"class="card-titl" target="_blank">URL:<?php echo $fetch_courses["URL"]; ?></a>
                        </h3>
                    </div>
                </div>
            </li>
            <?php
                }
            } else {
                echo '<li>No free courses available.</li>';
            }
            ?>
        </ul>

        </div>
</section>
</body>
</html>