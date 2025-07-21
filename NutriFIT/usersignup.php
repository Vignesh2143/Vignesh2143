<!DOCTYPE html>
<html>
    <head>
        <title>User Sign Up</title>
        <link rel="stylesheet" href="userdesign.css" type="text/css">
        <script src="https://kit.fontawesome.com/7efab35d72.js" crossorigin="anonymous"></script>
    </head>
    
   <body>
    
      <div class="container">
        
          <div class="forms-container">
            <div class="img">
              <img src="img/joyride_green.svg">
            </div>
            <div class="signup">
            
              <h2 class="title">Sign Up</h2>
              <form action="register.php" class="sign-up-form" method="POST">
            <div class="input-field">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="firstname" placeholder="Enter your first name" ></div>
            <div class="input-field">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="lastname" placeholder="Enter your last name" > </div>
            <div class="input-field">
              <i class="fa-solid fa-user"></i>
            <input type="text" name="username" placeholder="Enter your username" > </div>
            <div class="input-field">
              <i class="fa-solid fa-envelope"></i>
            <input type="text" name="email" placeholder="Enter your email address" ></div>
            <div class="input-field">
              <i class="fa-solid fa-phone"></i>
            <input type="text" name="phonenumber" placeholder="Enter your phone number" pattern="[0-9]{10}" > </div>
            <div class="input-field">
              <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Enter your password" > </div>
          
            
            <button type="submit" name="submit"> Sign Up </button><br><br>
            <p> 
                Already have an account? <a href="usersignin.php">Sign in</a>
            </p>
          </form>
          
          </div>
          </div>
       

      </div>  
   
   </body>
</html>