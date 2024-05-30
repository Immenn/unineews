<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    *{ padding: 0;
        margin: 0;
    }
    html{
        font-size: 36px;
    }
    body{
      
        color: inherit;
        background: none;
      
    }
    
    nav {
  --full-size: 9rem;
  --item-size: 2rem;
  --rounding: 0.75rem;
  --shadow: 2px 4px 8px 0px rgba(0, 0, 0, 0.4);
  --bg-color: white;
  --fg-color: rgba(0, 0, 0, 0.8);
  --hi-color: #90a4b0;

  --transition: 200ms ease-in-out;
  --transition-slow: 500ms ease-in-out;

  border-radius: var(--rounding);
  width: var(--item-size);

  background: var(--bg-color);
  color: var(--fg-color);

  box-shadow: var(--shadow);

 display: flex;
 flex-direction: column;
 transition: width var(--transition);
  
    }
    nav a {
  display: grid;
  place-content: stretch;
  grid-template-columns: var(--item-size) max-content;
  
  text-decoration: none;
  color: inherit;
}

nav .icon {
  display: grid;
  place-content: center;
  
  font-size: 0.75rem;
  color: #213a5c;
  
  transition: color var(--transition);}

  nav .items{
    display: grid;
    grid-auto-flow: row;
    grid-auto-rows: var(--item-size);
    grid-template-columns: max-content;
    place-content: start;
  }
nav .item{
    clip-path: polygon(0 0,
    var(--item-size) 0,
    var(--item-size) calc(100% + 1rem),0 100%);
    width: var(--full-size);
    border-radius: 0 var(--rounding) var(--rounding)0;
    transition: clip-path var(--transition),box-shadow var(--transition);
}
nav .item:last-child{
    border-radius: 0 var(--rounding) var(--rounding) var(--rounding);
}
nav .label{
    display: grid;
    place-content: center;
    padding-left: 0.5rem;
    padding-right: var(--rounding);
    opacity: 0;
    transition: opacity var(--transition-slow),color var(--transition);
}


nav .item:hover {
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(4px);
  clip-path: polygon(
    0 0,
    calc(100% + 1rem) 0,
    100% calc(100% + 1rem),
    0 100%
  );
  box-shadow: var(--shadow);
}

nav .item:hover .icon {
  color: var(--hi-color);
}

nav .item:hover .label {
  opacity: 1;
}
nav .toggle {
  flex: 0 0 var(--item-size);
  
  display: grid;
  place-content: center;
  
  width: var(--item-size);
  border-radius:
    var(--rounding);
  
  overflow: hidden;
  transition: color var(--transition);
}

nav .toggle:hover {
  color: var(--hi-color);
}

nav .toggle > * {
  position: relative;
  left: calc(-1 * var(--item-size));
  
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: var(--item-size);
  
  transition: left var(--transition);
}

nav.expanded .toggle > div {
  left: 0;
}

nav.expanded {
  width: var(--full-size);
}

nav.expanded .item {
  clip-path: none;
}

nav.expanded .item .label {
  opacity: 1 ;
}

nav.expanded .item:hover {
  color: var(--hi-color);
}
</style>
</head>
<body>
<nav>
  <a href="#" class="toggle">
    <div>
      <div class="icon"><i class="fas fa-times"></i></div>
      <div class="icon"><i class="fas fa-bars"></i></div>
    </div>
  </a>
  <div class="items">
    <a href="index.php" class="item">
      <div class="icon">
        <i class="fas fa-home"></i>
      </div>
      <div class="label">
        Home
      </div>
    </a>
    <a href="news.php" class="item">
      <div class="icon">
        <i class="fas fa-newspaper"></i>
      </div>
      <div class="label">
       News
      </div>
    </a>
    <a href="contact.php" class="item">
      <div class="icon">
        <i class="fas fa-envelope"></i>
      </div>
      <div class="label">
        Contact
      </div>
    </a>
    <a href="logout.php" class="item">
      <div class="icon">
        <i class="fa-solid fa-right-from-bracket"></i>
      </div>
      <div class="label">
        Logout
      </div>
    </a>
  </div>
</nav>
<script>
const toggle = document.querySelector('nav .toggle');
toggle.addEventListener('click', (e) => {
  e.currentTarget.parentElement.classList.toggle('expanded');
});
</script>
</body>
</html>