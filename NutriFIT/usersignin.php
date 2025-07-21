<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title>User Sign in</title>
  <link rel="stylesheet" href="userdesign.css" type="text/css">
  <script src="https://kit.fontawesome.com/7efab35d72.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="img">
        <img src="img/walking_green.svg">
      </div>
      <div class="signup">
        <h2 class="title">Sign in</h2>
        <form action="login.php" class="sign-up-form" method="POST">
          <div class="input-field">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" placeholder="Enter your username" required/>
          </div>
          <div class="input-field">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Enter your password" required/>
          </div>
          <button type="submit" name="submit"> Log In </button><br><br>
          <p>Don't have an account? <a href="usersignup.php">Sign up here</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
