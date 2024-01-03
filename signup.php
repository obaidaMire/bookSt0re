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
    <title>signup</title>
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
        <img src="images/signup.png" alt="" />
        <form action="control.php?do=userInsert" id="form" method="POST">
          <h1>Sign Up</h1>
          <p class="fill">Please fill the form</p>
          <div class="input-box">
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Username"
            />
            <i class="fa-solid fa-user"></i>
            <p class="username-er"></p>
          </div>
          <div class="input-box">
            <input type="text" name="email" id="email" placeholder="E-mail" />
            <i class="fa-regular fa-envelope"></i>
            <p class="email-er">email</p>
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
          <div class="input-box">
            <input
              type="password"
              name="password2"
              id="password2"
              placeholder="Confirm Password"
            />
            <i class="fa-solid fa-lock"></i>
            <p class="pass2-er">password 2</p>
          </div>
          <button type="submit">Sign up</button>
          <p class="go">
            Already have an account? <a href="signin.php">Sign-in!</a>
          </p>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/signup.js"></script>
  </body>
</html>
