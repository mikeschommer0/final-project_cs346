<?php
include("../php/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Order Received!</title>
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
                <li><a href="./homepage.php"><span class="link-icon"></span>Home</a></li>
                <li><a href="./order.php"><span class="link-icon"></span>Order Online</a></li>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href=""><span class="link-icon"></span>About</a></li> 
                <?php if(isset($_SESSION["name"])) { ?>
                <li><a href="./changeinfo.php"><span class="link-icon"></span>Account</a></li>
            <?php } else { ?>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
            <?php } ?> 
            </ul>
        </nav>
        <main> 
            <div id ="homescreen-img"></div>
            <h1>We got your order :)</h1>
            <ul>
            <?php if(isset($_SESSION["order"])) { 
                foreach($_SESSION['order'] as $name => $value) {
                    if (is_array($value)) { ?>
                        <li>
                            <?php echo "[" . implode(", ", $value) ."]"; ?>
                        </li>
                    <?php } else { ?>
                        <li>
                            <?php echo trim(htmlspecialchars($value)); ?>
                        </li>
                    <?php }
                } ?>
            <?php } else { ?>
               <p>Something went wrong! Try ordering again!</p>
            <?php } ?> 
            </ul>
            <footer>
                <p>
                    Disclaimer: This site is under development by Mike Schommer, a UW-Oshkosh 
                    student as a prototype for Polito's Pizza. Nothing on the site should be 
                    construed in any way as being officially
                    connected with or representative of Polito's Pizza.
                </p> 
            </footer>
        </main>
    </div>
</body>
</html>