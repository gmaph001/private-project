<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | PHP</title>
     <link rel="stylesheet" type="text/css" href="register.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
     <div class="register">
          <?php

               require_once "config.php";

               $uname = $_GET['uname'];

               $query = "SELECT * FROM students";
               $query2 = "SELECT * FROM admin";

               $result = mysqli_query($db, $query);
               $result2 = mysqli_query($db, $query2);

               if($result){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                         $row = mysqli_fetch_array($result);
                         if($row['userkey'] === $uname){
                              $password = $row['password'];
                              $validation = 1;
                         }
                    }
               }
               if($result2){
                    for($i=0; $i<mysqli_num_rows($result2); $i++){
                         $row = mysqli_fetch_array($result2);
                         if($row['userkey'] === $uname){
                              $password = $row['password'];
                              $validation = 0;
                         }
                    }
               }
               if(isset($_POST['send'])){
                    $oldpassword = $_POST['oldpassword'];
                    $newpassword = $_POST['newpassword'];
               
                    if($oldpassword !== $password){
                         echo "<p>Not authorized due to incorrect old password!</p>";
                    }
                    else{
                         if($validation == 1){
                              $query3 = "UPDATE students SET password = '$newpassword' WHERE userkey = '$uname'";
                         
                              $result3 = mysqli_query($db, $query3);
                         
                              if($result3){
                                   echo "<p>Password updated successfully!</p><br><br>";
                                   echo "<p>You can <a href='security.php?uname=$uname'><b>Continue</b></a></p>";
                              }
                              else{
                                   echo "<p>Error while updating password!</p><br><br>";
                                   echo "<p>You can <a href='security.php?uname=$uname'><b>Go back</b></a></p>";

                              }
                         }
                         else{
                              $query3 = "UPDATE admin SET password = '$newpassword' WHERE userkey = '$uname'";
                         
                              $result3 = mysqli_query($db, $query3);
                         
                              if($result3){
                                   echo "<p>Password updated successfully!</p><br><br>";
                                   echo "<p>You can <a href='security.php?uname=$uname'><b>Continue</b></a></p>";
                              }
                              else{
                                   echo "<p>Error while updating password!</p><br><br>";
                                   echo "<p>You can <a href='security.php?uname=$uname'><b>Go back</b></a></p>";

                              }
                         }
                    }
               }

          ?>
     </div>
</body>
</html>
