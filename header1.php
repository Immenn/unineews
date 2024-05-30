<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>    
  <link rel="stylesheet" href="./assets/css/style.css">

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
<body>
  <header class="header" data-header>
    <div class="container">
      <a href="#" class="logo">
        UniNews
      </a>
      <nav class="navbar" data-navbar>
        <div class="wrapper">
          <a href="#" class="logo">
           UniNews
          </a>
          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="news.php" class="navbar-link" data-nav-link>News</a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-link>About</a>
          </li>

          <li class="navbar-item">
            <a href="freecourses.php" class="navbar-link" data-nav-link>Free Courses</a>
          </li>
         <li class="navbar-item">
            <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
          </li>
        </ul>
      </nav>
      <div class="header-actions">     
        
   <form action="" method="GET">
    <input type="search" id="search" name="search" autocomplete="off" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" placeholder="Search here ...">
    <i class="fa fa-search"></i>
</form>
    <style>
      body {
    padding: 0;
    margin: 0;
    height: 100vh;
    width: 100%;
   
}

form{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid white;
    padding: 5px;
}

input{
    position: absolute;
    top: 20px;
    left: 0;
    width: 100%;;
    height: 42.5px;
    line-height: 42.5px;
    outline: 0;
    border: 0;
    display: none;
    font-size: 1.2em;
    border-radius: 20px;
    padding: 0 20px;
}

.fa{
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top:25px;
    right: 0;
    border-radius: 50%;
    color: #a58e74;
    text-align: center;
    font-size: 1.8em;
    transition: all 1s;
}

form:hover{
    width: 300px;
    cursor: pointer;
}

form:hover input{
    display: block;
}

form:hover .fa{
    background: #a58e74;
    color: white;
}

    </style>

        <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
          <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
        </button>

      </div>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>
</body>
</html>