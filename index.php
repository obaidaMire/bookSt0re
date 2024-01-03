<?php
include('config.php');

// to fetch books 
$stmt = $con->prepare("SELECT * FROM books");
$stmt->execute();
$books = $stmt->fetchall();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>home page</title>
  </head>
  <body>
    <div class="name">
      obaida_201007 // Mustafa_147759 // salma_144642 // remaz_128817
    </div>
    <div class="img">
      <div class="header">
        <div class="container">
          <a href="" class="logo">PureBooks</a>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#books">Books</a></li>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="wishlist.php">wishList</a></li>
            <?php } ?>
            <li><a href="#search">search</a></li>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="signout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="landing">
        <div class="text">
          <div class="content">
            <h1>Welcome to PureBooks</h1>
            <p>
              Explore a curated collection of books that transport you to new
              worlds and spark your imagination. Happy reading!
            </p>
            <?php if(!(isset($_COOKIE['user']))) { ?>
            <a href="signin.php"><button>Sign in!</button></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="features" id="features">
      <p>OUR FEATUERS!</p>
      <h2>What you'll achieve by this store</h2>
      <div class="divider"></div>
      <div class="container">
        <div class="features-img">
          <div class="img-shadow"></div>
          <img class="fe-img" src="images/lan-img.jpg" alt="" />
        </div>
        <div class="featuers-cards">
          <div class="card">
            <div class="card-img">
              <i class="fa-solid fa-book-atlas"></i>
            </div>
            <div class="card-title">
              <h3>Experience</h3>
            </div>
            <div class="card-p">
              Explore diverse worlds, emotions, and perspectives, enriching your
              life through immersive literary journeys.
            </div>
          </div>
          <div class="card">
            <div class="card-img">
              <i class="fa-solid fa-dice"></i>
            </div>
            <div class="card-title">
              <h3>Motivation</h3>
            </div>
            <div class="card-p">
              Discover inspiration within our pages, fueling your drive for
              personal growth and success.
            </div>
          </div>
          <div class="card">
            <div class="card-img">
              <i class="fa-solid fa-calendar-days"></i>
            </div>
            <div class="card-title">
              <h3>Goals</h3>
            </div>
            <div class="card-p">
              Chart your path to success with insights and strategies from
              carefully curated books.
            </div>
          </div>
          <div class="card">
            <div class="card-img">
              <i class="fa-solid fa-bullseye"></i>
            </div>
            <div class="card-title">
              <h3>Vision</h3>
            </div>
            <div class="card-p">
              Transform your aspirations into reality, guided by the wisdom of
              visionaries within our collection.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- start books-landing  -->
    <div class="books-landing" id="books">
      <p class="title">OUR BOOKS!</p>
      <h2>What you'll read in this store</h2>
      <div class="divider"></div>
              <div class="search-box">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" class="search" id="search" placeholder="Search books, authors" autocomplete="off">
              </div>
      <div class="container" id="container1" >
        <?php foreach($books as $book) {?>
        <a href="description.php?id=<?php echo $book['id'] ?>">
          <div class="box">
            <img src="<?php echo $book['image'] ?>" alt="" />
            <div class="back">
              <p><?php echo $book['Author'] ?></p>
              <p><?php echo $book['price'] ?></p>
              <p>click for more details</p>
            </div>
          </div>
        </a>
        <?php } ?>
      </div>
      <div class="container" id="container2"></div>
    </div>
    <div class="footer" id="footer">
      <div class="container">
        <div class="logo">PureBooks</div>
        <div class="links">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#books">Books</a></li>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="wishlist.php">Wishlist</a></li>
            <?php } ?>
            <?php if(!(isset($_COOKIE['user']))) { ?>
            <li><a href="signup.php">Sign up</a></li>
            <?php } ?>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="signout.php">Sign out</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="socials">
          <a href="">
            <i class="fa-brands fa-telegram"></i>
          </a>
          <a href="">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
          <a href="">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </div>
      </div>
      <div class="copy">
        &copy; 2024 <span>PureBooks</span> All Rights Reserved
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/liveSearch.js"></script>
  </body>
</html>
