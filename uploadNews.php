<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload Notes</title>
     <link rel="stylesheet" type="text/css" href="login-page.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="title"></div><br><br>
          <div class="registration-success">
               <?php
                    require_once "config.php";
                    if(isset($_POST['upload'])){

                         $announcer_name = $_POST['announcer_name'];
                         $announcer_rank = $_POST['announcer_rank'];
                         $news_class = $_POST['news_class'];
                         $news = $_POST['news'];
                         $news_date = $_POST['date'];
                         $update = $_POST['update'];

                         $query = "INSERT INTO news(announcer_rank, announcer_name, news_class, news_main, news_date, news_updates) VALUES('$announcer_rank', '$announcer_name', '$news_class', '$news', '$news_date', '$update')";
                                  
                         $result = mysqli_query($db, $query);

                         if($result){
                              require_once "config.php";
                              $uname = $_GET['uname'];
                              echo "<p>Upload Successful</p>";
                              echo "<p>You can now continue as normal user!</p>";
                              echo "<p><a href='home.php?uname=$uname'>User</a></p><br>";
                         }
                         else{

                              echo "<p>Upload Failed</p><br>";
                              echo "<p><a href='upload_news.php?uname=$uname'>Go back</a></p><br>";
                         }
                    }
               ?>
          </div>
     </div>
</body>
</html>