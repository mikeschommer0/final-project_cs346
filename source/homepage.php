<?php
include("../php/sessions.php");
    if(!empty($_SESSION['order'])) {
        unset($_SESSION['order']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Polito's Pizza</title>
</head>
<body>
    <div id="wrapper">
    <header>
        <img id="titans-logo" src="../images/titans-icon.png" alt="UW Oshkosh Titans logo">
        <h1 id="homepage-title"> Polito's Pizza - Oshkosh</h1>
        <img src="../images/politos-icon.png" alt="Polito's Mascot">
    </header>
    <nav>
        <ul class="nav-bar">
            <li><a href=""><span class="link-icon"></span>Home</a></li> 
            <li><a href="./order.php"><span class="link-icon"></span>Order Online</a></li>
            <?php if(isset($_SESSION["name"]) && $_SESSION['userid'] == 1) { ?>
            <li><a href="./manage.php"><span class="link-icon"></span>Manage</a></li>
            <li><a href="./changeinfo.php"><span class="link-icon"></span> <?php echo $_SESSION['fname']; ?></a></li>
            <?php } else if(isset($_SESSION["name"])) { ?>
            <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
            <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
            <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
            <li><a href="./changeinfo.php"><span class="link-icon"></span><?php echo $_SESSION['fname']; ?></a></li>
            <?php } else { ?>
            <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
            <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
            <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
            <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
            <?php } ?>
        </ul>
    </nav>
    <main> 
        <div id ="homescreen-img"></div>
        <div id = "main-subtitles">
            <h1>Our Specials</h1>
            <a href="./menu.php"><button type="button">View Our Menu</button></a>
        </div>
        <div class="main-text">
            <ul>
              <li>
                <h2>Family Special (Everyday)</h2>
                <ul>
                    <li>One topping 20" pizza </li>
                    <li>One order of garlic knots</li>
                    <li>Four sodas</li>
                    <li>$20</li>
                </ul>
              </li>
              <li>
                <h2>Lunch Special (11AM-2PM)</h2>
                <ul>
                    <li>Two slices</li>
                    <li>One soda</li>
                    <li>$6</li>
                </ul>
              </li>
              <li>
                <h2>Tuesday Special (All Day)</h2>
                <ul>
                    <li>Two slices</li>
                    <li>One soda</li>
                    <li>$6</li>
                </ul>
              </li>
            </ul>
            <ul>
                <li>
                  <h2>Our Information</h2>
                  <ul>
                      <li>543 High Ave, Oshkosh WI</li>
                      <li>(920) 385-7863</li>
                  </ul>
                </li>
                <li>
                  <h2>Hours (Kitchen closes 20 minutes before close)</h2>
                  <ul>
                      <li>Monday 11AM-10PM</li>
                      <li>Tuesday 11AM-10PM</li>
                      <li>Wednesday 11AM-10PM</li>
                      <li>Thursday 11AM-10PM</li>
                      <li>Friday 11AM-2AM</li>
                      <li>Saturday 11AM-2AM</li>
                      <li>Sunday 11AM-8PM</li> 
                  </ul>
                </li>
                <li>
                    <h2>We Deliver Through Eatstreet and Doordash</h2>
                    <h2>No Delivery Fee!</h2>
                </li>
              </ul>
          </div>
    </main>
    <footer>
        <p>
            Disclaimer: This site is under development by Mike Schommer, a UW-Oshkosh 
            student as a prototype for Polito's Pizza. Nothing on the site should be 
            construed in any way as being officially
            connected with or representative of Polito's Pizza.
        </p> 
    </footer>
    </div> 
</body>
</html>