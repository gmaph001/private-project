<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login-page</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="index.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="main">
          <div class="title"></div><br><br>
          <div class="body">
               <div class="form">
                    <form name='form' action='lookup2.php' method='POST' enctype='multipart/form-data'>
                         <div class="input">
                              <input type="text" name="uname" id="fname" placeholder="Username">
                              <img src="media/icons/profile.png" class="icon">
                         </div>
                         <p id="result1" class="alert"></p><br>
                         <div class="input">
                              <input type="email" name="email" id="email" placeholder="Email">
                              <img src="media/icons/email.png" class="icon">
                         </div>
                         <p id="result2" class="alert"></p><br>
                         <div class="input">
                              <input type="password" name="pass" id="pword" placeholder="Password">
                              <img src="media/icons/hidden.png" class="icon pass">
                         </div>
                         <p id="result3" class="alert"></p><br>
                         <button class="sendbtn" onclick="tuma()" name="login">Login</button>
                    </form>
               </div>
               <div class="links">
                    <a href="signUp-page.html" target="_blank" class="forget">Sign Up</a>
                    <a href="forget.html" target="_blank" class="forget">Forget Password?</a>
               </div><br>
               <p class="heads-up">
                    <i>
                         "If you are an admin, sign up <a href="admin_signup.html">here</a>"
                    </i>
               </p><br>
          </div>
     </div>
     <script src="form.js"></script>
</body>
</html>