<?php

require_once "config.php";
$uname = $_GET['uname'];

     $query = "SELECT * FROM form5";

     $result = mysqli_query($db, $query);

     $subject = [];

     $subjectname = [];


     if(mysqli_num_rows($result) > 0){
          $rows = mysqli_fetch_array($result);
          for($i=0; $i<mysqli_num_rows($result); $i++){

               $subject[$i] = $rows["notes"];
               $subjectname[$i] = strtolower($rows["subjectname"]);

          }
     }

     $uname = $_GET['uname'];
     $rank = 0;
 
     $query = "SELECT * FROM students";
     $query2 = "SELECT * FROM admin";
 
     $result = mysqli_query($db, $query);
     $result2 = mysqli_query($db, $query2);
 
     if ($result) {
         for($i=0; $i<mysqli_num_rows($result); $i++){
             $row = mysqli_fetch_array($result);
 
             if($row['userkey'] === $uname){
                 $dp = $row['photo'];
             } 
         }
     }
     if($result2){
         for($i=0; $i<mysqli_num_rows($result2); $i++){
             $row = mysqli_fetch_array($result2);
 
             if($row['userkey'] === $uname){
                 $dp = $row['photo'];
                 $rank = $row['rank'];
             }
         }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 5 | Notes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="bio.css">
    <link rel="stylesheet" href="subjects.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
</head>
<body>
<nav class="navigation">
        <div class="pics">
            <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
            <?php 
                if($rank == 0){
                    echo "<li><a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";
                }
                else{
                    echo "<li><a href='account-admin.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";
                }        
            ?>
        </div>
        <div class="menu">
            <span id="srss"><b>Shaaban Robert Sec School</b></span>
            <div class="horizontal_menu">
                <ul type="none">
                    <li><?php echo "<a href='home.php?uname=$uname' class=home>Home</a></li>";?>
                    <li><?php echo "<a href='news.php?uname=$uname' class=news>News</a></li>";?>
                    <li><?php echo "<a href='notes.php?uname=$uname' class=notes>Notes</a></li>";?>
                    <li><?php echo "<a href='check3.php?uname=$uname'>Assign</a>";?> </li>
                    <li class="multi_menu"><a>login</a></li>
                    <li>
                        <?php 
                            if($rank == 0){
                                echo "<li><a href='account.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";
                            }
                            else{
                                echo "<li><a href='account-admin.php?uname=$uname' class='dp'><img src='$dp' class='dp'></a></li>";
                            }        
                        ?>
                    </li>
                </ul>
            </div>
            <div class="vertical_menu">
                <button><b>MENU</b></p></button>
            </div>
        </div>
        <div class="dropdown_menu">
            <ul type="none">
                <li><?php echo "<a href='home.php?uname=$uname' class=home>Home</a></li>";?>
                <li><?php echo "<a href='news.php?uname=$uname' class=news>News</a></li>";?>
                <li><?php echo "<a href='notes.php?uname=$uname' class=notes>Notes</a></li>";?>
                <li><?php echo "<a href='check3.php?uname=$uname'>Assign</a>";?> </li>
                <li><a href="index.php">Student</a></li>
                <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
        </div>
    </nav>
    <div class="sub_menu">
        <ul>
            <li><?php echo "<a href='leaders.php?uname=$uname'>Admin</a></li>";?>
            <li><a href="index.php"><b>Student</b></a></li>
        </ul>
    </div>
      <script>
          let menubtn = document.querySelector('.vertical_menu');
          let dropdownlist = document.querySelector('.dropdown_menu');
          let multimenu = document.querySelector('.multi_menu');
          let submenu = document.querySelector('.sub_menu');
  
          menubtn.onclick = function(){
              dropdownlist.classList.toggle('open');
          }
  
          multimenu.onclick = function(){
              submenu.classList.toggle('open');
          }
      </script>
        <div class="body">
          <div class="classes">
               <div class="row">
                    <?php
                         for($i=0; $i<sizeof($subject); $i++){

                              echo "<div class='$subjectname[$i]'>
                                        <a href='media/documents/$subject[$i]' target='_blank' id='subject'>$subjectname[$i]</a>'
                                   </div>";
                                   
                         }
                    ?>
               </div>
          </div>
          <div class="footer">
               <p>
                   For any inquiry and suggestions about this website, please leave your comment below:
               </p><br>
               <form action="https://formspree.io/f/mwkgkgbv" method="POST" name="myForm">
                   <fieldset>
                       <label><b>Name:</b></label>&nbsp; <input type="text" name="name" id="fname"><br><br>
                       <label><b>Email:</b></label>&nbsp; <input type="text" name="email" id="email"><br><br>
                       <label><b>Suggestions:</b></label><br><br>
                       <textarea name="suggestions" cols="15" rows="5" maxlength="500"></textarea><br><br>
                       <button><b>Send</b></button>
                   </fieldset>
               </form><br><br>
               <p class="foot"><b>&copy; Shaaban Robert Secondary School 2023.</b></p>
           </div>
           <?php
        echo "
            <div class='bottom'>
                <div class='bottom-home'>
                    <a href='home.php?uname=$uname' class='home'>
                            <img src='media/icons/home.png' class='icon'>
                    </a>
                </div>
                <div class='bottom-nav'>
                    <ul type='none'>
                            <li>
                                <a href='news.php?uname=$uname' class='buttons'>
                                    <img src='media/icons/news.png' class='icon'>  
                                    <p>News</p>
                                </a>
                            </li>
                            <li>
                                <a href='notes.php?uname=$uname' class='buttons' id='left'>
                                    <img src='media/icons/notes.png' class='icon'>  
                                    <p>Notes</p>
                                </a>
                            </li>
                            <li>
                                <a href='check3.php?uname=$uname' class='buttons' id='right'>
                                    <img src='media/icons/assignment.png' class='icon'>  
                                    <p>Assignments</p>
                                </a>
                            </li>
                            <li>
                                <a href='user.php?uname=$uname' class='buttons'>
                                    <img src='media/icons/user.png' class='icon'>  
                                    <p>Login</p>
                                </a>
                            </li>
                    </ul>
                </div>
            </div>";
    ?>
   </body>
   </html>