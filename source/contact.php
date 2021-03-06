<?php
include("../php/database.php");
include("../php/queries.php");
include("../php/initialize.php");
include("../php/sessions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <?php
    foreach($_POST as $name => $value) { ?>
                <?php trim(htmlspecialchars($value)); ?> 
    <?php } 
    insert_comment($_POST['name-contact'],$_POST['phone-contact'],$_POST['email-contact'],$_POST['concerns']);
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
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Contact Us</title>
</head>
<body>
    <main>
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
                <li><a href=""><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <?php if(isset($_SESSION["name"])) { ?>
                    <li><a href="./changeinfo.php"><span class="link-icon"></span> <?php echo $_SESSION['fname']; ?></a></li>
                <?php } else { ?>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li> 
                <?php } ?>
            </ul>
        </nav>
        <div id ="homescreen-img"></div>
        <div id="contact-info">
            <h1>Contact Us</h1>
            <h2>Ask us anything</h2> 
            <h2>(920)385-7863</h2>
            <a id="email-link" href="mailto:info@politospizza.com"><h2>info@politospizza.com</h2></a>
        </div>

        <form action="./contact.php" method="POST">
            <div id="contact-forms">
                <ul>
                    <li>
                        <label for="name-contact">Name:</label>
                        <input type="text" id="name-contact" name="name-contact">
                    </li>
                    <li>
                        <label for="phone-contact">Phone:</label>
                        <input type="text" id="phone-contact" name="phone-contact">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="email-contact">Email:</label>
                        <input type="email" id="email-contact" name="email-contact">
                    </li>
                    <li>
                        <label for="concerns">Comments:</label>
                        <textarea name="concerns" id="concerns" rows="5" cols="22">Enter your comments...</textarea>
                    </li>
                </ul>
            </div>
            <fieldset class="form-fieldset">
                <input class="form-buttons" type="reset" value="Undo"/>
                <input class="form-buttons" type="submit" value="Send"/>
            </fieldset>
        </form>
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