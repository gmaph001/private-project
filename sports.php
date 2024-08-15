<?php

require_once "config.php";
$uname = $_GET['uname'];

    $query = "SELECT * FROM news";

    $result = mysqli_query($db, $query);

    $empty;
    $full = 0;


    $uname = $_GET['uname'];
    $rank = 0;
 
    $query2 = "SELECT * FROM students";
    $query3 = "SELECT * FROM admin";
 
    $result2 = mysqli_query($db, $query2);
    $result3 = mysqli_query($db, $query3);
 
    if ($result2) {
        for($i=0; $i<mysqli_num_rows($result2); $i++){
            $row = mysqli_fetch_array($result2);
 
            if($row['userkey'] === $uname){
                $dp = $row['photo'];
            } 
        }
    }
    if($result3){
        for($i=0; $i<mysqli_num_rows($result3); $i++){
            $row = mysqli_fetch_array($result3);
 
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
    <title>SRSS | News-Sports</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="sports.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
        <div class="heading">
          <div class="heading-wrd">
               <p>Sports!!!</p>
          </div>
        </div>
        <div class="body">
            <div class="announcements">
                <div class="announcement01">
                    <img src="media/images/sports.jpg" class="pic1">
                </div>
                <div class="announcement-wrd01">
                    <?php
                        if($result){        
                            for($i = 0; $i<mysqli_num_rows($result); $i++){
                                $row = mysqli_fetch_array($result);
                                if($full<100){
                                    $full++;
                    
                                    if($row['news_class'] === "sports"){
                                        $news = $row['news_main'];
                                        $date = $row['news_date'];
                                        echo 
                                            "
                                            <p>
                                                <b>
                                                    $news
                                                </b>
                                            </p>
                                            <p class='date'>
                                                <b>
                                                    ($date)
                                                </b>
                                            </p><br><br>
                                            ";
                                    }
                                }
                                else{
                                    break;
                                }
                            }
                        }
                        else{
                            $news = "There is no any new announcement in this category!";
                            echo 
                                "
                                <p>
                                    <b>
                                        $news
                                    </b>
                                </p>
                                ";
                        }
                    ?>
               </div>
            </div>
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