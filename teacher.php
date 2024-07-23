<?php

     $uname = $_GET['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | Admin</title>
     <link rel="stylesheet" type="text/css" href="upload.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body> 
        <div class="main">
            <div class="form">
                <div class="title"></div><br><br>
                <?php echo "<form action='teadetails.php?uname=$uname' method='POST' name='admin' enctype='multipart/form-data'>";?>
                <fieldset>
                              <legend><b>Teacher's Subjects</b></legend>
                              <label><b>Category: </b></label> 
                              <select class="list" name="category">
                                   <option value="">Choose Your category</option>
                                   <option value="science">SCIENCE</option>
                                   <option value="art">ARTS AND LANGUAGE</option>
                                   <option value="business">BUSINESS</option>
                              </select><br>
                              <p id="result1"></p><br>
                              <label class="stream" onclick="subjects()" id="strm"><b>Choose Subjects: </b></label><br><br>
                              <div class="subjects">
                                   <div class="science">
                                        <label>MATHEMATICS</label><input type="checkbox" id="1" name="sub1" value="mathematics" class="subject">
                                        <label>PHYSICS</label><input type="checkbox" id="2" name="sub2" value="physics" class="subject">
                                        <label>CHEMISTRY</label><input type="checkbox" id="3" name="sub3" value="chemistry" class="subject">
                                        <label>BIOLOGY</label><input type="checkbox" id="4" name="sub4" value="biology" class="subject">
                                        <label>COMPUTER</label><input type="checkbox" id="5" name="sub5" value="computer" class="subject">
                                   </div>
                                   <div class="art">
                                        <label>HISTORY</label><input type="checkbox" id="1" name="sub1" value="history" class="subject">
                                        <label>GEOGRAPHY</label><input type="checkbox" id="2" name="sub2" value="geography" class="subject">
                                        <label>CIVICS</label><input type="checkbox" id="3" name="sub3" value="civics" class="subject">
                                        <label>KISWAHILI</label><input type="checkbox" id="4" name="sub4" value="kiswahili" class="subject">
                                        <label>ENGLISH</label><input type="checkbox" id="5" name="sub5" value="english" class="subject">
                                   </div>
                                   <div class="business">
                                        <label>ECONOMICS</label><input type="checkbox" id="1" name="sub1" value="economics" class="subject">
                                        <label>ACCOUNTS</label><input type="checkbox" id="2" name="sub2" value="accounts" class="subject">
                                        <label>COMMERCE</label><input type="checkbox" id="3" name="sub3" value="commerce" class="subject">
                                   </div>
                              </div>
                              <p id="result2"></p><br>
                        </fieldset><br><br>
                        <button onclick="send()" name="signup" id="signUp">Login</button>
                </form>
            </div>
            <div class="photo2">
                
            </div>
        </div>
     <script>
          let result1 = "*Please choose your category!*";
          let result2 = "*Please choose any subject!*";
          let science = document.querySelector('.science');
          let art = document.querySelector('.art')
          let business = document.querySelector('.business');
          let subject = true;
          let subj = false;

          function subjects(){
               if(document.admin.category.value === "science"){
                    science.classList.toggle('open');
               }
               if(document.admin.category.value === "art"){
                    art.classList.toggle('open');
               }
               if(document.admin.category.value === "business"){
                    business.classList.toggle('open');
               }
               if(document.admin.category.value == ""){
                    document.getElementById("result1").innerHTML = result1;
               }

               subj = true
          }

          function send(){

               if(document.admin.category.value == ""){
                    document.getElementById("result1").innerHTML = result1;
                    event.preventDefault();
               }

               if(!subj){
                    document.getElementById("result2").innerHTML = result2;
                    event.preventDefault();
               }
          }
     </script>
</body>
</html>