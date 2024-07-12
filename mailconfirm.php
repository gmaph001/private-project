<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <div class="register">
          <?php

               require_once "config.php";

               $uname = $_GET['uname'];
               $otp = $_POST['otp'];

               $query = "SELECT * FROM admin";
               $query2 = "SELECT * FROM students";

               $result = mysqli_query($db, $query);
               $result2 = mysqli_query($db, $query2);

               if($result){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_array($result);

                         if($uname === $row['userkey']){
                              if($otp === $row['OTP']){
                                   header("location: resetpass.php?uname=$uname");
                                   echo "You can now reset your password!";
                              }
                              else{
                                   echo "<p>Invalid OTP</p><br>";
                                   echo "<p>Please <a href='mail.php?uname=$uname'>try again!</a></p>";

                              }
                         }
                    }
               }
               else{
                    echo "Error";
               }
          ?>
     </div>
</body>
</html>