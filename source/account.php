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
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Account</title>
    <script src="../javascript/password-validation.js" defer></script>
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
                <?php } else if(isset($_SESSION["name"])) { ?>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./account.php"><span class="link-icon"></span>Account</a></li>
                <?php } else { ?>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
                <?php } ?>
            </ul>
        </nav>
        <main>
            <fieldset>
                <legend>Options</legend>
                <a href="./changeinfo.php"><button type="button">Change Information</button></a>
                    <form id="logout" action="logout.php" method="POST">
                        <input type="submit"  class="form-buttons" value="Log out" >
                        <input type="hidden" name="logout" value="true" >
                    </form>
                </form>
            </fieldset>
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