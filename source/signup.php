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
    <title>Signup</title>
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
                <li><a href="./homepage.php"><span class="link-icon"></span>Home</a></li>
                <li><a href="./order.php"><span class="link-icon"></span>Order Online</a></li>
                <li><a href="./apply.php"><span class="link-icon"></span>Apply</a></li>
                <li><a href="./contact.php"><span class="link-icon"></span>Contact</a></li>
                <li><a href="./about.php"><span class="link-icon"></span>About</a></li>
                <li><a href="./login.php"><span class="link-icon"></span>Login</a></li>  
            </ul>
        </nav>
    <main>
        <fieldset>
            <legend>User Info</legend>
            <form action="../php/signup.php" method="POST">
                <ul>
                    <li>
                        <label for="first-name-signup">First Name:</label>
                        <input type="text" name="first-name-signup" id="first-name-signup" required>
                    </li>
                    <li>
                        <label for="last-name-signup">Last Name:</label>
                        <input type="text" name="last-name-signup" id="last-name-signup" required>
                    </li>
                    <li>
                        <label for="username-signup">Username:</label>
                        <input type="text" name="username-signup" id="username-signup" required>
                    </li>
                    <li>
                        <label for="email-signup">Email:</label>
                        <input type="email" name="email-signup" id="email-signup" required>
                    </li>
                    <li>
                        <label for="phone-signup">Phone number:</label>
                        <input type="phone-signup" name="phone-signup" id="phone-signup" required>
                    </li>
                    <li>
                        <label for="password-signup">Password:</label>
                        <input type="password" name="password-signup" id="password-signup" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" required>
                    </li> 
                    <div id="password-message">
                        <h1>Password requirements:</h1>
                        <p id="password-lcletter" class="invalid">At least one lowercase letter</p>
                        <p id="password-ucletter" class="invalid">At least one capital letter</p>
                        <p id="password-number" class="invalid">At least one number</p>
                        <p id="password-length" class="invalid">A minimum of 10 characters</p>
                    </div>
                    <li>
                        <label for="password-signup2">Re-enter Password:</label>
                        <input type="password" name="password-signup2" id="password-signup2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" required>
                    </li>
                    <li>
                        <label for="dob-signup">Birthday:</label>
                        <input type="date" name="dob-signup" id="dob-signup">
                    </li>
                    <p>Earn a free slice on your birthday! *Not required*</p>
                </ul>
                <input id="sign-in-button" class="form-buttons" type="submit" value="Sign-up"/>
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