<?php 
include('config.php');
$do = '';
$do = (isset($_GET['do']))? $_GET['do'] : 0;
if ($do == "userInsert") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $stmt = $con->prepare('INSERT INTO users (username,email,password,password2) VALUE (?,?,?,?)');
    $stmt->execute([$username,$email,$password,$password2]);
    $count = $stmt->rowcount();
    if ($count > 0) {
        setcookie("user",$username,strtotime("+1 year"));
        header("location:index.php");
        exit();
    }else {
        echo "error";
    }
} elseif($do == "checkUser") {
    $username = $_POST['username'];
    $stmt = $con->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $count = $stmt->rowcount();
    if ($count > 0) {
        echo "exist";
    }else {
        echo "error";
    }
} elseif($do == "descriptionInsert") {
    $image = $_GET['img'];
    $name = $_GET['name'];
    $description = $_GET['des'];
    $price = $_GET['price'];
    $userid = $_GET['id'];
    $stmt = $con->prepare('INSERT INTO wishlist (image,name,description,price,userid) VALUE (?,?,?,?,?)');
    $stmt->execute([$image,$name,$description,$price,$userid]);
    $count = $stmt->rowcount();
    if ($count > 0) {
        header("location:wishlist.php");
        exit();
    }else {
        echo "error";
    }
} elseif($do == "deleteWish") {
    $id = $_GET['id'];
    $stmt = $con->prepare('DELETE FROM wishlist where id = ?');
    $stmt->execute([$id]);
    $count = $stmt->rowcount();
    if ($count > 0) {
        header("location:wishlist.php");
        exit();
    }else {
        echo "error";
    }
} elseif($do == "search") {
    $word = filter_var($_POST['word'],FILTER_SANITIZE_STRING);
    $stmt = $con->prepare("SELECT * FROM books WHERE name LIKE '%$word%' OR description LIKE '%$word%' OR Author LIKE '%$word%'");
    $stmt->execute();
    $books = $stmt->fetchall();
    $row = $stmt->rowCount();
    if ($row > 0) {
    foreach($books as $book) {?>
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
        <?php }
    }else { ?>
    <h2 style="position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 25px;
    font-family: monospace;">No Books Found</h2>
    <?php }
}else {
    header("location:index.php");
    exit();
}



?>