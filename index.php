<?php
include('config.php');
$sql1 = "SELECT * FROM news";
$result1 = $con->query($sql1);

$sql2 = "SELECT * FROM courses";
$result2 = $con->query($sql2);

if(isset($_GET['search'])){
  $filtervalues = $_GET['search'];
  header("Location: search.php?search=$filtervalues");
  exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>UniNews</title>
  <meta name="title" content="UniNews">
  <meta name="description" content="">

  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="icon" href="./assets/images/uniuni.jpg">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-shape-1.svg">
  <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->
<?php
include('header1.php');
?>

  <main>
    <article>

      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url('./assets/images/hero-bg.svg')">
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 section-title">
              Your Premier Source<span class="span">for University</span> Updates and Educational Resources
            </h1>

            <p class="hero-text">
             
Welcome to UniNews! Our website is your prime source for the latest university news and educational updates. Stay tuned ! 📰🎓
            </p>
            <a href="singup.php" class="btn has-before">
              <span class="span">Signup</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

            <div class="img-holder one" style="--width: 270; --height: 300;">
              <img src="./assets/images/uniuni.jpg" width="270" height="300" alt="hero banner" class="img-cover">
            </div>

            <div class="img-holder two" style="--width: 240; --height: 370;">
              <img src="./assets/images/oo.jpg" width="240" height="370" alt="hero banner" class="img-cover">
            </div>

          </figure>

        </div>
      </section>
      <section class="section News" id="news" aria-label="news">
      <div class="container">
        <p class="section-subtitle"> News</p>
    
        <ul class="grid-list">
                <?php
$newslimit = 4;
                if ($result1->num_rows > 0) {
                  $counter = 0;
                    while($row = $result1->fetch_assoc()) {
                      if( $counter < $newslimit ){
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
                    $counter++;}
                } else {
                    echo "No record found";
                }
                ?>
            </ul>
  
      </section>

      <!-- 
        - #COURSE
      -->
      <section class="section course" id="courses" aria-label="course">
    <div class="container">

        <p class="section-subtitle">Free Courses</p>
        <h2 class="h2 section-title">Benefit from Free Educational Offerings</h2>

        <ul class="grid-list">
            <?php
            $select_courses = mysqli_query($con, "SELECT * FROM `courses`LIMIT 3  ") or die('query failed');
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
                        </h3>
                        <a href="<?php echo $fetch_courses["URL"]; ?>"class="card-titl" target="_blank">URL:<?php echo $fetch_courses["URL"]; ?></a>

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

        <a href="freecourses.php" class="btn has-before">
            <span class="span">Browse more courses</span>
            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </a>

    </div>
</section>

      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">

            <div class="img-holder" style="--width: 520; --height: 370;">
              <img src="about.jpg" width="520" height="370" loading="lazy" alt="about banner"
                class="img-cover">
            </div>



            <img src="./assets/images/about-shape-3.png" width="722" height="528" loading="lazy" alt=""
              class="shape about-shape-3">

          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">
             
            </h2>

            <p class="section-text1">
              Welcome to UniNews! We aim to provide the latest university news and a variety of free online courses, making learning accessible to all. We value transparency, collaboration, and delivering high-quality content. Feel free to reach out with any inquiries. Thank you for your support!            </p>

          </div>

        </div>
      </section>


  <section class="section blog has-bg-image" id="blog" aria-label="blog"
        style="background-image: url('./assets/images/blog-bg.svg')">
  <div class="container2">
    <div class="slider-wrapper">
      <button id="prev-slide" class="slide-button material-symbols-rounded">
        chevron_left
      </button>
      <ul class="image-list">
      <?php
$select_advr = mysqli_query($con, "SELECT * FROM `advertisement`") or die('query failed');
if(mysqli_num_rows($select_advr) > 0){
    while($fetch_advr = mysqli_fetch_assoc($select_advr)){
?>
<img class="image-item" src="admin/uploaded_img/<?php echo $fetch_advr['photo']; ?>" alt="advertisement" />
<?php
    }
}else{
    echo '<p class="empty">No advertisement added yet!</p>';
}
?>
      </ul>
      <button id="next-slide" class="slide-button material-symbols-rounded">
        chevron_right
      </button>
    </div>
    <div class="slider-scrollbar">
      <div class="scrollbar-track">
        <div class="scrollbar-thumb"></div>
      </div>
    </div>
  </div>
</body>
</html>
<script>const initSlider = () => {
  const imageList = document.querySelector(".slider-wrapper .image-list");
  const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
  const sliderScrollbar = document.querySelector(".container2 .slider-scrollbar");
  const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
  const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
  
  // Handle scrollbar thumb drag
  scrollbarThumb.addEventListener("mousedown", (e) => {
      const startX = e.clientX;
      const thumbPosition = scrollbarThumb.offsetLeft;
      const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
      
      // Update thumb position on mouse move
      const handleMouseMove = (e) => {
          const deltaX = e.clientX - startX;
          const newThumbPosition = thumbPosition + deltaX;

          // Ensure the scrollbar thumb stays within bounds
          const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
          const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
          
          scrollbarThumb.style.left = `${boundedPosition}px`;
          imageList.scrollLeft = scrollPosition;
      }

      // Remove event listeners on mouse up
      const handleMouseUp = () => {
          document.removeEventListener("mousemove", handleMouseMove);
          document.removeEventListener("mouseup", handleMouseUp);
      }

      // Add event listeners for drag interaction
      document.addEventListener("mousemove", handleMouseMove);
      document.addEventListener("mouseup", handleMouseUp);
  });

  // Slide images according to the slide button clicks
  slideButtons.forEach(button => {
      button.addEventListener("click", () => {
          const direction = button.id === "prev-slide" ? -1 : 1;
          const scrollAmount = imageList.clientWidth * direction;
          imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
      });
  });

   // Show or hide slide buttons based on scroll position
  const handleSlideButtons = () => {
      slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
      slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
  }

  // Update scrollbar thumb position based on image scroll
  const updateScrollThumbPosition = () => {
      const scrollPosition = imageList.scrollLeft;
      const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
      scrollbarThumb.style.left = `${thumbPosition}px`;
  }

  // Call these two functions when image list scrolls
  imageList.addEventListener("scroll", () => {
      updateScrollThumbPosition();
      handleSlideButtons();
  });
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);</script>


</section>


  <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>

  <script src="./assets/js/script.js" defer></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <?php
include('footer.php');
?>
</body>

</html>