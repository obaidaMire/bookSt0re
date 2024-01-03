<?php

include('config.php');
if(isset($_COOKIE['user'])) {
    // to fetch userid 
  $stmt2 = $con->prepare('SELECT id FROM users WHERE username = ?');
  $stmt2->execute([$_COOKIE['user']]);
  $userid = $stmt2->fetch();
  // to fetch wishlist
  $stmt = $con->prepare("SELECT * FROM wishlist where userid = ?");
  $stmt->execute([$userid['id']]);
  $wishlist = $stmt->fetchall();
  $row = $stmt->rowcount();
  
  if ($row > 0) {

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/wishlist.css" />
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <!-- google font  -->
    <title>wishlist</title>
  </head>
  <body>
    <div class="header">
        <div class="container">
            <a href="" class="logo">PureBooks</a>
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#books">Books</a></li>
            <li><a href="index.php#search">search</a></li>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="signout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            <?php } ?>
          </ul>
        </div>
    </div>
    <div class="table">
      <h2>Your Wishlist</h2>
      <div class="divider"></div>
      <div class="container">
        <div class="overflow">
        <table>
          <thead>
            <tr>
              <td>image</td>
              <td>Name</td>
              <td>Description</td>
              <td>Price</td>
              <td>Control</td>
            </tr>
          </thead>
          <tbody>
          <?php foreach($wishlist as $wish) { ?>
            <tr>
              <td><img src="<?php echo $wish['image']; ?>" alt=""></td>
              <td><?php echo $wish['name']; ?></td>
              <td><?php echo $wish['description']; ?></td>
              <td><?php echo $wish['price']; ?></td>
              <td><a href="control.php?do=deleteWish&id=<?php echo $wish['id']; ?>"><button>Delete</button></a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  <?php }else { 
    header("refresh:5;url=index.php");
    ?>
    <h2 style="
    color: #f3ad52;
    margin: 30px auto;
    text-align: center;
    font-size: 20px;">
    Your Wishlist is empty,you will redirct to home page after 5s
  </h2>
  <?php } 
}else {
  header("location:index.php");
  exit();
} ?>
  </body>
</html>
