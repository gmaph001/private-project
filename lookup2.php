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
               if(isset($_POST['login'])){
                    $username = $_POST['uname'];
                    $email = $_POST['email'];
                    $password = $_POST['pass'];

                    require_once "config.php";

                    $query = "SELECT * FROM students";
                    $query2 = "SELECT * FROM admin";
                    $query3 = "SELECT * FROM prefects";

                    $result = mysqli_query($db, $query);
                    $result2 = mysqli_query($db, $query2);
                    $result3 = mysqli_query($db, $query3);

                    $valid = true;
                    $uvalid = true;
                    $evalid = true;
                    $pvalid = true;

                    $size = 0;

                    $user[$size] = [];
                    $address[$size] = [];
                    $pass[$size] = [];

                    $date = date_default_timezone_set('Africa/Nairobi');
                    $default = 21000000000;
                    if($date){
                         $today = Date("Y-m-d");
                    }

                    if($result){
                         for($i=0; $i<mysqli_num_rows($result); $i++){
                              $row = mysqli_fetch_array($result);

                              $user[$size] = $row['username'];
                              $address[$size] = $row['email'];
                              $pass[$size] = $row['password'];

                              $size++;

                              if($username === $row['username']){
                                   if($email === $row['email']){
                                        if($password === $row['password']){
                                            $userkey = $row['userkey'];
                                            header("location:home.php?uname=$userkey");
                                        }
                                        else{
                                             $pvalid = false;
                                        }
                                   }
                                   else{
                                        $evalid = false;
                                   }
                              }
                              else{
                                   $uvalid = false;
                              }
                         }
                    }
                    if($result2){
                         for($i=0; $i<mysqli_num_rows($result2); $i++){
                              $row = mysqli_fetch_array($result2);

                              $user[$size] = $row['username'];
                              $address[$size] = $row['email'];
                              $pass[$size] = $row['password'];

                              $size++;

                              if($username === $row['username']){
                                   if($email === $row['email']){
                                        if($password === $row['password']){
                                             $userkey = $row['userkey'];
                                             if($row['codename'] === "PRF"){
                                                $userkey = $row['userkey'];
                                                header("location:home.php?uname=$userkey");
                                             }
                                             header("location:home.php?uname=$userkey");
                                        }
                                        else{
                                             $pvalid = false;
                                        }
                                   }
                                   else{
                                        $evalid = false;
                                   }
                              }
                              else{
                                   $uvalid = false;
                              }
                         }
                    }
                    
               }

               for($i=0; $i<$size; $i++){
                    if($username === $user[$i]){
                         $valid = true;
                         break;
                    }
                    else{
                         if($email === $address[$i]){
                              $valid = true;
                              break;
                         }
                         else{
                              if($password === $pass[$i]){
                                   $valid = true;
                                   break;
                              }
                              else{
                                   $valid = false;
                              }
                         }
                    }
               }

               if(!$pvalid){
                    echo "<p>Invalid password!</p>";
               }
               else{
                    if(!$evalid){
                         echo "<p>Invalid email!</p>";
                    }
                    else{
                         if(!$uvalid){
                              if(!$valid){
                                   echo "<p>User not found!</p>";
                              }
                              else{
                                   echo "<p>Invalid username!</p>";
                              }
                         }
                    }
               }
          ?>
     </div>
</body>
</html>     