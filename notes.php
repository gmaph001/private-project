<?php
    require_once "config.php";

    $uname = $_GET['uname'];

    $query = "SELECT * FROM students";

    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['username'] === $uname){
                $dp = $row['photo'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRSS | Notes</title>
    <link rel="stylesheet" href="navBar.css">
    <link rel="stylesheet" href="notes.css">
    <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navigation">
        <div class="pics">
            <img src="media/images/srss-og.png" alt="shaaban robert logo" id="logo-img">
            <?php echo "<a href='account.php?uname=$uname' class='dp1'><img src='$dp' class='dp'></a></li>";?>
        </div>
        <div class="menu">
            <span id="srss"><b>Shaaban Robert Sec School</b></span>
            <div class="horizontal_menu">
                <ul type="none">
                    <li><?php echo "<a href='home.php?uname=$uname' class=home>Home</a></li>";?>
                    <li><?php echo "<a href='news.php?uname=$uname' class=news>News</a></li>";?>
                    <li><?php echo "<a href='notes.php?uname=$uname' class=notes>Notes</a></li>";?>
                    <li class="multi_menu"><a>login</a></li>
                    <li><?php echo "<a href='account.php?uname=$uname'><img src='$dp' width='50px' height='50px' class='dp'></a></li>";?>
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
     <div class="body">
            <div class="classes">
                <div class="row">
                    <div class="class">
                        <div class="form1">
                            
                        </div>
                        <div class="info">
                            <p>
                                Hello!! Dear Form 1, you're welcome at SRSS. This part is for you to 
                                get all the necessary materials for Form 1. All necessary notes are here,
                                 you're welcome. <i>Click the button below to get the materials you need.</i>
                            </p>
                            <center>
                                <?php 
                                    echo "<button><a href='form1.php?uname=$uname'><b>Form 1</b></a></button>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form2">
                            
                        </div>
                        <div class="info">
                            <p>
                                Form 2 student, thanks for revisiting this website and if it is your first time 
                                you're welcome. As usual, all necessary materials for form 2 are here. You may
                                 download them if you want.
                                 <i>Click the button below.</i>
                            </p>
                            <center>
                                <?php 
                                    echo "<button><a href='form2.php?uname=$uname'><b>Form 2</b></a></button>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form3">
                            
                        </div>
                        <div class="info">
                            <p>
                                It's another warm day, and now you're in Form three. What are you waiting for?
                                 <i>Click the button below and get all the notes you need, or else it is your loss.</i>
                            </p>
                            <center>
                                <?php 
                                    echo "<button><a href='form3.php?uname=$uname'><b>Form 3</b></a></button>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form4">
                            
                        </div>
                        <div class="info">
                            <p>
                                We do not want to say much, you're grown ups now. You know what to do and how to do 
                                it. So, don't waste time and get all your materials now, go study you kid. 
                                <i>Click the button below.</i>
                            </p>
                            <center>
                                <?php 
                                    echo "<button><a href='form4.php?uname=$uname'><b>Form 4</b></a></button>";
                                ?>
                            </center>
                        </div> 
                    </div>                                                           
                    <div class="class">
                        <div class="form5">
                            
                        </div>
                        <div class="info">
                            <p>
                                Oh! Hello! You're welcome at SRSS. This is a digitized school with all its 
                                materials in this website. Please, get in, dive, dig and get all necessary 
                                materials for any combination you're studying. 
                                <i>Click the link below to get the materials.</i>
                            </p>
                            <center>
                                <?php 
                                    echo "<button><a href='form5.php?uname=$uname'><b>Form 5</b></a></button>";
                                ?>
                            </center>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form6">
                            
                        </div>
                        <div class="info">
                            <p>
                                Hi! We as developers, welcome you in this website to now end your secondary 
                                school journey, happily. How will you do that? Please, <i>Click the button below.</i>
                            </p>
                            <center>
                                <?php 
                                    echo "<button><a href='form5.php?uname=$uname'><b>Form 6</b></a></button>";
                                ?>
                            </center>
                        </div>
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
</body>
</html>