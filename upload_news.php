<?php
     $uname = $_GET['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload News</title>
     <link rel="stylesheet" type="text/css" href="login-page.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="form">
               <div class="title"></div><br><br>
               <?php echo "<form action='uploadNews.php?uname=$uname' method='POST' name='upload' class='upload' enctype='multipart/form-data'>";?>
                    <fieldset>
                         <legend><b>Upload notes</b></legend>
                         <label><b>Announcer's name: </b></label> <input type="text" name="announcer_name" id="tname"><br>
                         <p id="result"></p><br>
                         <label><b>Announcer's rank: </b></label> <input type="text" name="announcer_rank" id="sname"><br>
                         <p id="result2"></p><br>
                         <label><b>Class of news: </b></label> 
                         <select name="news_class" class="list">
                              <option value="none">SELECT</option>
                              <option value="academics">ACADEMICS</option>
                              <option value="events">EVENTS</option>
                              <option value="sports">SPORTS</option>
                         </select><br>
                         <p id="result3"></p><br>
                         <label><b>News: </b></label><br>
                         <textarea cols="40" rows="10" name="news"></textarea><br>
                         <p id="result4"></p><br>
                         <label>
                              Is this news an update?
                         </label>&nbsp; &nbsp;
                         <label>Yes</label><input type="radio" name="update" value="important" id="yes" class="radio">&nbsp; &nbsp;
                         <label>No</label><input type="radio" name="update" value="not_important" id="no" class="radio"><br>
                         <p id="result5"></p><br>
                         <label>Date:  </label><input type="date" name="date" id="date" placeholder="date"><br>
                         <p id="result6"></p><br>
                    </fieldset><br><br>
                    <button onclick="send()" name="upload" id="signUp">Upload</button><br><br>
               </form>
          </div>
          <div class="photo3">
               
          </div>
     </div>
     <script>
          let result = "Please insert your name!";
          let result2 = "Please input your rank!";
          let result3 = "Please input the right class!";
          let result4 = "Please input news!";
          let result5 = "Please tell us if it is an update!";
          let result6 = "Please input date!";

          let news_date;

          news_date = Date();

          store_date = document.getElementById("date").value

          date = "";

          for(let i = 0; i<15; i++){
               date += news_date[i];
          }

          store_date = date;

          console.log(store_date)

          function send(){

               if(document.upload.announcer_name.value == ""){
                    document.getElementById("result").innerHTML = result;
                    event.preventDefault();
               }

               if(document.upload.announcer_rank.value == ""){
                    document.getElementById("result2").innerHTML = result2;
                    event.preventDefault();
               }

               if(document.upload.news_class.value == "none"){
                    document.getElementById("result3").innerHTML = result3;
                    event.preventDefault();
               }

               if(document.upload.news.value == ""){
                    document.getElementById("result4").innerHTML = result4;
                    event.preventDefault();
               }
               if(document.upload.update.value == ""){
                    document.getElementById("result5").innerHTML = result5;
                    event.preventDefault();
               }
               if(document.upload.date.value == ""){
                    document.getElementById("result6").innerHTML = result6;
                    event.preventDefault();
               }
               
          }
     </script>
</body>
</html>