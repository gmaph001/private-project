<?php
     require_once "config.php";

     $uname = $_GET['uname'];

     $query = "SELECT * FROM students";

     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($row['username'] === $uname){
                    $firstname = $row['firstname'];
                    $secondname = $row['secondname'];
                    $lastname = $row['lastname'];
                    $age = $row['age'];
                    $class = $row['form'];
                    $stream = $row['stream'];
                    $photo = $row['photo'];
               }
          }
     }
     else{
          echo "Error while connecting to database!";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | My Account</title>
    <link rel="stylesheet" href="account.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
     <nav class="navigation">
          <div class="title">
               <div class="menubtn"><img src="media/images/icons/menu.png" class="menu" id="menu"></div>
               <span id="heading"><b>Shaaban Robert Secondary School</b></span>
          </div>
          <img src="media/images/srss-og.png" class="logo">
     </nav>
     <div class="body">
          <div class="sidebar">
               <ul type="none">
                    <?php
                         echo 
                              "<li><a href='account.php?uname=$uname'>My Profile</a></li>
                              <li><a href='security.php?uname=$uname'>Privacy & Security</a></li>
                              <li><b><a href='home.php?uname=$uname'>Go back</a></b></li>";
                    ?>
               </ul>
          </div>
          <div class="main">
               <?php
                    echo
                         "<form action='update.php?uname=$uname' method='POST' name='update' class='update' enctype='multipart/form-data'>
                         <fieldset>
                         <legend><b>My Profile</b></legend> 
                                   <label><b>First Name: </b></label> $firstname <input type='text' name='firstname' placeholder='change'><br><br>
                                   <label><b>Second Name: </b></label> $secondname <input type='text' name='secondname' placeholder='change'><br><br>
                                   <label><b>Last Name: </b></label> $lastname <input type='text' name='lastname' placeholder='change'><br><br>
                                   <label><b>Age: </b></label> $age <input type='number' name='age' placeholder='change'><br><br>
                                   <label><b>Class: </b></label> $class <input type='number' name='class' placeholder='change'><br><br>
                                   <label><b>Stream: </b></label> $stream <input type='text' name='stream' placeholder='change'><br><br>";
               ?>
                         <button onclick="save()" class="save" name="save">Save</button> 
                    </fieldset>
               </form>
          </div>
          <div class="profile">
               <?php
                    echo
                         "<form action='update_photo.php?uname=$uname' method='POST' name='update' class='update' enctype='multipart/form-data'>
                              <img src='$photo' class='photo' width='200px' height='250px'><br><br>
                              <label><b>Upload your photo: </b></label><input type='file' name='photo'><br><br>
                              <button onclick='savephoto()' class='save' name='savephoto'>Save</button>                                          
                         </form>";
                         
               ?>
          </div>
     </div>
     <div class="footer">
          <p>&copy; Shaaban Robert Secondary School 2023.</p>
     </div>
     <script src="account.js"></script>
</body>
</html>