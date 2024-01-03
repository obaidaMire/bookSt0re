<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $con->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
$stmt->execute([$username,$password]);
$count = $stmt->rowcount();
if($count > 0) {
  setcookie('user' , $username , strtotime('+1 year'));
  header("location:index.php");
  exit();
}else {
  $error ='<p
  style= "text-align: center;
  color: red;
  padding-top: 10px;
  font-size: 20px;">
  Username or Password is incorrect
  </p>';
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/signform.css" />
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
    <title>signin</title>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <a href="" class="logo">PureBooks</a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#books">Books</a></li>
        </ul>
      </div>
    </div>
    <div class="form">
      <div class="container">
        <img src="images/signin.png" alt="" />
        <form action="<?php $_SERVER['PHP_SELF']; ?>" id="form" method="POST">
          <h1>Welcome</h1>
          <p class="fill">Please fill the form</p>
          <?php 
          if (isset($error)) {
            echo $error;
          }
          ?>
          <div class="input-box">
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Username"
              value="<?php if(isset($username)) echo $username;?>"
            />
            <i class="fa-solid fa-user"></i>
            <p class="username-er"></p>
          </div>
          <div class="input-box">
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Password"
            />
            <i class="fa-solid fa-lock"></i>
            <p class="pass-er">password</p>
          </div>
          <button type="submit">
            login
          </button>
          <p class="go">
            Don't have an account? <a href="signup.php">Create account !</a>
          </p>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/signin.js"></script>
  </body>
</html>
