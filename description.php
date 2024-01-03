<?php
if(isset($_GET['id'])) {
include('config.php');
$id = $_GET['id'];
// to fetch books 

$stmt = $con->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch();
if (empty($book)) {
  header("location:index.php");
  exit();
}
// to fetch userid 
if(isset($_COOKIE['user'])) {
$stmt2 = $con->prepare('SELECT id FROM users WHERE username = ?');
$stmt2->execute([$_COOKIE['user']]);
$userid = $stmt2->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/description.css" />
    <link rel="stylesheet" href="css/all.min.css" />
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
    <title>description</title>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <a href="" class="logo">PureBooks</a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#books">Books</a></li>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="wishlist.php">wishList</a></li>
            <?php } ?>
            <li><a href="index.php#search">search</a></li>
            <?php if(isset($_COOKIE['user'])) { ?>
            <li><a href="signout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            <?php } ?>
          </ul>
      </div>
    </div>
		<div class="des">
			<div class="container">
				<div class="box">
					<img src="<?php echo $book['image'] ?>" alt="">
					<div class="info">
						<p><span>name: </span><?php echo $book['name'] ?></p>
						<p><span>description: </span><?php echo $book['description'] ?></p>
						<p><span>Author: </span><?php echo $book['Author'] ?></p>
						<p><span>price: </span><?php echo $book['price'] ?></p>
						<p><span>language: </span>English</p>
            <?php if(isset($_COOKIE['user'])) { ?>
						<a href="control.php?do=descriptionInsert&img=<?php echo $book['image'] ?>&name=<?php echo $book['name'] ?>&des=<?php echo $book['description'] ?>&price=<?php echo $book['price'] ?>&id=<?php echo $userid['id']; ?>">Add to wishlist <i class="fa-regular fa-heart"></i></a>
            <?php }else { ?>
						<a href="signin.php">Log in before adding</a>
            <?php } ?>
					</div>
				</div>
			</div>
		</div>
  </body>
</html>
<?php }else {
  header("location:index.php");
  exit();
} ?>
